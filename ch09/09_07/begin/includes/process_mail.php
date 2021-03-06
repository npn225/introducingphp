<?php
// Assume the input contains nothing suspect
$suspect = false;
// Regular expression to search for suspect phrases
$pattern = '/Content-type:|Bcc:|Cc:/i';

// Recursive function that checks for suspect phrases
// Third argument is passed by reference
/**
 * [isSuspect description]
 * @param  [type]  $value   [description]
 * @param  [type]  $pattern [description]
 * @param  [type]  $suspect [description]
 * @return [boolean]          [description]
 */
function isSuspect($value, $pattern, &$suspect) {
    if (is_array($value)) {
        foreach ($value as $item) {
            isSuspect($item, $pattern, $suspect);
        }
    } else {
        if (preg_match($pattern, $value)) {
            $suspect = true;
        }
    }
}

// Check the $_POST array for suspect phrases
isSuspect($_POST, $pattern, $suspect);

// Process the form only if no suspect phrases are found
if (!$suspect) :
    // Check that required fields have been filled in,
    // and reassign expected elements to simple variables
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value);
        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
        } elseif (in_array($key, $expected)) {
            $$key = $value;
        }
    }

    // Validate user's Email
    if (!$missing && !empty($email)) :
        $is_valid_email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if ($is_valid_email) :
            $headers[] = "Reply to: $is_valid_email";
        else :
            $errors["email"] = true;
        endif;
    endif;

    // If there are no errors, create the headers and message body
    if (!$errors && !$missing):
        $headers = implode("\r\n", $headers);
    endif;
endif;

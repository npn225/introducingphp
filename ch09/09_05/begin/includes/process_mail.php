<?php
$suspect = false;
$pattern = "/Content-type:|Bcc:|Cc:/i";

/**
 * A recursive function that checks all the entries into _POST
 * to make sure that none of those entries are harmful or malicious
 * @param  array  $value   [description]
 * @param  string  $pattern [description]
 * @param  bool  $suspect [description]
 * @return [None]          [description]
 */
function is_suspect($value, $pattern, &$suspect) {
    if (is_array($value)) :
        foreach ($value as $item) :
            is_suspect($item, $pattern, $suspect);
        endforeach;
    else:
        if (preg_match($pattern, $value)):
            $suspect = true;
        endif;
    endif;
}

is_suspect($_POST, $pattern, $suspect);

// Only carry on with the processing script if no suspect phrases
// are found in the _POST array
if (!$suspect):
    foreach ($_POST as $key => $value) {
        $value = is_array($value) ? $value : trim($value);
        if (empty($value) && in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
        } elseif (in_array($key, $expected)) {
            $$key = $value;
        }
    }
endif;

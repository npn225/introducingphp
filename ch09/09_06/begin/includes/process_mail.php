<?php
$suspect = false;
$pattern = '/Content-type:|Bcc:|Cc:/i';

/**
 * A recursive function that checks all the entries into _POST
 * to make sure that none of those entries are harmful or malicious
 * @param  array  $value   [description]
 * @param  string  $pattern [description]
 * @param  bool  $suspect [description]
 * @return [None]          [description]
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

isSuspect($_POST, $pattern, $suspect);

if (!$suspect) :
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

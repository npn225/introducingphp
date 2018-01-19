<?php

if (function_exists("convert_to_minutes")):
    echo convert_to_minutes(615);
endif;

/**
 * [Converts passed in seconds to minutes]
 * @param  [int] $seconds [description]
 * @return [string]          [description]
 */
function convert_to_minutes($seconds) {

    // Get the values of the total minutes and remainding seconds
    $sec = $seconds % 60;
    if (function_exists('intdiv')):
        $min = intdiv($seconds, 60);
    else:
        $min = ($seconds - $sec)/60;
    endif;

    // Fix the 'sec' value
    $sec = abs($sec);
    $sec = ($sec < 10) ? 0 . $sec : $sec;

    // Fix the 'min' value
    if ($min > 0):
        $min = ($min < 10) ? 0 . $min : $min;
    else:
        $min = abs($min);
        $min = ($min < 10) ? '-' . 0 . $min : -1*$min;
    endif;

    return "$min:$sec";
}

?>

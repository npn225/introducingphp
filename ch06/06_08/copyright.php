<?php
/**
 * Displays copyright symbol and years of existance
 * @param  string $found_year [This values represents the first year of existence]
 * @return []             []
 */
function display_copyright($found_year) {

    $is_same_century = substr(strval($found_year), 0, 2) == substr(date('Y'), 0, 2);

    if ($found_year < intval(date('Y')) && $is_same_century):
        echo "&copy" . $found_year . "&ndash;" . date('y');
    elseif ($found_year < intval(date('Y')) && !$is_same_century):
        echo "&copy" . $found_year . "&ndash;" . date('Y');
    else:
        echo "&copy" . $found_year;
    endif;
}

display_copyright(6008);

 ?>

<?php

/**
 * [lyn_copyright description]
 * @param  [type] $startYear [description]
 * @return [type]            [description]
 */
function lyn_copyright($startYear) {
    $currentYear = date('Y');
    if ($startYear < $currentYear) {
        $currentYear = date('y');
        return "&copy; $startYear&ndash;$currentYear";
    } else {
        return "&copy; $startYear";
    }
}

echo lyn_copyright(2030);
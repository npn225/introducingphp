<?php

$number = 2;
//
// /**
//  * Doubles the passed in int - PASS BY VALUE
//  * @param  int $number [description]
//  * @return int         Doubled value of the passed in $number
//  */
// function double_it($number) {
//     return $number *= 2;
// }

/**
 * Doubles the passed in int - PASS BY REFERENCE
 * @param  int $num [description]
 * @return int         Doubled value of the passed in $number
 */
function double_it(&$num) {
    $num *= 2;
}

$doubled = double_it($number);

echo "The number value is " . $number . '<br>';
echo "The doubled value is " . $doubled;
var_dump($doubled);
?>

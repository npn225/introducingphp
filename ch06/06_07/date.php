<?php

$xmas2018 = strtotime("Dec 25, 2018");

echo date("l, F j, Y", $xmas2018) . '<br>';

$date1 = new DateTime();
$date2 = new DateTime();

$mex_coast = new DateTimeZone("America/Mexico_City");

$date2->setTimezone($mex_coast);

echo $date1->format("g:ia, l, F j, Y") . '<br>';
echo $date2->format("g:ia, l, F j, Y") . '<br>';

?>

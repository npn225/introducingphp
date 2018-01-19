<?php
// Convert $total_minutes to hours and minutes.

$total_minutes = 640;
$minutes = $total_minutes % 60;

// Remember that in php, the modulo operator truncates the values
// The ten is added to ensure righthand side is greater than lefthand side
$hours = ($total_minutes / 60) % (($total_minutes / 60) + 10);

echo "Time taken was $hours hours $minutes minutes";

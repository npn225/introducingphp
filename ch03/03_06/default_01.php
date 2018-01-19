<?php

$unit_cost = 0;

// Below is the null-coalesce operator
// The default value is ignored ONLY when it is null or non-existant
// Null-coalesce operator only works for PHP7
// Null-coalesce takes the first value that is genuine, i.e. not Null

$wholesale_price = $unit_cost ?? $non_existant ?? 25;

echo $wholesale_price;

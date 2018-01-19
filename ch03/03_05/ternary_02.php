<?php
$unit_cost = 0;

/* This shortened form of the ternery operator for default values is
advised against and is NOT a good idea */

$wholesale_price = $unit_cost ?: 25;

echo $wholesale_price;

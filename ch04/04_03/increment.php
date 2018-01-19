<?php
$number = 5;
$number++;
echo $number . '<br>';
++$number;
echo $number . '<br><br>';

// With post-increment, number is incremented AFTER result's calculation is done
$result = $number++ * 2;
echo "Post-Increment Result: <br>";
echo "Result is " . $result . '<br>';
echo "Number is " . $number . '<br><br>';

// With pre-increment, number is incremented BEFORE result's calculation is done
echo "Pre-Increment Result: <br>";
$result = ++$number * 2;
echo "Result is " . $result . '<br>';
echo "Number is " . $number . '<br><br>';

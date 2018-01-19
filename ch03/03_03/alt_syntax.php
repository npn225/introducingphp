<?php
$name = 'Arthur Dent';
$day = 'Thursday';

// Alternative Syntax for conditional statements
// Uses colons instead of braces
// Cannot intermingle the colons and the braces - must choose one
// Colon format requries 'endif' at the end
// Colon format requires 'elseif' and 'endif' to each be written as one word

if ($name == 'Arthur Dent' && $day == 'Thursday'):
    echo 'I could never get the hang of Thursdays.';
elseif ($name == 'Marvin' || $day == 'Wednesday'):
    echo "I've got this terrible pain in all the diodes down my left-hand side.";
else:
    echo 'Is that really a piece of fairy cake?';
endif;

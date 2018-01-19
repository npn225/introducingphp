<?php

foreach ($_POST as $key => $value) {
    // Prevents user from bypassing a field by entering only whitespace
    $value = is_array($value) ? $value : trim($value);

    // Checks if the user put in no value for a required field
    if ( empty($value) && in_array($key, $required) ):
        $missing[] = $key; // Categorizes the field as missing
        $$key = ""; // Remember that ${$key} = ${name} | ${email} | ${commments}

    // Since we know user has enterd a value, put this value into appropriate variable
    elseif ( in_array($key, $expected) ):
        $$key = $value;
        
    endif;
}

?>

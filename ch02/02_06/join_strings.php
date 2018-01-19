<?php
$first_name = 'Nnamdi';
$last_name = 'Nwaokorie';
$title = '"The Hitchhiker\'s Guide to the Galaxy"';
$author = 'Douglas Adams';
$answer = 42;
$new_lines = "\r\n\r\n";

// $full_name = $first_name . $last_name;
// $full_name = $first_name . ' ' . $last_name;
$full_name = "$first_name $last_name";
$book = "$title by $author";

// echo $full_name . '<br>';
// echo $book;

$message = "Name: $full_name $new_lines";
$message .= "Book: $book $new_lines";
$message .= "Answer: $answer";

echo $message;

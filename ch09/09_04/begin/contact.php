<?php
    $errors = [];
    $missing = [];

    if ( isset($_POST['send']) ) {
        $expected = ['name', 'email', 'comments'];
        $required = ['name', 'comments'];
        require './includes/process_mail.php';
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Preserving input</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <h1>Contact Us</h1>

        <?php if ($errors || $missing) : ?>
            <p class="warning">Please fix the item(s) indicated</p>
        <?php endif; ?>

        <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <p>
                <label for="name">Name:
                    <?php if ($missing && in_array('name', $missing)) : ?>
                        <span class="warning">Please enter your name</span>
                    <?php endif; ?>
                </label>
                <input type="text" name="name" id="name"
                    <?php
                        // This php code is passing the user input into the
                        // "value" attribute of the "input" tag
                        if ($errors || $missing) {
                            // htmlentities converts certain charcaters
                            // like apostrophes into their equivalent
                            // html character entity
                            echo "value=\"" . htmlentities($name) . '"';
                        }
                    ?>
                >
            </p>

            <p>
                <label for="email">Email:
                    <?php if ($missing && in_array('email', $missing)) : ?>
                        <span class="warning">Please enter your email address</span>
                    <?php endif; ?>
                </label>
                <input type="email" name="email" id="email"
                    <?php
                        // This php code is passing the user input into the
                        // "value" attribute of the "input" tag
                        if ($errors || $missing) {
                            // htmlentities converts certain charcaters
                            // like apostrophes into their equivalent
                            // html character entity
                            echo "value=\"" . htmlentities($email) . '"';
                        }
                    ?>
                >
            </p>

            <p>
                <label for="comments">Comments:
                    <?php if ($missing && in_array('comments', $missing)) : ?>
                        <span class="warning">You forgot to add any comments</span>
                    <?php endif; ?>
                </label>
                <!-- Note: To avoid unwanted white space in textarea,
                     make sure the php tag is right up agiant the
                     textarea tag. -->
                <textarea name="comments" id="comments"><?php
                    // This php code is passing the user input into the
                    // "value" attribute of the "input" tag
                    if ($errors || $missing) {
                        // htmlentities converts certain charcaters
                        // like apostrophes into their equivalent
                        // html character entity
                        echo htmlentities($comments);
                    }
                ?></textarea>
            </p>

            <p>
                <input type="submit" name="send" id="send" value="Send Comments">
            </p>
        </form>
    </body>
</html>

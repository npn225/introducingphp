<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    // Variable "terms" added in the arrays below to allow for
    // it to be processed by the process_mail code
    $expected = ['name', 'email', 'comments', "terms"];
    $required = ['name', 'comments', "terms"];
    $to = 'David Powers <david@example.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;

    // Must manually add the "terms" variable in the $_POST array since
    // it will not be there when the form is submitted and the checkbox
    // is not checked
    if (!isset($_POST["terms"])) {
        // Code Line below will add terms to the missing array if
        // it is a required field
        $_POST["terms"] = "";
    }

    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Single checkbox</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Contact Us</h1>
<?php if ($_POST && $suspect) : ?>
<p class="warning">Sorry, your mail couldn't be sent.</p>
<?php elseif ($errors || $missing) : ?>
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
        if ($errors || $missing) {
            echo 'value="' . htmlentities($name) . '"';
        }
        ?>
        >
  </p>
  <p>
    <label for="email">Email:
        <?php if ($missing && in_array('email', $missing)) : ?>
            <span class="warning">Please enter your email address</span>
        <?php elseif (isset($errors['email'])) : ?>
            <span class="warning">Invalid email address</span>
        <?php endif; ?>
    </label>
    <input type="email" name="email" id="email"
        <?php
        if ($errors || $missing) {
            echo 'value="' . htmlentities($email) . '"';
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
      <textarea name="comments" id="comments"><?php
          if ($errors || $missing) {
              echo htmlentities($comments);
          }
          ?></textarea>
  </p>
  <p>
    <input type="checkbox" name="terms" id="terms" value="agreed"
        <?php
            // Code below keeps track of if the box has been checked
            // Note that "$terms" comes from process_mail code through
            // the implementation of 'variable variables'
            if ($_POST && $terms == "agreed") {
                echo "checked";
            }
        ?>
    >
      <label for="terms">I agree to the terms and conditions
          <!-- Displays error message if user does not check the box! -->
          <?php if ($missing && in_array("terms", $missing)): ?>
              <span class="warning">Please check the box to agree</span>
          <?php endif; ?>
      </label>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>

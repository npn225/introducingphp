<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    // "format" name added to expected array to allow process_mail
    // code to handle it
    $expected = ['name', 'email', 'comments', "format"];
    $required = ['name', 'comments'];
    $to = 'David Powers <david@example.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;

    // Since process_mail code expects everything in expected array
    // to be in the $_POST array, code below is added for the case
    // when a user does not choose anything in the multi-choice form
    if (!isset($_POST["format"])) {
        $_POST["format"] = [];
    }

    // Code below forces the user to select a minimum number of items
    // in the multiple choice form
    $min_selected = 2;
    if (sizeof($_POST["format"]) < $min_selected){
        $errors["format"] = true;
    }

    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Multiple-choice list</title>
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
    <label for="format">Select the formats you require:
        <!-- Code below displays error if user chooses less items
             than is required by $min_selected-->
        <?php if (isset($errors["format"])): ?>
            <span class="warning">Please select at least <?= $min_selected ?> items</span>
        <?php endif; ?>
    </label>
    <!-- Multiple choice list must be submitted as an array or
         else, only the last selected option will be sent to the
         $_POST array.  In order to do this, square-brackets are
         placed at the end of the name value for select!
     -->
    <select name="format[]" id="format" size="3" multiple>
      <option value="PDF"
        <?php
            // Code below saves and preserves the user's decision
            // '$format' variable created by process_mail code using 'variable variables'
            // "if ($_POST){}" checks to see if the form has been submitted
            if ($_POST && in_array("PDF", $format)) {
                echo "selected";
            }
        ?>
      >PDF</option>

      <option value="ePub"
        <?php
            // Code below saves and preserves the user's decision
            // '$format' variable created by process_mail code using 'variable variables'
            // "if ($_POST){}" checks to see if the form has been submitted
            if ($_POST && in_array("ePub", $format)) {
              echo "selected";
            }
        ?>
      >ePub</option>

      <option value="mobi"
        <?php
            // Code below saves and preserves the user's decision
            // '$format' variable created by process_mail code using 'variable variables'
            // "if ($_POST){}" checks to see if the form has been submitted
            if ($_POST && in_array("mobi", $format)) {
                echo "selected";
            }
        ?>
      >MOBI</option>
    </select>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>

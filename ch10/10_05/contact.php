<?php
$errors = [];
$missing = [];
if (isset($_POST['send'])) {
    // os added to arrays below to handle errors for drop-down menu
    $expected = ['name', 'email', 'comments', "os"];
    $required = ['name', 'comments', "os"];

    $to = 'David Powers <david@example.com>';
    $subject = 'Feedback from online form';
    $headers = [];
    $headers[] = 'From: webmaster@example.com';
    $headers[] = 'Cc: another@example.com';
    $headers[] = 'Content-type: text/plain; charset=utf-8';
    $authorized = null;
    require './includes/process_mail.php';
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Select menu</title>
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
    <label for="os">Operating system
        <!-- Ensures user chooses an item in the menu -->
        <?php if ($missing && in_array("os", $missing)) : ?>
            <span class="warning">Please choose an option</span>
        <?php endif; ?>
    </label>

    <select name="os" id="os">
      <!-- First option value is set to empty string because, due to
           process_mail code, this forces the user to select one
           of the three options -->
      <option value=""
        <?php
            // Code below preserves and saves user's decision
            // $os comes from process_mail code's 'variable variables'
            // "if (!$_POST) {}" checks if the form hasn't been submitted
            // This forces this first option to be the default value
            if (!$_POST || $os == "") {
                echo "selected";
            }
        ?>
      >Please make a selection</option>

      <option value="Linux"
      <?php
          // Code below preserves and saves user's decision
          // $os comes from process_mail code's 'variable variables'
          // "if ($_POST) {}" checks if the form hasn't been submitted
          if ($_POST && $os == "Linux") {
              echo "selected";
          }
      ?>
      >Linux</option>

      <option value="Mac"
      <?php
          // Code below preserves and saves user's decision
          // $os comes from process_mail code's 'variable variables'
          // "if ($_POST) {}" checks if the form hasn't been submitted
          if ($_POST && $os == "Mac") {
              echo "selected";
          }
      ?>
      >Mac OS X</option>

      <option value="Windows"
      <?php
          // Code below preserves and saves user's decision
          // $os comes from process_mail code's 'variable variables'
          // "if ($_POST) {}" checks if the form hasn't been submitted
          if ($_POST && $os == "Windows") {
              echo "selected";
          }
      ?>
      >Windows</option>
    </select>
  </p>
  <p>
    <input type="submit" name="send" id="send" value="Send Comments">
  </p>
</form>
</body>
</html>

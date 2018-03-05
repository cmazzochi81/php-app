<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>

<?php
if($session->is_logged_in()){redirect_to("index.php");}

$username="";
  if (isset($_POST['submit'])) {

      $required_fields = array("username", "password");
      validate_presences($required_fields);
  
        if (empty($errors)) { 

        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $found_admin = attempt_login($username, $password);

    if ($found_admin) {
      
      // Success
            // Mark user as logged in
            $_SESSION["admin_id"] = $found_admin["id"];
            $_SESSION["username"] = $found_admin["username"];
      redirect_to("index.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))
?>
<?php $layout_context = "public"; ?>
<?php require_once('../layouts/admin_header.php'); ?>

<div id="loginFormContainer" class="clearfix">
    <p id="loginP">Login<p>
    <?php //echo form_errors($errors); ?>
    <?php //echo output_message(); ?>

    <form id="loginForm" action="login.php" method="post">

        <p class="field clearfix">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlentities($username); ?>" required/>
        </p>

        <p class="field clearfix">
            <label>Password:</label>
            <input type="password" name="password" value="" required/>
        </p>
        <input id="loginSubmitButton"  type="submit" name="submit" value="Submit" />

    </form>

</div><!--End login_container-->
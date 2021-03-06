<?php require_once("../../includes/initialize.php"); ?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/database.php"); ?>
<?php require_once("../../includes/database_object.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<?php require_once("../../includes/validation_functions.php"); ?>
<?php //confirm_logged_in(); ?>
<?php
// $database = new MySQLDatabase();
// var_dump($database->connection);

if (isset($_POST['submit'])) {
  // Process the form
  var_dump($_POST);
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $username = mysql_prep($_POST["username"]);
    var_dump($username);
    $hashed_password = password_encrypt($_POST["password"]);
    
    $query  = "INSERT INTO admins (";
    $query .= "  username, hashed_password";
    $query .= ") VALUES (";
    $query .= "  '{$username}', '{$hashed_password}'";
    $query .= ")";
    
   
    $result = mysqli_query($database->connection, $query);

    if ($result) {
      // Success
      $_SESSION["message"] = "Admin created.";
      redirect_to("list_admins.php");
    } else {
      // Failure
      $_SESSION["message"] = "Admin creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include("../layouts/admin_header.php"); ?>
<div id="main">
  
  <div id="page">
    <?php //echo message(); ?>
    <?php //echo form_errors($errors); ?>
    
    <h2>Create Admin</h2>
    <form action="new_admin.php" method="post">
      <p style="color:#000;">Username:
        <input type="text" name="username" value="" />
      </p>
      <p style="color:#000;">Password:
        <input type="password" name="password" value="" />
      </p>
      <input type="submit" name="submit" value="Create Admin" />
    </form>
    <br />
    <a href="list_admins.php">Cancel</a>
  </div>
</div>

<?php include("../layouts/footer.php"); ?>

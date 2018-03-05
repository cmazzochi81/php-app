<?php require_once("../../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>

<?php
  $message = "";
  //print_r($_SERVER);
//$admin = User::find_by_id($_GET['id']);//This returns database query failed.
  //var_dump($admin);
if(empty($_GET['id'])) {
  	$session->message("No user ID was provided.");
    redirect_to('index.php');
  }

  $admin = User::find_by_id($_GET['id']);
  if($admin && $admin->delete()) {
    $session->message("The admin {$admin->username} was deleted.");
    redirect_to('list_admins.php');
  } else {
    $session->message("The admin could not be deleted.");
    redirect_to('list_admins.php');
  }

  
  
?>
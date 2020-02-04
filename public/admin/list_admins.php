<?php require_once("../../includes/initialize.php"); ?>
<?php //if (!$session->is_logged_in()) {redirect_to("login.php");} ?>
<?php //confirm_logged_in(); ?>

<?php
  $admin_set = User::find_all();
  $message = "";
?>

<?php $layout_context = "admin"; ?>
<?php include("../layouts/admin_header.php"); ?>
<div id="main">
  <a id="backButton" style="margin-left:20px;color:#000;" href="index.php">&laquo; Back</a><br />
  <div id="page" style="margin-left:30%;margin-bottom:2%;">

    <?php echo output_message($message); ?>
    <h2>Manage Admins</h2>
    <table style="border: 1px solid transparent; color:#000;">
      <tr>
        <th style="text-align: left; width: 200px;">Username</th>
        <th style="text-align: left; width: 200px;">User Id</th>
        <th colspan="2" style="text-align: left;">Actions</th>
      </tr>

    <?php foreach($admin_set as $admin) : ?>
      <tr>
        <td><?php echo $admin->username; ?></td>
        <td><?php echo $admin->id; ?></td>
        <td><a href="edit_admin.php?id=<?php echo $admin->id; ?>">Edit</a></td>
        <td><a href="delete_admin.php?id=<?php echo $admin->id; ?>" 
               onclick="return confirm('Are you sure?');">Delete</a></td>
      
      </tr>
    <?php endforeach ?>
    </table>
    <br />
    <a href="new_admin.php">Add new admin</a>
  </div><!--end page div -->
</div><!--end main div-->
<?php include("../layouts/footer.php"); ?>

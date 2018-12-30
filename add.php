<?php
//place this code on top of all the pages which you need to authenticate
//--- Authenticate code begins here ---
session_start();
//checks if the login session is true
if(!$_SESSION['username']){
header("location:index.php");
}
$username = $_SESSION['username'];

// --- Authenticate code ends here ---
?>
<?php
include_once ('header.php');
include ('config.php');
 ?>
<?php
$sql = "SELECT * FROM users WHERE username='$username'";
$document_get = mysqli_query($conn, $sql);
$match_value = mysqli_fetch_assoc($document_get);
$user_id = $match_value['id'];
?>
<br/>
 <div style="float:right">
    <a class="btn btn-warning" href="dashboard.php" > Dashboard </a>
    <a class="btn btn-info" href="settings.php" > Settings </a>
    <a class="btn btn-danger logout" href="logout.php" > Logout</a>
  </div>

 <fieldset>
    <legend>Welcome <?php echo $username; ?>, </legend>
	<br/>
 </fieldset>
<script type="text/javascript">
var counter = 0;
$(function(){
 $('p#add_field').click(function(){
 counter += 1;
 $('#container').append(
 '<strong>List No. ' + counter + '</strong><br />'
 + '<textarea id="field_' + counter + '" name="dynfields[]' + '"></textarea><br />' );

 });
});
</script>
    <?php
if (isset($_POST['submit_val'])) {
if ($_POST['dynfields']) {
foreach ( $_POST['dynfields'] as $key=>$value ) {
$values = mysqli_real_escape_string($value);
$sql = "INSERT INTO todolist (user_id, description, check_value) VALUES ('$user_id', '$values', 'false')";
$query = mysqli_query($conn,$sql);
}
}
 mysql_close();
}
?>
<?php if (!isset($_POST['submit_val'])) { ?>
 <form method="post" action="">
 <div id="container">
 <p id="add_field"><a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-plus"> </span> Add List </a></p>
 <hr/>
 </div>
<br/>
 <input class="btn btn-success" type="submit" name="submit_val" value="Save" />
 </form>
<?php } else { ?>
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success! </strong> Your lists has been successfully added, please go to your <a href="dashboard.php" > dashboard board </a>.
</div>
<?php
}
?>
<script>
$('.logout').click(function(){
    return confirm("Are you sure you want to Logout?");
})
</script>
<?php include ('footer.php'); ?>

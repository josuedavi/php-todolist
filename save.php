<?php
include_once ("config.php");
$id = $_POST["id"];
$text = $_POST["text"];
$check = $_POST["check"];
if($text) {
$sql = "UPDATE todolist SET description='$text' WHERE id='$id' ";
$success_update = mysqli_query($conn,$sql);
}
if($check) {
$sql = "UPDATE todolist SET check_value='$check' WHERE id='$id' ";
$success_update = mysqli_query($conn,$sql);
echo $check;
}
?>

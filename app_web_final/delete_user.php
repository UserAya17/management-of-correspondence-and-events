<?php 

require_once ('connect.php');

  $id = $_GET['id'];
  $DelSql = "DELETE FROM `user_form` WHERE id=$id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: view_user.php");
  }else{
    echo "Failed to delete";
  }

 ?>
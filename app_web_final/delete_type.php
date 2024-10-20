<?php 
session_start();
require_once ('connect.php');

$type_id = $_GET['id'];
  $DelSql = "DELETE FROM `type_cour` WHERE type_id=$type_id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: view_type.php");
  }else{
    echo "Failed to delete";
  }

 ?>
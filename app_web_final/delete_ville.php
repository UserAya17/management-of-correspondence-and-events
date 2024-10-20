<?php 
session_start();
require_once ('connect.php');

$ville_id = $_GET['id'];
  $DelSql = "DELETE FROM `ville` WHERE ville_id=$ville_id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: view_ville.php");
  }else{
    echo "Failed to delete";
  }

 ?>
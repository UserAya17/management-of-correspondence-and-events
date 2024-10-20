<?php 
session_start();
require_once ('connect.php');

  // $direc_id = $_SESSION['direc_id'];
  $direc_id = $_GET['id'];
  $DelSql = "DELETE FROM `direction` WHERE direc_id=$direc_id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: view_direction.php");
  }else{
    echo "Failed to delete";
  }

 ?>
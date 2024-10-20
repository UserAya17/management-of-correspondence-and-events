<?php 
session_start();
require_once ('connect.php');

  // $direc_id = $_SESSION['direc_id'];
  $event_id = $_GET['id'];
  $DelSql = "DELETE FROM `events` WHERE id=$event_id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: evenement.php");
  }else{
    echo "Failed to delete";
  }

 ?>
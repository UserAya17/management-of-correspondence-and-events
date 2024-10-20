<?php 
session_start();
require_once ('connect.php');

 
  $ent_id = $_GET['id'];
  $DelSql = "DELETE FROM `entreprise` WHERE ent_id=$ent_id";

  $res = mysqli_query($con1, $DelSql);
  if ($res) {
    header("Location: view_entreprise.php");
  }else{
    echo "Failed to delete";
  }

 ?>
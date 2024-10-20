<?php


$conn = mysqli_connect("localhost","root","","gest_cour");
if(!$conn){
    die("Cannot connect to the database. Error: ".mysqli_error($conn));
}

?>
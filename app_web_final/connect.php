<?php 


$conn = mysqli_connect('localhost','root','','gest_cour') or die('connection failed');

?>

<?php 
$con1 = mysqli_connect('localhost', 'root', '');
if (!$con1) { die("database connection failed" . mysqli_error($con1)); }
$select_db = mysqli_select_db($con1, 'gest_cour'); if (!$select_db) { die("database selected failed" . mysqli_error($con1)); }

?>

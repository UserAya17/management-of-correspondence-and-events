
<?php
extract($_REQUEST);
include('db.php');

$sql=mysqli_query($conn,"select * from cr_entrant where id='$del'");
$row=mysqli_fetch_array($sql);

unlink("files/$row[name]");



mysqli_query($conn,"delete from cr_entrant where id='$del'");

header("Location:consulter_admin.php");

?>
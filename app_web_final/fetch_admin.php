<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];





if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>





<?php
//fetch.php;
if(isset($_POST["view"]))
{

    //connect.php;
    $connect = mysqli_connect("localhost", "root", "", "gest_cour");
  
    
    

 if($_POST["view"] != '')
 {
  $update_query = "UPDATE comments SET comment_status=1 WHERE user_id='$user_id' and comment_status=0 and type_cr='sort' ";
  mysqli_query($connect, $update_query);
 }
 $query = "SELECT * FROM comments WHERE user_id='$user_id' and type_cr='sort'  ORDER BY comment_id DESC LIMIT 5";
 $result = mysqli_query($connect, $query);
 $output = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
   <li>
    <a href="#">
     <strong>'.$row["comment_subject"].'</strong><br />
     <small><em>'.$row["comment_text"].'</em></small>
    </a>
   </li>
   <li class="divider"></li>
   ';
  }
 }
 else
 {
  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
 }
 
 $query_1 = "SELECT * FROM comments WHERE  user_id='$user_id' and comment_status=0 and type_cr='sort'";
 $result_1 = mysqli_query($connect, $query_1);
 $count = mysqli_num_rows($result_1);
 $data = array(
  'notification'   => $output,
  'unseen_notification' => $count
 );
 echo json_encode($data);
}
?>

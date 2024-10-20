<?php
  include_once 'config.php';

  if($_POST['tag']=='companyList')
  {
    $query = "select * from user";

    $result = mysqli_query($conn,$query);

    $arr =[];
    $i=0;

    while($row = mysqli_fetch_assoc($result))
    {
       
      $arr[$i] = $row;
      $i++;
    }

    echo json_encode($arr);
  }

  // Getting item list on the basis of company_id
  if($_POST['tag']=='itemList')
  {
    $util_id = $_POST['util_id'];

    $query = "select * from direction where util_id ='".$util_id."'" ;

    $result = mysqli_query($conn,$query);

    $arr =[];
    $i=0;

    while($row = mysqli_fetch_assoc($result))
    {
      $arr[$i] = $row;
      $i++;
    }

    echo json_encode($arr);
  }

 

   
?>
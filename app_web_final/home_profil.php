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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>


  <!-- //////////////////  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- ///////////////// -->

</head>
<body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Page <span>d'utilisateur</span></div>

               
                    <div class="sidebar-btn">
                       
                    </div>

                    
                    <ul>
                   
                    <a href="home_profil.php?logout=<?php echo $user_id; ?>" class="btn1">Se déconnecter</a>
                    </ul>
                </div>
            </div>

     
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                    <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
         echo '<img src="images/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
$a=$fetch['direction'];
      $sel = mysqli_query($conn, "SELECT direc_name FROM `direction` WHERE direc_id = '$a'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
      $fet = mysqli_fetch_assoc($sel);
      }
   ?>

                        <p><?php echo $name; ?></p>
                    </center>
                  
                    <li class="item" id="profile">
                        <a href="home_profil.php" class="menu-btn">
                            <i style="color:#289ae6" class="fas fa-user-circle"></i><span style="color:#289ae6">Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="messages">
                        <a href="consulter_courrier.php" class="menu-btn">
                            <i class="fas fa-envelope"></i><span>courrier </span>
                        </a>
                       
                    </li>
                  
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->

            <div class="main-container">

            <table><td>
            <p class="bv">bienvenue dans la page d'accueil
  <?php echo $name; ?> </p> </td>
            
            <td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
<td>
            <ul>
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:40px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
</td>
   </table>


            <div class="container">
        
    
            <div class="cardv">
      <div class="card-imagev">
        <img src="images/1.png" alt="">
      </div>
      <div class="profile-imagev">
      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
         echo '<img src="images/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
     
   ?>
      </div>
      <div class="card-contentv">
        <h3><?php echo $fetch['name']; ?></h3>
        <br><br>
        <table>
          
           <tr>
        <td><p><span class="bl">id : </span><?php echo $fetch['id']; ?> </td><td> <span class="bl">Nom d'utilisateur : </span><?php echo $fetch['utilname']; ?></p>
        <tr><td><br><br></td></tr>
      </td></tr><tr> <td><p><span class="bl">email : </span><?php echo $fetch['email']; ?> </td><td> <span class="bl">direction : </span><?php echo $fet['direc_name']; ?></p> </td>
              
   </table>
   <br> 
   <table>
           <tr><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
         <td><a href="update_profile.php" class="btn1">mettre à jour le profil</a></td>
         </tr></table>
   <br><br> <br><br>
      </div>
    
    </div>
    <!--Profile card end-->

<style>

.fas{
      font-size: 20px;
      
  }
  
.cardv{
  font-family: "Candara", sans-serif;
  width: 550px;
  overflow: hidden;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  display: flex;
  flex-direction: column;
}

.card-imagev img{
  width: 100%;
  height: 160px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
  object-fit: cover;
}

.profile-imagev img{
  z-index: 1;
  width: 120px;
  height: 120px;
  position: relative;
  margin-top: -75px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  border-radius: 100px;
  border: 10px solid #fff;
  transition-duration: 0.4s;
  transition-property: transform;
}

.profile-imagev img:hover{
  transform: scale(1.1);
}

.card-contentv h3{
  font-size: 25px;
  text-align: center;
  margin: 0;
}

.card-contentv p{
  font-size: 16px;
  text-align: justify;
  padding: 0 20px 5px 20px;
}

.bl{
            text-transform: uppercase;
  font-weight: 900;
  color: gray;
         }
</style>




   
  
     
 


    </div>
    
<script>
$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }
 
 load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
 
 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 5000);
 
});
</script>


      </body>
</html>
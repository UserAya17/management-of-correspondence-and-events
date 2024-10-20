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

</head>
<body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Page <span>d'admin</span></div>
                    <div class="sidebar-btn">
                      
                    </div>
                    <ul>
                   
                    <a href="home_admin.php?logout=<?php echo $user_id; ?>" class="btn1">Se déconnecter</a>
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
   ?>

                        <p><?php echo $name; ?></p>
                    </center>
                   
  <li class="item">
                        <a href="home_admin.php" class="menu-btn">
                        <i  class="fas fa-gauge"></i><span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="home_profil_admin.php" class="menu-btn">
                            <i style="color:#289ae6" class="fas fa-user-circle"></i><span style="color:#289ae6">Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                        <i class="fas fa-screwdriver-wrench"></i><span>Gestion <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="view_user.php"><i class="fas fa-users"></i><span>Utilisateur</span></a>
                  
                            <a href="view_direction.php"><i class="fas fa-computer"></i><span>Source</span></a>
                            <a href="view_entreprise.php"><i class="fas fa-building"></i><span>Entreprise</span></a>
                            <a href="view_ville.php"><i class="fas fa-city"></i><span>Ville</span></a>
                            <a href="view_type.php"><i class="fas fa-envelope-open-text"></i><span>Type</span></a>
                        </div>
                    </li>
                    <li class="item" id="profile">
                        <a href="consulter_admin.php" class="menu-btn">
                        <i class="fas fa-envelope"></i><span>Courrier </span>
                        </a>
                       
                    </li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->

            <div class="main-container">
           

       
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
        <td><p><span class="bl">id : </span><?php echo $fetch['id']; ?> </td><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td><td> <span class="bl">Nom d'utilisateur : </span><?php echo $fetch['utilname']; ?></p>
        <tr><td><br><br></td></tr>
      </td></tr><tr> <td><p><span class="bl">email : </span><?php echo $fetch['email']; ?> </td><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td><td> <span class="bl">Admin </span> </td>
              
   </table>
   <br> 
   <table>
           <tr><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>
         <td><a href="update_profile_admin.php" class="btn1">mettre à jour le profil</a></td>
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


    </body>
    </html>
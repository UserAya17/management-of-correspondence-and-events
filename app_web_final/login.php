<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
 
  
   $utilname = mysqli_real_escape_string($conn, $_POST['utilname']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));


   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE  utilname = '$utilname' AND password = '$pass' AND utiltype ='utilisateur'") or die('query failed');
   $select1 = mysqli_query($conn, "SELECT * FROM `user_form` WHERE  utilname = '$utilname' AND password = '$pass' AND utiltype ='Bureau d ordre'") or die('query failed');
   $select2 = mysqli_query($conn, "SELECT * FROM `user_form` WHERE  utilname = '$utilname' AND password = '$pass' AND utiltype ='admin'") or die('query failed');

 


   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['name']= $utilname;
      $_SESSION['direction']= $row['direction'];
     

      header('location:home_profil.php');

   //   if($row['utilname']== 'utilisateur'){
        
   //       header('location:home_profil.php');
   //    }
   //  if($row['utilname'] == "bureau d ordre"){
   //    header('location:home_direction.php');
   //    }
   //  if($row['utilname']== 'admin'){
   //    header('location:home_admin.php');
     
   //    }else{
   //       echo $row['utilname'];
   //       echo 'no';
   //    }
      
}else if(mysqli_num_rows($select1) > 0){
   $row = mysqli_fetch_assoc($select1);
$_SESSION['user_id'] = $row['id'];
$_SESSION['name']= $utilname;
$_SESSION['direction']= $row['direction'];

header('location:home_direction.php');


}else if(mysqli_num_rows($select2) > 0){
   $row = mysqli_fetch_assoc($select2);
   $_SESSION['user_id'] = $row['id'];
   $_SESSION['name']= $utilname;
   $_SESSION['direction']= $row['direction'];

   header('location:home_admin.php');

  }else{
      $message[] = 'identifiant ou mot de passe incorrect!';
   }


}

?><!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      
        <img src="file.jpg" alt="">
        <div class="text">
          <span class="text-1">Gestion de <br> courrier</span>
          <span class="text-2">Se connecter</span>
        
      </div>
      <div class="back">
        <img class="backImg" src="file.jpg" alt="">
        <div class="text">
        
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Se connecter</div>
          <form  action="" method="post" enctype="multipart/form-data">

          <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

            <div class="input-boxes">
              <div class="input-box">
              <i class="fa-solid fa-user"></i>
                <input type="text" name="utilname" placeholder="Nom d'utilisateur" required>
     </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                
      <input type="password" name="password" placeholder="Mot de passe" required>
     </div>
           
              <div class="button input-box">
              <input type="submit" name="submit" value="Se connecter" >
      </div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="#">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
             
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="utilname" placeholder="Nom d'utilisateur" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                
                <input type="password" name="password" placeholder="Mot de passe" required>
              </div>
              <div class="button input-box">
                
                <input type="submit" name="submit" value="Se connecter" >
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>

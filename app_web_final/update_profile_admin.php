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

include 'config.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $old_name = $_POST['old_name'];
  
 
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $update_pass1 =  mysqli_real_escape_string($conn,$_POST['update_pass']);

   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $new_pass1 = mysqli_real_escape_string($conn, $_POST['new_pass']);
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
   $confirm_pass1 = mysqli_real_escape_string($conn, $_POST['confirm_pass']);

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE   utilname = '$user_name' ") or die('query failed');

   if( $user_name == $old_name){
     
   }
   else if(mysqli_num_rows($select) > 0){
      $message[] = "l'utilisateur existe déjà"; 
   }else{
     
   mysqli_query($conn, "UPDATE `user_form` SET utilname = '$user_name' WHERE id = '$user_id'") or die('query failed');
   }


   if(!empty($new_pass1) || !empty($confirm_pass1 ) || !empty($confirm_pass1 )  ){
     

     if($update_pass != $old_pass){
         $message[] = "l'ancien mot de passe ne correspond pas !";
      }elseif($new_pass != $confirm_pass){
         $message[] = "confirmer le mot de passe ne correspond pas !";
      }else{
         
         mysqli_query($conn, "UPDATE `user_form` SET password = '$new_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = "Mot de passe mis à jour avec succès!";
         
      }
  
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = "l'image est trop grande";
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

<?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

<div class="main-container">
 
<br>


  
<table>
    <tr><br><br></tr>
    <tr>
            
            <td><pre>                                                               </pre></td>
<td> 






<div class="cont">
        <div class="text">profile</div>
           
      
   <form action="" method="post" enctype="multipart/form-data">
     

   <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png" width="60px">';
         }else{
            echo '<img width="60px" src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
 

<div class="form-row">
              <div class="input-data">
                
              <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                 <div class="underline"></div>
                 <label for="">Nom complet :</label>
              </div>
              <div class="input-data">
              <input type="text" name="user_name" value="<?php echo $fetch['utilname']; ?>" class="box">
                 <div class="underline"></div>
                 <label for="">Nom d'utilisateur  :</label>
              </div>
           </div>



           <div class="form-row">
              <div class="input-data">
                
              <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                 <div class="underline"></div>
                 <label for="">Votre email :</label>
              </div>
              <div class="input-data">
              <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                 <div class="underline"></div>
                
              </div>
           </div>

           
<div class="form-row">
              <div class="input-data">
                
              <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                 <div class="underline"></div>
                 <label for="">Ancien mot de passe :</label>
              </div>
              <div class="input-data">
              <input type="password" name="new_pass" placeholder="enter new password" class="box">
                 <div class="underline"></div>
                 <label for="">Nouveau mot de passe :</label>
              </div>
           </div>
                
<div class="form-row">
              <div class="input-data">
                
              <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                 <div class="underline"></div>
                 <label for="">Confirmez le mot de passe :</label>
              </div>
      </div>
              <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <input type="hidden" name="old_name" value="<?php echo $fetch['utilname']; ?>">
            <input type="hidden" name="type_user" value="<?php echo $fetch['utiltype']; ?>">



        



<input type="submit" value="Mettre à jour" name="update_profile" class="btn">


      <a href="home_profil_admin.php" class="delete-btn">Retourner</a>

  
      </form>
</tr>
</table>
</div>
</div>



 </div>
</div>






<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

.cont{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.cont .text{
  text-align: center;
  font-size: 35px;
  font-weight: 600;
  background: #289ae6;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.cont form{
  padding: 30px 0 0 0;
}
.cont form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}

.input-data1 .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: red;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}

form .form-row .input-data1{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data1 input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data1 input:focus ~ label, .textarea textarea:focus ~ label,
.input-data1 input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data1 label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data1 .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data1 .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: red;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}


.input-data1 .underline:after{
    background: red;
}


.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .cont .text{
    font-size: 30px;
  }
  .cont form{
    padding: 10px 0 0 0;
  }
  .cont form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}

</style>


</body>
</html>
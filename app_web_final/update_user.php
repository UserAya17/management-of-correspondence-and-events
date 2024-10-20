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

include ('config.php');
// id selected
  $id = $_GET['id'];
 
 ?>

<?php
$mysqli = new MYSQLI('localhost','root','','gest_cour');

$resultSet = $mysqli->query("SELECT direc_name from direction");

?>

<?php

if(isset($_POST['update_profile'])){

$update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
$direction =mysqli_real_escape_string($conn, $_POST['direction']);
$choix = mysqli_real_escape_string($conn, $_POST['utiltype']);
mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$id'") or die('query failed');


if($_POST['utiltype']=='Select user type' && $_POST['direction']=='Select source' ){


  
}else if($_POST['utiltype']!='Select user type'&& $_POST['direction']=='Select source'  ){
    $message[] = 'choisir le direction!';}
    else if($_POST['utiltype']!='Select user type' && $_POST['direction']!='Select source')
{
  if($choix==1){
    $choix='utilisateur';
  }else{
    $choix='Bureau d ordre';
  }
  mysqli_query($conn, "UPDATE `user_form` SET  direction = '$direction' , utiltype = '$choix' WHERE id = '$id'") or die('query failed');

}else{}




$old_name = $_POST['old_name'];




$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
$new_p=$new_pass;
$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE   utilname = '$user_name' ") or die('query failed');

if( $user_name == $old_name){
  
}
else if(mysqli_num_rows($select) > 0  ){
   $message[] = "l'utilisateur existe déjà
   "; 
}else{
  
mysqli_query($conn, "UPDATE `user_form` SET utilname = '$user_name' WHERE id = '$id'") or die('query failed');
}


if(!empty($new_pass) || !empty($confirm_pass )){
  

 if($new_pass != $confirm_pass){
      $message[] = "confirmer le mot de passe ne correspond pas !";
   }else{
     
      mysqli_query($conn, "UPDATE `user_form` SET password = '$new_pass' WHERE id = '$id'") or die('query failed');
      // $message[] = 'password updated successfully!';
    
   }

}





$update_image = $_FILES['update_image']['name'];
$update_image_size = $_FILES['update_image']['size'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_folder = 'uploaded_img/'.$update_image;

if(!empty($update_image)){
   if($update_image_size > 2000000){
      $message[] = "la taille de l'image est trop grande !";
   }else{
      $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$id'") or die('query failed');
      if($image_update_query){
         move_uploaded_file($update_image_tmp_name, $update_image_folder);
      }
      // $message[] = 'image updated succssfully!';
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

       <!-- jQuery CDN -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- JavaScript CDN For BootStrap  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
                            <i class="fas fa-desktop"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="home_profil_admin.php" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                        <i class="fas fa-screwdriver-wrench"></i><span>Gestion <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="view_user.php"><span>Utilisateur</span></a>
                  
                            <a href="view_direction.php"><span>Source</span></a>
                            <a href="view_entreprise.php"><span>Entreprise</span></a>
                            <a href="view_ville.php"><span>ville</span></a>
                            <a href="view_type.php"></i><span>type</span></a>
                        </div>
                    </li>
                    <li class="item" id="profile">
                        <a href="consulter_admin.php" class="menu-btn">
                        <i class="fas fa-envelope"></i><span>courrier </span>
                        </a>
                       
                    </li>

                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->

            <div class="main-container">
            

<br>
<?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

  
<table>
    <tr><br><br><br></tr>
    <tr>
            
            <td><pre>                                                   </pre></td>
<td> 






        <div class="cont">
        <div class="text">modifier utilisateur</div>
           
        <form action="" method="post" enctype="multipart/form-data">
     
     <?php
     
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }

      if($fetch['image'] == ''){
       echo '<img width="40px" src="images/default-avatar.png">';
    }else{
       echo '<img width="40px" src="uploaded_img/'.$fetch['image'].'">';
    }
   ?>

<div class="form-row">
              <div class="input-data">
                
                 <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>">
                 <div class="underline"></div>
                 <label for="">Nom complet :</label>
              </div>
              <div class="input-data">
              <input type="text" name="user_name" value="<?php echo $fetch['utilname']; ?>">
                 <div class="underline"></div>
                 <label for="">Nom d'utilisateur :</label>
              </div>
           </div>

           <div class="form-row">
              <div class="input-data">
                
        
                 <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" >
                 <div class="underline"></div>
                 <label for="">Votre email :</label>
              </div>
              <div   class="input-data">
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" >
                 <div class="underline"></div>
                 
              </div>
           </div>
   
          <div class="inputBox">
         <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
         <input type="hidden" name="old_name" value="<?php echo $fetch['utilname']; ?>">
         <input type="hidden" name="type_user" value="<?php echo $fetch['utiltype']; ?>">
       
   </div>

           <div class="form-row">
              <div class="input-data">
                
              <input type="password" name="new_pass" >
                 <div class="underline"></div>
                 <label for="">Nouveau mot de passe :</label>
              </div>
              <div class="input-data">
              
              <input type="password" name="confirm_pass"  >
                 <div class="underline"></div>
                 <label for="">Confirmez le mot de passe :</label>
              </div>
           </div>
       
     
        
       
     <table>

<td>
<label for="input1" class="col-sm-2 control-label">le type d'utilisateur :</label>

    <!-- checked -->

    <?php

  //   if ($fetch['utiltype'] == 'direction'){
  //    echo '<input type="radio" name="utiltype" value="user">'.'utilisateur'. '   ';
  //  echo '<input type="radio" name="utiltype" value="direction" checked>'.'chef de direction'. '   ';}
  //  else {
  //   echo '<input type="radio" name="utiltype" value="user" checked>'.'utilisateur'. '   ';
  //   echo '<input type="radio" name="utiltype" value="direction">'.'chef de direction'. '   ';
  //  }

?>

<select  name="utiltype" onchange="getItemList(this.value)" id="company_list" >
               <option>Select user type</option>
            </select>

</td>
<td> &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp</td>


<td>

   <label for="">  &nbsp &nbsp Direction</label>


   <select  id="item_list" name="direction">
               <option>Select direction</option>
            </select>


                          <!-- <select name="direction" value="<?php //echo $fetch['direction']; ?>"> -->
<!-- <?php
// while($rows = $resultSet->fetch_assoc())
// {
// $direc_name = $rows['direc_name'];

// if ( $rows['direc_name'] ==  $fetch['direction'])
// {
// echo "<option value='$direc_name' selected='selected' > $direc_name</option>";
// }else{

//  echo "<option value='$direc_name'> $direc_name</option>";
// }

// }
?> -->
<!-- </select> -->
</td>
</table>
<br>
   <input type="submit" value="Mettre à jour" name="update_profile" class="btn">
   <a href="view_user.php" class="delete-btn">Retourner</a>
</form>
</tr>
</table>
</div>
</div>



 </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        
      



            <div class="container">





            <!--main container end-->
        </div>
        <!--wrapper end-->

        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>


  
<style>
  
  .wrapper3 .box3{
    background: #fff;
    width: 230px;
   
    height: 100px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }
  .wrapper3 .box3 i.quote{
    font-size: 40px;
    color: #289ae6;
  }
  .name{
      color: rgb(29, 28, 28);
font-size: 12px;
text-transform: uppercase;
font-weight: 900;
  }
  
  .fa-solid{
      font-size: 40px;
      color: #289ae6;
  }
 
  </style>


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




<script type="text/javascript">
	$(document).ready(function(){
       
       let tag ="companyList"; 
       let select_menu=$('#company_list')[0]; // this expression is same as document.getElementById('dynamic_menu')
       $.ajax({
            url:"ajax.php",
            dataType:"json",
            method:"post",
            data:{tag:tag},
            success:function(response){
                //alert(response.length);
                console.log($.isArray(response)); // if response is an array, this function will return true

                response.forEach((item,index)=>{
                    console.log(index,item);
                    var option = document.createElement("option");
                    option.value = item['id_user'];

                    option.text = item['user_type'];
                    select_menu.appendChild(option);
                })
            }
        })
	});
    
    //Getting Item List on the basis of company_id
    function getItemList(util_id)
    {
        let tag = "itemList";
        let itemMenu =$('#item_list')[0];

        //Removing all the old options from item list and model list and adding only one option in one go
        $('#item_list').empty().append('<option>Select direction</option>');
    

        $.ajax({
            url:"ajax.php",
            dataType:"json",
            method:"post",
            data:{tag:tag,util_id:util_id},
            success:function(response){
                response.forEach((item,index)=>{
                    console.log(index,item);
                    var option = document.createElement("option");
                    option.value = item['direc_id'];
                    option.text = item['direc_name'];
                    itemMenu.appendChild(option);
                })
            }
        })
    }

   
   


</script>


</body>
</html>
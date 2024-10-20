
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

$con = mysqli_connect("localhost","root","","gest_cour");

if(isset($_POST['save_datetime']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $event_dt = $_POST['event_dt'];
    $event_s = $_POST['event_s'];
    $event_e = $_POST['event_e'];

    
    if(strtotime($event_e)<=strtotime($event_s)) {
        
        $message[] = "L'heure de début doit être inférieure à l'heure de fin"; 
       } else {
        
       


    $date1 = new DateTime($event_dt);
    $result1 = $date1->format('Y-m-d');

    $date2 = new DateTime($result1.' '.$event_s);
    $result2 = $date2->format('Y-m-d H:i:s');


    $date = new DateTime($result1.' '.$event_e);
    $result = $date->format('Y-m-d H:i:s');
    
   




    

    $query = "INSERT INTO events (name,description,start,end) VALUES ('$name','$description','$result2',' $result')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = $result;

        $_SESSION['status'] = "Date Time Inserted Successfully";
        header("Location: evenement.php");
    }
    else
    {
        $_SESSION['status'] = "Date Time Not Inserted";
        header("Location: evenement.php");
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

!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Page de <span> Bureau d'ordre 
                   



                     </span>
                  </div>
                    <div class="sidebar-btn">
                      
                    </div>
                    <ul>
                   
                    <a href="home_profil_direction.php?logout=<?php echo $user_id; ?>" class="btn1">Se déconnecter</a>
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
                   
                    <li class="item" id="profile">
                        <a href="home_direction.php" class="menu-btn">
                        <i class="fas fa-gauge"></i><span>Tableau de bord </span>
                        </a>
                       
                    </li>
                    <li class="item" id="profile">
                        <a href="home_profil_direction.php" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="profile">
                        <a href="view_courrier.php" class="menu-btn">
                        <i class="fas fa-envelope"></i><span>Courrier </span>
                        </a>
                       
                    </li>
                    <li class="item" id="profile">
                        <a href="evenement.php" class="menu-btn">
                        <i style="color:#289ae6" class="fas fa-calendar"></i><span style="color:#289ae6">Événement</span>
                        </a>
                       
                    </li>
                 
                </div>
            </div>

            <div class="main-container">
         
         <br>
                
         
         
         
         
         
         
         
         
         
         
                
         
         <table>
             <tr><br><br><br></tr>
             <tr>
                     
                     <td><pre>                                                   </pre></td>
         <td>  
         <div class="cont">
                 <div class="text">Ajouter un événement </div>
         
         
                
                 
                 
         
         <form action="" method="post" enctype="multipart/form-data">
           
            <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
            ?>
         
         
         
          <div class="form-row">
                       <div class="input-data">
                       <table><td>nom: &nbsp</td>
                      <td> 
                       <input type="text" name="name"  required>
                         
                       </td></table>
                       </div>
         
                       <div class="input-data">
                       <table><td>Description: &nbsp</td>
                      <td>  
                       <input type="text" name="description" required>
                       </td></table>
                         
                       </div>
                    </div>


                    <div class="form-row">
                       <div class="input-data">
                      <table><td>Date: &nbsp</td>
                      <td>   
                       <input type="date" name="event_dt" required>

                          
        </td></table>
                         
                         
                       </div>
         
                       <div class="input-data">
                       <table><td>Heure de début: &nbsp</td>
                      <td> 
                       <input type="time" name="event_s"  required>
                       </td></table>
                       </div>
                    </div>


                    <div class="form-row">
                      
                  
                       <div class="input-data">
                       <table>
                           <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
                       <td>Heure de fin: &nbsp</td>
                      <td> 
                       <input type="time" name="event_e"  required>
                       </td></table>
                         
                       </div>

                 

                    </div>


         
             
         
         
            <input  type="submit" name="save_datetime" value="Ajouter" class="btn">
           <a href="evenement.php" > <button class="btn btn-success m-3" type="button" >
                       calendrier
                     </button></a>
                    
                    
         </form>
         
         </tr>
         </table>
         </div>
         
         









<style>

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

.fas{
      font-size: 20px;
      
  }

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



form .form-row .input-data1{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
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
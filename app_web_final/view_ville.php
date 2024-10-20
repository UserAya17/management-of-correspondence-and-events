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

?>








<?php 
  require_once ('connect.php');
  $ReadSql = "SELECT * FROM `ville` ";

  $res = mysqli_query($con1, $ReadSql);

 ?>






<?php
  $host = 'localhost';
  $dbname = 'gest_cour';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "  SELECT direction FROM `user_form` WHERE  id = '$user_id'";

   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>






<?php
  $host = 'localhost';
  $dbname = 'gest_cour';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "  SELECT direction FROM `user_form` WHERE  id = '$user_id'";

   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
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



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
</head>
<body>

        

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title"><br>Page de <span>  Bureau d'ordre 
  


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
                   
                    <li class="item">
                        <a href="home_admin.php" class="menu-btn">
                        <i  class="fas fa-gauge"></i><span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="item" id="profile">
                        <a href="home_profil_admin.php" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="messages">
                        <a href="#messages" class="menu-btn">
                        <i style="color:#289ae6" class="fas fa-screwdriver-wrench"></i><span style="color:#289ae6">Gestion <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <div class="sub-menu">
                            <a href="view_user.php"><i class="fas fa-users"></i><span>Utilisateur</span></a>
                  
                            <a href="view_direction.php"><i class="fas fa-computer"></i><span>Source</span></a>
                            <a href="view_entreprise.php"><i class="fas fa-building"></i><span>Entreprise</span></a>
                            <a href="view_ville.php"><i  class="fas fa-city"></i><span >Ville</span><i class="fas fa-quote-right"></i></a>
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
         
<br>
       




<h2>liste des villes</h2>
<center>
<a href="gestion_ville.php">
  <button class="btn1" type="">
    Ajouter un ville
  </button>
</a>
    </center>
</div>  

  
<div >
  <br>
    <div class="row pt-4">
     <table><td>&nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp</td>
    <td>

    <table class="table table-striped mt-3">
      <thead>
        <tr class="cl2">
          <th><p class="cl">id</p></th>
          <th><p class="cl">Nom de ville</p></th>
          <th><p class="cl">modifier/supp</p></th>
        
        </tr>
      </thead>

      <tbody  class="cl3">
        <?php while ($r = mysqli_fetch_assoc($res)) {
        ?>

        <tr>
          <th scope="row"><?php echo $r['ville_id']; ?></th>
          <td><?php echo $r['ville']; ?></td>
        
        
          
         
<style>
  .fa-solid{
    color : red;
    font-size: 20px;
  }
  .fa{
    color : green;
    font-size: 20px;
  }
  </style>

<?php
$_SESSION['ville_id']= $r['ville_id'];
?>
          <td>
            <a href="update_ville.php?id=<?php echo $r['ville_id']; ?>" class="m-2">
              <i class="fa fa-edit fa-2x"></i>
            </a>
           
            <i class="fa-solid fa-trash-can"
             data-bs-toggle="modal"
             data-bs-target="#exampleModal<?php echo $r['ville_id']; ?>">
              
             </i>

             <div class="modal fade" id="exampleModal<?php echo $r['ville_id']; ?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                  <p>êtes-vous sûr de vouloir supprimer la ville avec l'identifiant :<?php  echo $r['ville_id']; ?> ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                    data-bs-dismiss="modal">Annuler</button>
                    <a href="delete_ville.php?id=<?php echo $r['ville_id']; ?>">
                      <button class="btn btn-danger" type="button">Confirmer</button>
                    </a>
                  </div>
                </div>
              </div>
             </div>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
        </td>
        </table>


  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>



















  <style>
.fas{
      font-size: 20px;
      
  }
li a {
  text-decoration: none;
   
}
li a:hover {
  text-decoration: none;
   
}

  .cl{
color:#fff;
}

.cl2{
  background: #289ae6;
}

.cl3{
  background: #F37AFD;
 
}

.cl4{
color:#135BA9;
}

</style>





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



</body>
</html>
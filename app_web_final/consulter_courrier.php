<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$direction = $_SESSION['direction'];



if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>




<html>
<title>courrier</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" >
<?php
date_default_timezone_set("Asia/Calcutta");
//echo date_default_timezone_get();
?>

<?php include('db.php'); ?>


<html>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>



<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>


<!-- excel -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 



</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>


<body>
<?php include('db.php'); ?>

<!--wrapper start-->
<div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Page <span>d'utilisateur</span></div>
                    <div class="sidebar-btn">
                       
                    </div>
                    <ul>
                   
                    <a href="home_profil.php?logout=<?php echo $user_id;  ?>" class="btn1">Se déconnecter</a>
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
                        <a href="home_profil.php" class="menu-btn">
                            <i class="fas fa-user-circle"></i><span>Profile </span>
                        </a>
                       
                    </li>
                    <li class="item" id="messages">
                        <a href="consulter_courrier.php" class="menu-btn">
                            <i style="color:#289ae6" class="fas fa-envelope"></i><span style="color:#289ae6">courrier </span>
                        </a>
                       
                    </li>
                   
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->



            <div class="main-container">
         
<br>



<style>

	
#wb_Form1
{
   background-color: #00BFFF;
   border: 0px #000 solid;
  
}
#photo
{
   border: 1px #A9A9A9 solid;
   background-color: #00BFFF;
   color: #fff;
   font-family:Arial;
   font-size: 20px;
}
	</style>

<tr><br><br><br></tr>

<tr>
<td>

	



							 <div class="col-md-18">
	<div class="container-fluid" style="margin-top:0px;">
   <div >
		 <div >
		<div >
				<div >





							<form method="post" action="delete.php" >
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped mt-3" id="example">
                            
                            <thead>
						
                                <tr class="cl2">
                              
                                    
                                    <th ><i style="color:#AEF5F8;" class="fa-solid fa-arrow-down-a-z"></i><p class="cl">ID</p></th>
                                    <th ><p class="cl">NOM DE FICHIER</p></th>
									
                                    <th><p class="cl">ENREPRISE MESSAGERIE</p></th>
                                    <th><p class="cl">DATE ET HEURE</p></th>
                                 
                                   
                                    <th><p class="cl">VILLE SOURCE</p></th>
                                    <th><p class="cl">OBJET</p></th>
                                    <!-- <th><p class="cl">DESTINATION</p></th>  -->
                                    <th><p class="cl">NOMBRE DE COURRIER</p></th>
                                    <th><p class="cl">TYPE</p></th>
                                    <th><p class="cl">NUMERO DE BON</p></th>
                                    <th><p class="cl">AUTRE INFORMATION</p></th>

                                     
                                    <th><p class="cl">Voir</p></th>
                                    <th><p class="cl">TÉLÉCHARGER</p></th>
                                    <th><p class="cl"></p></th>
				
                                   
                                   

                  
                 
                  
                  				
									
                                 
								   
								   
								   
                   


				
				
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysqli_query($conn,"select * from  cr_entrant where dest_direc =(select direc_name from direction where direc_id = '$direction')  ORDER BY id DESC")or die(mysqli_error($conn));
							while($row=mysqli_fetch_array($query)){
							$id=$row['id'];
							$name=$row['name'];
							
							$entreprise=$row['entreprise'];
							$date=$row['date'];

							?>
                              
										<tr class="cl3">
										
                                         <td><p class="cl4"><?php echo $row['id'] ?></p></td>
                                         <td><?php echo $row['name'] ?></td>
										 
										 <td><?php echo $row['entreprise'] ?></td>
                                         <td><?php echo $row['date'] ?></td>
										 
										 <td><?php echo $row['ville_ent'] ?></td>
										 <td><?php echo $row['objet_ent'] ?></td>
										 <!-- <td><?php //echo $row['dest_direc'] ?></td> -->
                                         <td><?php echo $row['nbr_cour'] ?></td>
                                         <td><?php echo $row['type_ent'] ?></td>
                                         <td><?php echo $row['numero'] ?></td>
                     <td><?php echo $row['comment'] ?></td>

                     <td>
				<a href="voir.php?fileid=<?php echo $id;?>" title="click to voir"><i class="fa-solid fa-envelope-open-text"></i></a>
				</td>

										<td>
                                        &nbsp &nbsp &nbsp &nbsp<a href="download.php?filename=<?php echo $name;?>" title="click to download"><i class="fa-solid fa-download"></i></a>
				</td>
                <td>
                <?php 
     $select3333 = mysqli_query($conn, "SELECT * FROM `comments` WHERE  user_id = '$user_id' AND cr_id = '$id' and comment_status=0 and type_cr='ent'") or die('query failed');
     if(mysqli_num_rows($select3333) > 0){
echo '<img width="50px" src="images/new.png" >';
     }
     else {
        
     }
                ?>
                </td>
				
                                </tr>
                         
						          <?php } ?>
                            </tbody>
                        </table>
						
                              
                               
								
                            </div>
          
</form>


							</td>
							</tr>

</table>

        </div>
        </div>
        </div>
    </div>

<br><br>

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
.btn_ex{
  font-family: "Roboto", sans-serif;
  font-size: 13px;
  font-weight: bold;
  background: #1fdc15b7;
  width: 150px;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: box-shadow, transform;
  transition-property: box-shadow, transform;
}


.cl{
color:#fff;
}

.cl2{
  background: #289ae6;
}

.cl3{
  background: #D3E5F7;
}

.cl4{
color:#135BA9;
}

</style>

<?php
$connect6 = mysqli_connect("localhost", "root", "", "gest_cour");
$sql6 = "select * from  cr_entrant where dest_direc =(select direc_name from direction where direc_id = '$direction') ";
$result6 = mysqli_query($connect6, $sql6);
?>

<form method="post" action="export.php">
     <input type="submit" name="export" class="btn_ex" value="Exporter" />
    </form>


<script type="text/javascript">
$(document).ready(function(){
$(".sidebar-btn").click(function(){
    $(".wrapper").toggleClass("collapse");
});
});
</script>




</body>
</html>



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




<html>
<title>File|Mgr</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" rel="shortcut icon">
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
                        <i style="color:#289ae6" class="fas fa-envelope"></i><span style="color:#289ae6">Courrier </span>
                        </a>
                       
                    </li>
                    <li class="item" id="profile">
                        <a href="evenement.php" class="menu-btn">
                        <i class="fas fa-calendar"></i><span>Événement</span>
                        </a>
                       
                    </li>
                   
                   
                </div>
            </div>

            <div class="main-container">

 

			<table>
<tr><br><br><br><br></tr>

    <tr>

    <td>     &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
    <td>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


  .fas{
      font-size: 20px;
      
  }
  li a {
  text-decoration: none;
   
}
li a:hover {
  text-decoration: none;
   
}

.nav-links{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  display: flex;
  align-items: center;
  background: #fff;
  padding: 20px 15px;
  border-radius: 12px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.nav-links li{
  list-style: none;
  margin: 0 12px;
}
.nav-links li a{
  position: relative;
  color: #333;
  font-size: 20px;
  font-weight: 500;
  padding: 6px 0;
  text-decoration: none;
}
.nav-links li a:before{
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3px;
  width: 0%;
  background: #3498db;
  border-radius: 12px;
  transition: all 0.4s ease;
}
.nav-links li a:hover:before{
  width: 100%;
}
.nav-links li.center a:before{
  left: 50%;
  transform: translateX(-50%);
}
.nav-links li.upward a:before{
  width: 100%;
  bottom: -5px;
  opacity: 0;
}
.nav-links li.upward a:hover:before{
  bottom: 0px;
  opacity: 1;
}
.nav-links li.forward a:before{
  width: 100%;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.4s ease;
}
.nav-links li.forward a:hover:before{
  transform: scaleX(1);
  transform-origin: left;
}

.j{
    color : #3498db;
}
.j2{
    color : black;
}
    </style>


    <ul class="nav-links">
    <li ><a href="view_courrier.php"><p class="j">tous les courriers</p></a></li>
    <li ><a href="view_courrier_entrant.php"><p class="j2">entrant</p></a></li>
    <li ><a href="view_courrier_sortant.php"><p class="j2" >sortant</p></a></li>
  
  </ul>
</td>
</tr>
</table>


						
<table>



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
									
									<th><p class="cl">ENREPRISE MESSAGERIE / DESTINATION</p></th>
									<th><p class="cl">DATE ET HEURE</p></th>
                  <th><p class="cl">VILLE SOURCE</p></th>

                   <th><p class="cl">NOMBRE DE COURRIER</p></th>
                   <th><p class="cl">TYPE</p></th>
                   <th><p class="cl">NUMERO DE BON</p></th>
                   <th><p class="cl">OBJET</p></th>	
                   <th><p class="cl">DESTINATION / SOURCE</p></th>			  
                   <th><p class="cl">AUTRE INFORMATION</p></th>


				<th><p class="cl">TÉLÉCHARGER</p></th>
                
			
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							$query=mysqli_query($conn,"select id,name,entreprise,date,nbr_cour,numero,comment,ville_ent,objet_ent,dest_direc,type_ent from  cr_entrant union select id,name,entreprise,date,nbr_cour,numero,comment,ville_ent,objet_ent,dest_direc,type_ent from cr_sortant ")or die(mysqli_error($conn));
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
                     <td><?php echo $row['nbr_cour'] ?></td>
                     <td><?php echo $row['type_ent'] ?></td>
                     <td><?php echo $row['numero'] ?></td>
                     <td><?php echo $row['objet_ent'] ?></td>	
                     <td><?php echo $row['dest_direc'] ?></td>			
                     <td><?php echo $row['comment'] ?></td>
										<td>
				<a href="download.php?filename=<?php echo $name;?>" title="click to download"><i class="fa-solid fa-download"></i></a>
				</td>
               
				<!-- <td>
				<a href="delete.php?del=<?php echo $row['id']?>"><i class="fa-solid fa-circle-minus"></i></a>
				</td> -->
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



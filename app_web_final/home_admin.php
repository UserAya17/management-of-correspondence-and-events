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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>







    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>







<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
          





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
                        <i style="color:#289ae6" class="fas fa-gauge"></i><span style="color:#289ae6">Tableau de bord</span>
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
            <p class="bv">bienvenue dans la page d'administration  <?php echo $name; ?> </p>
            <table>
            <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
          <td><h4>le nombre de nouveaux courriers entrants : &nbsp</h4></td>
<td>
  <?php
include "test2.php";  
?>     
</td>
<td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
<td><h4>le nombre de nouveaux courriers sortants : &nbsp</h4></td>
<td>

<?php
include "test.php";
?>
</td>


   </table>

<br>
            <table>
        <td>
  <div class="wrapperu">
    <div class="boxu">
        
        <table><td><div class="name">nombre totale d'utilisateur</div></td> <td>&nbsp &nbsp &nbsp   </td>   <td><i class="fa-solid fa-users"></i></td></table>
      
      <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM user_form where utiltype !='admin'";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo $rowcount; 
        }
        ?>
        </div></p>
      </div>
    </div></td>
<td>&nbsp &nbsp </td>
    <td>
        <div class="wrapperc">
          <div class="boxc">
              
              <table><td><div class="name">nombre totale de courrier</div></td>  <td>&nbsp &nbsp &nbsp   </td>     <td><i class="fa-solid fa-envelopes-bulk"></i></td></table>
            
            <p>  <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM cr_entrant";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            //echo $rowcount; 
        }

        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM cr_sortant";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount2=mysqli_num_rows($result);
            $x= $rowcount2+ $rowcount;
            echo $x; 
        }
        ?>

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

.btn4{
  font-family: "Roboto", sans-serif;
  font-size: 30px;
  font-weight: bold;
  background: #289ae6;
  width: 30px;
  padding: 3px;
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

</style>
<table>
    <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
    <td>
<form method="post">
<input type="submit" name="read" value="+" class="btn4">
</form></td></table>
        <p></p>
            </div>
          </div></td>
          <td>&nbsp &nbsp </td>
          <td>
            <div class="wrapperf">
              <div class="boxf">
                  
                  <table><td><div class="name">nombre totale de source</div></td>   <td>&nbsp &nbsp &nbsp  &nbsp  </td>  <td><i class="fa-solid fa-computer"></i></td></table>
                
                <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM direction";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo $rowcount; 
        }
        ?>
        </div></p>
                </div>
              </div></td>

              <td>&nbsp &nbsp </td>
              <td>
                <div class="wrappere">
                  <div class="boxe">
                      
                      <table><td><div class="name">nombre totale d'entreprise</div></td>  <td>&nbsp &nbsp &nbsp  &nbsp  </td>   <td><i class="fa-solid fa-building"></i></td></table>
                    
                    <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM entreprise";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo $rowcount; 
        }
        ?>
        </div></p>
                    </div>
                  </div></td>
   
    </td>
    </table>

<br>
<!-- ------------------------------------------------------------------------------------------------------------------ -->
    <table><td>
    <td>
                <div class="wrappert">
                  <div class="boxt">
                      
                  <table><td><div class="name">nombre totale de type courrier</div></td> <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>    <td><i class="fa-solid fa-envelope-open-text"></i></td></table>
                    
                    <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM type_cour";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo $rowcount; 
        }
        ?>
        </div></p>
                    </div>
                  </div></td>
   
    </td>

              <td>&nbsp &nbsp </td>
              <td>
                <div class="wrapperv">
                  <div class="boxv">
                      
                  <table><td><div class="name">nombre totale de ville</div></td> <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </td>   <td><i class="fa-solid fa-city"></i></td></table>
                    
                    <p> <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
        $user='root';
        $pass='';
        $db='gest_cour';
        
        
        $conn = new mysqli('localhost', $user, $pass, $db);
        $sql = "SELECT * FROM ville";
        if ($result=mysqli_query($conn,$sql)) {
            $rowcount=mysqli_num_rows($result);
            echo $rowcount; 
        }
        ?>
        </div></p>
                    </div>
                  </div></td>
   
    </td>
    </table>
    <div>

    <?php

if (array_key_exists('read',$_POST))
{
button();
}
function button(){

echo '<table>'.'<td>';

echo '<br>'.'<br>'.'<br>'.'<br>'.'<br>';
echo '<div class="wrapper4">';
echo '<div class="box4">';
    
    echo '<table>'.'<td>'.'<div class="name">'."le nombre de courrier entrant".'</div>'.'</td>';
  
        echo '<td>'.'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.'<i class="fa-solid fa-reply">'.'</i>'.'</td>'.'</table>';
  
  echo '<p>'.'<div class="h5 mb-0 font-weight-bold text-gray-800">'."";
    echo '</div>';
    $user='root';
    $pass='';
    $db='gest_cour';
    
    
    $conn = new mysqli('localhost', $user, $pass, $db);
    $sql = "SELECT * FROM cr_entrant";
    if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
        echo $rowcount; 
    }
  echo '</p>'.'</div>';
  echo '<table>';
  echo '<td>'.'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.'</td>';
  echo '<td>';
echo '<form method="post">';
echo '<input type="submit" name="read3" value="view" class="btn1">';
echo '</form>'.'</td>'.'</table>';





  echo '</td>'.'<td>'.'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.'</td>';


 

echo '<td>';



echo '<br>'.'<br>'.'<br>'.'<br>'.'<br>';
echo '<div class="wrapper4">';
echo '<div class="box4">';
    
    echo '<table>'.'<td>'.'<div class="name">'."le nombre de courrier sortant".'</div>'.'</td>';
  
        echo '<td>'.'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.'<i class="fa-solid fa-share">'.'</i>'.'</td>'.'</table>';
  
  echo '<p>'.'<div class="h5 mb-0 font-weight-bold text-gray-800">'."";
    echo '</div>';
    $user='root';
    $pass='';
    $db='gest_cour';
    
    
    $conn = new mysqli('localhost', $user, $pass, $db);
    $sql = "SELECT * FROM cr_sortant";
    if ($result=mysqli_query($conn,$sql)) {
        $rowcount=mysqli_num_rows($result);
        echo $rowcount; 
    }
  echo '</p>'.'</div>';
  echo '<table>';
  echo '<td>'.'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'.'</td>';
  echo '<td>';
echo '<form method="post">';
echo '<input type="submit" name="read4" value="view" class="btn1">';
echo '</form>'.'</td>'.'</table>';



echo '</td>'.'</table>';





}










?>



<?php


if (array_key_exists('read3',$_POST))
{
button3();
}
function button3(){

echo '<br>'.'<br>'.'<div class="name">'."la liste des 10 derniers courriers entrant".'</div>';

echo '<br>'.'<br>';

echo '<div class="col-md-18">';
echo '<div class="container-fluid" style="margin-top:0px;">';






echo '<form method="post" action="delete.php" >';
                        echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped mt-3" id="example">';
                            
                        echo '<thead>';
						
                               echo '<tr class="cl2">';
                                    
                                   echo '<th>'.'<p class="cl">'.'ID'.'</p>'.'</th>';
                                   echo '<th >'.'<p class="cl">'.'NOM DE FICHIER'.'</p>'.'</th>';
									
                                   echo '<th>'.'<p class="cl">'.'ENREPRISE MESSAGERIE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'DATE ET HEURE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'DESTINATION'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'VILLE SOURCE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'OBJET'.'</p>'.'</th>';
                                  
                                   echo '<th>'.'<p class="cl">'.'NOMBRE DE COURRIER'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'TYPE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'NUMERO DE BON'.'</p>'.'</th>';
                                   
                                   echo '<th>'.'<p class="cl">'.'AUTRE INFORMATION'.'</p>'.'</th>';
                              
				
                              
                                echo '</tr>'.'</thead>'.'<tbody>';
                            
                                include 'connect.php';
					
							$query=mysqli_query($conn,"select * from  cr_entrant ORDER BY id DESC LIMIT 10")or die(mysqli_error($conn));
            
							while($row=mysqli_fetch_array($query)){
							$id=$row['id'];
							$name=$row['name'];
							
							$entreprise=$row['entreprise'];
							$date=$row['date'];

						
                              
                            echo '<tr class="cl3">';
										
                                         echo '<td>'.'<p class="cl4">'.$row['id'].'</p>'.'</td>';
                                         echo '<td>'. $row['name'].'</td>';
                                        
                                         echo '<td>'.$row['entreprise'].'</td>';
										 
										
                                         echo '<td>'.$row['date'].'</td>';
                                         echo '<td>'.$row['dest_direc'].'</td>';
                                         echo '<td>'.$row['ville_ent'].'</td>';
										 
										
                                         echo '<td>'.$row['objet_ent'].'</td>';
										 
                                        

                                         echo '<td>'.$row['nbr_cour'].'</td>';
                                         echo '<td>'.$row['type_ent'].'</td>';
                                         echo '<td>'.$row['numero'].'</td>';
                                         echo '<td>'.$row['comment'].'</td>';
										
										echo '<td>';
				echo '</tr>';
				
                                
                         
						          } 
                            echo '</tbody>'.'</table>'.'</div>'.'</form>'.'</div>'.'</div>';
                        
						













}




if (array_key_exists('read4',$_POST))
{
button4();
}
function button4(){
echo '<br>'.'<div class="name">'."la liste des 10 derniers courriers sortant".'</div>';
echo '<br>'.'<br>';







echo '<div class="col-md-18">';
echo '<div class="container-fluid" style="margin-top:0px;">';






echo '<form method="post" action="delete.php" >';
                        echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-striped mt-3" id="example">';
                            
                        echo '<thead>';
						
                               echo '<tr  class="cl2">';
                                    
                                   echo '<th >'.'<p class="cl">'.'ID'.'</p>'.'</th>';
                                   echo '<th >'.'<p class="cl">'.'NOM DE FICHIER'.'</p>'.'</th>';
									
                                   echo '<th>'.'<p class="cl">'.'ENREPRISE DESTINATION'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'DATE ET HEURE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'SOURCE'.'</p>'.'</th>';
                                 
                                   echo '<th>'.'<p class="cl">'.'VILLE SOURCE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'OBJET'.'</p>'.'</th>';

                                   echo '<th>'.'<p class="cl">'.'NOMBRE DE COURRIER'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'TYPE'.'</p>'.'</th>';
                                   echo '<th>'.'<p class="cl">'.'NUMERO DE BON'.'</p>'.'</th>';
                                   
                                   echo '<th>'.'<p class="cl">'.'AUTRE INFORMATION'.'</p>'.'</th>';
                               
				
                                
            
                              
                                echo '</tr>'.'</thead>'.'<tbody>';
                            
                                include 'connect.php';
					
							$query=mysqli_query($conn,"select * from  cr_sortant ORDER BY id DESC LIMIT 10")or die(mysqli_error($conn));
							while($row=mysqli_fetch_array($query)){
							$id=$row['id'];
							$name=$row['name'];
							
							$entreprise=$row['entreprise'];
							$date=$row['date'];

						
                              
                            echo '<tr class="cl3">';
										
                                         echo '<td>'.'<p class="cl4">'.$row['id'].'</p>'.'</td>';
                                         echo '<td>'. $row['name'].'</td>';
                                        
                                         echo '<td>'.$row['entreprise'].'</td>';
										 
										
                                         echo '<td>'.$row['date'].'</td>';
                                         echo '<td>'.$row['dest_direc'].'</td>';
                                       
                                         echo '<td>'.$row['ville_ent'].'</td>';
										 
										
                                         echo '<td>'.$row['objet_ent'].'</td>';

										 
                                         echo '<td>'.$row['nbr_cour'].'</td>';
                                         echo '<td>'.$row['type_ent'].'</td>';
                                         echo '<td>'.$row['numero'].'</td>';
                                         echo '<td>'.$row['comment'].'</td>';
										

										echo '<td>';
				echo '</tr>';
				
                                
                         
						          } 
                            echo '</tbody>'.'</table>'.'</div>'.'</form>'.'</div>'.'</div>';
                        
						


}

?>



    </div>



    <br /><br /> 
 
    <br /><br /> 
    <?php  
 $connect = mysqli_connect("localhost", "root", "", "gest_cour");  
 $query = "SELECT utiltype, count(*) as number FROM user_form where utiltype !='admin' GROUP BY utiltype";  
 $result = mysqli_query($connect, $query);  
 ?>  

<table><td>


 <table><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
 <td>
 <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['utiltype', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["utiltype"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: "pourcentage de types d'utilisateurs",  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>   
           
           <div style="width:500px;">  
                <!-- <h3 >Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>   -->
                <br />  
                <div id="piechart" style="width: 600px; height: 500px;"></div>  
           </div>  

        </td>
        </table>

        </td>
 <td>
<table>
 

        <?php  
 $connect = mysqli_connect("localhost", "root", "", "gest_cour");  
 $query = "SELECT entreprise, count(*) as number FROM cr_entrant  GROUP BY entreprise";  
 $result = mysqli_query($connect, $query);  
 ?>   

 <table><td>
  <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['entreprise', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["entreprise"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: "la société la plus demandée",  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>  
           
           <div style="width:500px;">  
                <!-- <h3 >Make Simple Pie Chart by Google Chart API with PHP Mysql</h3>   -->
                <br />  
                <div id="piechart2" style="width: 600px; height: 500px;"></div>  
           </div>  

        </td></table>

        </td>
        </table>


         

        



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
    width: 300px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  .wrapper3 .box3 i.quote{
    font-size: 40px;
    color: #289ae6;
  }



  .wrapperu .boxu{
    background: pink;
    width: 300px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  .wrapperu .boxu i.quote{
    font-size: 40px;
    color: #289ae6;
  }


  .wrapperc .boxc{
    background: lightgreen;
    width: 300px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  .wrapperc .boxc i.quote{
    font-size: 40px;
    color: #289ae6;
  }



  
  .wrapperf .boxf{
    background: #FFFC96;
    width: 300px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  .wrapperf .boxf i.quote{
    font-size: 40px;
    color: #289ae6;
  }


  .wrappere .boxe{
    background: #96EDFF;
    width: 300px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  .wrappere .boxe i.quote{
    font-size: 40px;
    color: #289ae6;
  }


  .wrappert .boxt{
    background: #FDBE7A;
    width: 610px;
   
   height: 120px;
   padding: 25px;
 
   box-shadow: 0px 4px 8px #289ae6;
  }

  .wrappert .boxt i.quote{
    font-size: 40px;
    color: #289ae6;
  }


  .wrapperv .boxv{
    background: #F37AFD;
    width: 610px;
   
   height: 120px;
   padding: 25px;
 
   box-shadow: 0px 4px 8px #289ae6;
  }

  .wrapperv .boxv i.quote{
    font-size: 40px;
    color: #289ae6;
  }




  .wrapper5 .box5{
    background: #fff;
    width: 610px;
   
    height: 120px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }

  

  .wrapper5 .box5 i.quote{
    font-size: 40px;
    color: #289ae6;
  }




  .wrapper4 .box4{
    background: lightgreen;
    width: 500px;
   
    height: 200px;
    padding: 25px;
  
    box-shadow: 0px 4px 8px #289ae6;
  }
  .wrapper4 .box4 i.quote{
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
      /* color: #289ae6; */
      color: #289ae6;
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








						





<!-- 
<div class="container"> -->




</body>
</html>
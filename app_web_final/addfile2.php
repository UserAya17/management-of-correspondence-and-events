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
//connect.php;
$connect = mysqli_connect("localhost", "root", "", "gest_cour");
?>



<?php
$conn=new PDO('mysql:host=localhost; dbname=gest_cour', 'root', '') or die(mysqli_error($conn));
if(isset($_POST['submit'])!=""){
	
	// $type_cour = $_POST['type_cour'];
   
    $entreprise = $_POST['entreprise'];
    $ville = $_POST['ville'];
    $objet_ent = $_POST['objet_ent'];
    $nbr_cour = $_POST['nbr_cour'];
    $type_ent = $_POST['type_ent'];
    $numero = $_POST['numero'];
    $comment = $_POST['comment'];
    $direction = $_POST['direction'];
    // $direction = $_POST['direction'];

	
  $name=$_FILES['photo']['name'];
  $size=$_FILES['photo']['size'];
  $type=$_FILES['photo']['type'];
  $temp=$_FILES['photo']['tmp_name'];
  date_default_timezone_set("Africa/Casablanca");
  
  $date = date('Y-m-d H:i:s');     
  $caption1=$_POST['caption'];
  $link=$_POST['link'];
  
  move_uploaded_file($temp,"files/".$name);


////

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gest_cour";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cr_sortant (name,entreprise,date,ville_ent,objet_ent,nbr_cour,type_ent,numero,comment,dest_direc) VALUES ('$name','$entreprise','$date','$ville','$objet_ent','$nbr_cour',' $type_ent','$numero','$comment','$direction')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    header("location:view_courrier_sortant.php");
} 


/////

 /////admin ////


$query55=mysqli_query($connect,"select * from  user_form where utiltype = 'admin'  ")or die(mysqli_error($connect));
while($row55=mysqli_fetch_array($query55)){
$id=$row55['id'];


$query77 = "
INSERT INTO comments(comment_subject, comment_text,user_id,direc_id,cr_id,type_cr)
VALUES ('$objet_ent', '$entreprise','$id','0','$last_id','sort')
";
mysqli_query($connect, $query77);
}




}




?>











<?php
$mysqli = new MYSQLI('localhost','root','','gest_cour');

$resultSet = $mysqli->query("SELECT ent_name from entreprise");

$resultSet2 = $mysqli->query("SELECT direc_name from direction");
$resultSet3 = $mysqli->query("SELECT ville from ville");
$resultSet4 = $mysqli->query("SELECT type_cour from type_cour");

?>



<!-- /// -->


<html>
<title>File|Mgr</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
<link href="globe.png" rel="shortcut icon">
<?php

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
                        <a href="home_profil_direction.php" class="menu-btn">
                        <i class="fas fa-gauge"></i><span>Tableau de bord</span>
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
                        <i class="fas fa-calendar"></i><span>Événement </span>
                        </a>
                       
                    </li>
                   
                  
                </div>
            </div>

   

            <div class="main-container">
         
<br>
       










       

<table>
    <tr><br><br><br></tr>
    <tr>
            
        <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>  
  <td>  
<div class="cont">
        <div class="text">Ajouter courrier sortant </div>


       
        
        

<form action="" method="post" enctype="multipart/form-data">
  
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>



 <div class="form-row">
 <div   class="input-data1"><input type="file" name="photo" id="photo"  required="required">
                 <div class="underline"></div>
                 
              </div>
          <span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>
              <label for=""> ville source: </label>
              <div   class="input-data1">
                 <table>
              
              <td>
              <select name="ville">

<?php
while($rows = $resultSet3->fetch_assoc())
{
  $ville = $rows['ville'];
echo "<option value='$ville'>$ville</option>";

}

?>
</select></td>
  </table>
                 
                 
              </div></div>
        


              <div class="form-row">
              <div class="input-data">
              <input type="text" name="objet_ent"   required="required">
                 <div class="underline"></div>
                
                 <label for="" >objet:</label>
              </div>
              <span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>
           
              <label for="">entreprise destination: </label>
              <div   class="input-data1">
                 <table>
              
              <td>

             
<select name="entreprise">

<?php
while($rows = $resultSet->fetch_assoc())
{
  $ent_name = $rows['ent_name'];
echo "<option value='$ent_name'>$ent_name</option>";

}

?>
</select>
</td>
  </table>
                 
                 
              </div></div>




              <div class="form-row">
              <div class="input-data">
              <input type="number" name="nbr_cour"   required="required">
                 <div class="underline"></div>
                
                 <label for="" >nombre de courrier:</label>
              </div>
          
              <div class="input-data">
              
              <input type="number" name="numero"   required="required">
                 <div class="underline"></div>
                
                 <label for="" >Numéro de bon:</label>
              </div>

                 
                 
             </div>



<table>
  <td>


              <div class="form-row">
              <span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </span><label for=""> type: </label>
              <div   class="input-data1">
                 <table>
              
              <td>
              <select name="type_ent">

<?php
while($rows = $resultSet4->fetch_assoc())
{
  $type_cour = $rows['type_cour'];
echo "<option value='$type_cour'>$type_cour</option>";

}

?>
</select>

</td>
  </table>
                 
                 
              </div> </div>
</td>


 <td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>      
             
<td>
  <table><td><label for="">source:</label></td>
  <td>&nbsp &nbsp</td>
  <td>
              <div class="input-group">
              <select name="direction">

<?php
while($rows = $resultSet2->fetch_assoc())
{
  $direc_name = $rows['direc_name'];
echo "<option value='$direc_name'>$direc_name</option>";

}

?>
</select> <div class="input-msg text-orange"></div>
     </div>
</td>
</table>
<script src="js/count.js"></script>
</td>
</table>



<br>
<table>
  <td>  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td><td><label for=""> autre information: &nbsp </label></td>
  <td>&nbsp &nbsp</td>
  <td>
              <div class="input-group">
       <textarea placeholder="commentaire" maxlength="100" data-max-chars="100" class="input-control count-chars" name="comment"></textarea>
       <div class="input-msg text-orange"></div>
     </div>
</td>
</table>
<br>
<script src="js/count.js"></script>

   <input type="submit" name="submit" value="ajouter courrier" class="btn">
  <a href="view_courrier_sortant.php" > <button class="btn btn-success m-3" type="button" >
              voir la liste
            </button></a>
            
           
            
</form>

</tr>
</table>
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

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
.fas{
      font-size: 20px;
      
  }

li a {
  text-decoration: none;
   
}
li a:hover {
  text-decoration: none;
   
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
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}


.input-data1 .underline:before{
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

<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '1');
if (!isset($_SESSION["admin"])) {
    header("location: connexion.php"); 
    exit();
}

$id = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$admin = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["admin"]);
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 
 
$link=mysqli_connect("localhost","root","","ecobuildexpert");
if(mysqli_connect_errno()) {
    printf("ECHEC DE LA CONNEXION :%s\n",mysqli_connect_error());
    exit();} 
$query = "SELECT * FROM `tableadmin` WHERE ID='$id' AND USERNAME='$admin' AND PASSWORD='$password' LIMIT 1"; 
$result =mysqli_query($link,$query);
$existCount = mysqli_num_rows($result); 
if ($existCount == 0) { 
   echo "Your login session data is not on record in the database.";
     exit();
}

 if(isset($_POST["projet_name"])&&isset($_POST["partenaire"])&&isset($_POST["developpement"])&&isset($_POST["image"]))
  {$projet_name=$_POST["projet_name"];
    
    $partenaire=$_POST["partenaire"];
    
    $developpement=$_POST["developpement"];
    $img=$_POST["image"];
    
    
    $query = "UPDATE projets  SET NomProjet='$projet_name',Partenaire='$partenaire',developpement='$developpement',NouvelleProjet='1',ImgProjet='$img'WHERE NumProjet='$idchange' ";

    $result =mysqli_query($link,$query);
    if($result)
    {
       
    }
  }


if(isset($_POST["projet_name"])&&isset($_POST["partenaire"])&&isset($_POST["developpement"])&&isset($_POST["image"]))
  {$projet_name=$_POST["projet_name"];
    
    $partenaire=$_POST["partenaire"];
    
    $developpement=$_POST["developpement"];
    $img=$_POST["Image"];
    
   

    $query = "INSERT INTO projets (`NomProjet`,`Partenaire`,`developpement`, `NouvellePro`,`ImgProjet`) VALUES ('$product_name','$partenaire','$developpement' ,'1','$img')"; 
    $result =mysqli_query($link,$query);
    if($result)
    {
       
    }
  }
 
 if(isset($_POST["idvoir"]))
{$idvoir=$_POST["idvoir"];
    $query="SELECT * FROM projets WHERE NumProjet=$idvoir LIMIT 1";
    $result =mysqli_query($link,$query);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
     $projet_name=$_POST["projet_name"];
    
    $partenaire=$_POST["partenaire"];
    
    $developpement=$_POST["developpement"];
    $image=$_POST["ImgProjet"];
    }
    mysqli_free_result($result);
}

if(isset($_POST["idsupprimer"]))
{$idsupprimer=$_POST["idsupprimer"];
    $query="DELETE FROM projets where NumProjet ='$idsupprimer' LIMIT 1";
    $result =mysqli_query($link,$query);
}






?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="description" content="société ecobuild expert sarl"/>
<title>ECOBUILD</title>
<style>
	
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?PHP
$link=mysqli_connect("localhost","root","","projetsqlphp");

if(mysqli_connect_errno()) {
  printf("ECHEC DE LA CONNEXION :%s\n",mysqli_connect_error());
  exit();}
  $query="SELECT NumProjet,NomProjet,Partenaire,ImgProjet FROM `projets` WHERE NouvellePro='1' and NumProjet!='$id'";
  $result =mysqli_query($link,$query);
    ?>


<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="cssAdmin.css" />
</head>
<body>

<header>
	<h2><a href="#" class="logo">ECOBUILD EXPERT</a></h2>
	<ul> 
        <li><a href="Ecobuild.php">Accueil</a></li>
        <li><a href="About us.php">À propos</a></li>
        <li><a href="Secteur.php" >Secteurs</a></li>
        <li><a href="Project.php">Projets</a></li>
        <li><a href="#">Refer & Distinc</a></li>
        <li><a href="contact us.php">Contact</a></li>
        <li> 
            <?PHP 
      if(isset($_SESSION["client"]) && isset($_SESSION["password"]))
      {
        echo ' 
       <a href="deconnexion.php">Deconnexion</a>';
      }
      else
      {
        echo ' 
        <a href="connexion.php">Connexion</a>';
      }
      ?>
        
      </li>
    </ul>
</header>
<div class="vide">
  
</div>
 <div class="Contner">
<div class="descrip">
<h2 align="left">Welcome  <?php echo $admin;  ?></h2>
<div class="nompro">

<br/>
<p>Inserer un Projet</p>
<form method="post" action="admin.php"  name="myForm" id="myform" >
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="30%" align="left"><h4>Nom du Projet :</h4></td>
        <td width="80%"><label>
          <div class="search-input"><input name="projet_name" type="text" id="product_name" size="64" required/></div>
        </label></td>
      </tr>
      
      <tr>
      <td align="left"><h4>Partenaire :</h4></td>
        <td><label>
          <div class="search-input"><input name="partenaire" type="number" id="qte" size="64" required /></div>
        </label></td>
      </tr>
     
      <tr>
        <td align="left"><h4>developpement :</h4></td>
        <td><label>
        <div class="search-input">  
        <textarea name="developpement" id="details" cols="68" rows="5" required></textarea>
        </div></label></td>
      </tr>
      <tr>
        <td align="left"><h4>Image du projet :</h4></td>
        <td><label>
          <div class="search-input"><input type="text" name="Image" id="image" size="64" required/></div>
        </label></td>
      </tr>      
      <tr>
        <td><label>
        <div class="nompro"><input type="submit" name="button" class="bnN" id="button" value="Insert"/></div>
        </label></td>
      </tr>
    </table>
    </form>
    <br>
<!--------idchange----->
<p>Voir un projet</p>
<?php 
if(!isset($_POST["idvoir"]))
{
echo '<form method="post" action="admin.php"  name="myForm" id="myform">
<div class="nompro">
<h4><div class="search-input">NumPro :<input type= "number" name="idvoir" id="idvoir" required/></div></h4>
<input type="submit" name="button" class="bton" id="button" value="Voir" /></div>
</form>';
}
else 
{
  



    echo ' <table width="100%" border="1" cellspacing="0" cellpadding="6">
       <tr>
         <td width="35%"  class="colonne"><strong>Projet</strong></td>
         
         <td width="12%" class="colonne"><strong> Nom du projet</strong></td>
         <td width="20%" class="colonne"><strong>Partenaire</strong></td>
         <td width="12%" class="colonne"><strong>Developpement</strong></td>
       </tr>';
       echo'<tr>';
    echo'<td> <br /><img src="'. $image .'" alt="'. $projet_name.'" width="250" height="200" border="1" /></td>';
    
    echo'<td align="center">'.$projet_name.'</td>';
    echo '<td align="center">' .$partenaire .'</td>';
    
    echo '<td align="center">'. $developpement .'</td>';
    echo '</tr>';
    
    
      echo '</table>';
}
?>


<br>
<br>
<br>
<p>Changer un projet</p>
<?php 
if(!isset($_POST["idchange"]))
{
echo '<form method="post" action="admin.php"  name="myForm" id="myform" >
<div class="nompro">
<h4><div class="search-input">NumPro :<input type= "number" name="idchange" id="idchange" required/></div></h4>
<input type="submit" name="button" class="bton" id="button" value="Changer"/></div>
</form>';
}
else 
{   
    $idchange=$_POST["idchange"];
    $query="SELECT * FROM projets where NumProjet='$idchange' LIMIT 1";
    $result =mysqli_query($link,$query);
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $projet_name=$row["NomProjet"];
    $partenaire=$row["Partenaire"];
    
    $developpement=$row["Developpement"];
    $img=$row["ImgProjet"];
    }
    echo ' 
    <form action="admin.php"  name="myForm" id="myform" method="post">
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right"><h4>Nom du projet</h4></td>
        <td width="80%"><label>
          <input name="projet_name" type="text" id="projet_name" size="64" value=" '.$projet_name.'" required/>
        </label></td>
      </tr>
      <tr>
        <td align="right"><h4>Partenaire</h4></td>
        <td><label>
          
          <input name="partenaire" type="text" id="price" size="12" value="'. $partenaire.'DH" required/>
        </label></td>
      </tr>
      
        
     
      <tr>
        <td align="right">Developpement</td>
        <td><label>
          <textarea name="developpement" id="details" cols="64" rows="5" required>'. $developpement.'</textarea>
        </label></td>
      </tr>
      <tr>
        <td align="right">Product Image</td>
        <td><label>
          <input type="text" name="image" id="image"  value="'.$img.'" required/>
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input name="thisID" type="hidden" value="'.$idchange.'" required/>
          <input type="submit" name="button" class="bton" id="button" value="Make Changes" />
        </label></td> </tr>
    </table>
    </form>';
}
?>
<br>
<br>
<br>
<p>Supprimer un projet</p>
<form action="admin.php"  name="myForm" id="myform" method="post">
  <div class="nompro">
  <h4><div class="search-input">NumPro :<input type= "number" name="idsupprimer" id="idsupprimer"/></div></h4>
<input type="submit" name="button" class="bton" id="button" value="Supprimer" /></div>
</form><br/><br/><br/>
<p>Les dernieres inscription</p>
<table border="1" style="font-size:18px;" class="content-table" align="center">
  <thead>
  <tr ><th witdh="20%"align="center" class="colonne" >Num_client</th>
    <th witdh="20%"align="center" class="colonne" >Prenom</th>
  <th witdh="20%" align="center" class="colonne" >Nom</th>
  <th witdh="20%"align="center" class="colonne" >Email</th>
  <th witdh="20%"align="center" class="colonne" >Mot de passe</th>
</tr></thead>
<?php
 $query = "SELECT NumClient, Prenom, Nom, USER, PASS FROM `tableclient`  ORDER BY `NumClient` DESC";
  $result=mysqli_query($link,$query);
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
   echo '<tbody>
   <tr>
   <td align="center" >'.$row["NumClient"].'</TD>
   <td align="center" >'.$row["Prenom"].'</TD>
   <td align="center" >'.$row["Nom"].'</TD>
    <td align="center" >'.$row["USER"].'</TD>
    <td align="center" >'.$row["PASS"].'</TD>
    </tr></tbody>' ;
    
  }
?>

</table>
</br>
<div class="nompro"><a href="admin.php" class="bton" id="button" align="center">Refresh</a></div>
</div></div>







</body>
</html>
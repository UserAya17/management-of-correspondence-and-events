<?php  
session_start();
$direction = $_SESSION['direction'];
//export.php  
$connect = mysqli_connect("localhost", "root", "", "gest_cour");
$output = '';
if(isset($_POST["export"]))
{
 $query = "select * from  cr_entrant where dest_direc =(select direc_name from direction where direc_id = '$direction')";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                    <th >ID</th>
                    <th >NOM DE FICHIER</th>
                    
                    <th>ENREPRISE MESSAGERIE</th>
                    <th>DATE ET HEURE</th>
                 
                   
                    <th>VILLE SOURCE</th>
                    <th>OBJET</th>
                    <th>DESTINATION</th> 
                    <th>NOMBRE DE COURRIER</th>
                    <th>TYPE</th>
                    <th>NUMERO DE BON</th>
                    <th>AUTRE INFORMATION</th>
      
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         

       <td>'.$row['id'].'</td>
       <td>'.$row['name'].'</td>
       
       <td>'.$row['entreprise'].'</td>
       <td>'.$row['date'].'</td>
       
       <td>'.$row['ville_ent'].'</td>
       <td>'.$row['objet_ent'].'</td>
       <td>'.$row['dest_direc'].'</td>
       <td>'.$row['nbr_cour'].'</td>
       <td>'.$row['type_ent'].'</td>
       <td>'.$row['numero'].'</td>
<td>'.$row['comment'].'</td>



                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=courriers.xls');
  echo $output;
 }
}
?>
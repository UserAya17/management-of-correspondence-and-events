<?php

include 'config.php';
include 'connect.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `user_form` WHERE utiltype !='admin' and (  CONCAT(`id`, `name`, `email`, `utilname`,`utiltype`,`direction`) LIKE '%".$valueToSearch."%' OR direction IN ( SELECT direc_id FROM `direction` WHERE direc_name LIKE '%".$valueToSearch."%'  ) )  ";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `user_form` where utiltype !='admin'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "gest_cour");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css" >

</head>


    </head>
    <body>
        
        <form action="chercher_user.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            <div >
    <div class="row pt-4">
    <table><td><pre>                       </pre></td>
    <td>

             <table class="table table-striped mt-3">
            <thead class="cl2">
        <tr>
          <th><p class="cl">id</p></th>
          <th><p class="cl">Nom complet</p></th>
          <th><p class="cl">email</p></th>
          <th><p class="cl">Nom d'utilisateur</p></th>
        
          <th><p class="cl">image</p></th>
          <!-- <th>source id</th> -->
          <th><p class="cl">type d'utilisateur</p></th>
          <th><p class="cl">source name</p><th>
          <th><p class="cl">modif / supp</p><th>
         
        </tr>
      </thead>

      <tbody class="cl3">

        <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                <th scope="row"><?php echo $row['id'] ; ?></th>
                <td><?php echo $row['name'] ; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php

if(empty($row['image'])){
  echo '<img width="30px" src="images/default-avatar.png">';
}else{
echo '<img width="30px" src="uploaded_img/'.$row['image'].'">'; 
}
?> </td>
          <td><?php echo $row['utilname']; ?></td>
         <td> <?php echo $row['utiltype'];  ?> </td>
       
         <?php

$x=$row['direction'];
  $ReadSql2 = "SELECT direc_name FROM `direction` where direc_id = $x";
 
  $res2 = mysqli_query($con1, $ReadSql2);
  $r2 = mysqli_fetch_assoc($res2);
?>
        <td><?php 
        
        if($r2['direc_name'] != "Bureau d'ordre")
        echo $r2['direc_name'] ;
        
        ?></td>


          <td>


            <a href="update_user.php?id=<?php echo $row['id']; ?>" class="m-2">
              <i class="fa fa-edit fa-2x"></i>
            </a>
           
            <i class="fa-solid fa-trash-can"
             data-bs-toggle="modal"
             data-bs-target="#exampleModal<?php echo $row['id']; ?>">
              
             </i>

             <div class="modal fade" id="exampleModal<?php echo $row['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body">
                    <p>etes vous sur de vouloir supprimer cette utilisateur ?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                    data-bs-dismiss="modal">Annuler</button>
                    <a href="delete_user.php?id=<?php echo $row['id']; ?>">
                      <button class="btn btn-danger" type="button">Confirmer</button>
                    </a>
                  </div>
                </div>
              </div>
             </div>

             <pre>     </pre>
          </td>
     



                </tr>
                <?php endwhile;?>
            </table>
        </form>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>




        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>











               
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
  
<style>
  .cl{
color:#fff;
}

.cl2{
  background: #289ae6;
}

.cl3{
  background: pink;
 
}

.cl4{
color:#135BA9;
}

</style>
    </body>
</html>





<?php 

include "config.php";


$id=$_GET['fileid'];


$query=mysqli_query($conn,"select * from  cr_sortant where id =$id")or die(mysqli_error($conn));
						$row=mysqli_fetch_assoc($query);

						
							$name=$row['name'];
							
							$entreprise=$row['entreprise'];
                       
							$date=$row['date'];

                            $ville_ent=$row['ville_ent'];
                            $nbr_cour=$row['nbr_cour'];
                            $numero=$row['numero'];
                            $objet_ent=$row['objet_ent'];
                            $dest_direc=$row['dest_direc'];
                            $type_ent=$row['type_ent'];
                            $comment=$row['comment'];


                            $date1 = new DateTime($date);
                            $result1 = $date1->format('Y-m-d');
                            $result2 = $date1->format('H:m');
                          
                           
?>




<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--<title>Responsive Regisration Form </title>--> 
</head>
<body>
    <div class="container">
    &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  

<table>
    <td><?php
    echo $result2;  ?></td>
    <td>    &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp </td>
    <td class="mm">COURRIER SORTANT</td>
</table>
 
        <header><?php 
        
         $select = mysqli_query($conn, "SELECT * FROM `entreprise` WHERE ent_name = '$entreprise'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
        echo '<img width="120px" src="images/logo.png">';
      }else{
         echo '<img width="120px" src="uploaded_img/'.$fetch['image'].'">';
      }
        
        ?>  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   
        <?php
       
        echo   '<span style="color:gray">'."". $result1.'</span>'; 
       
        
        
        ?>  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp &nbsp   &nbsp  <?php echo '<span style="color:gray">'.'N : '. $numero.'</span>'; ?></header>

        <form action="#">
            <div class="form first">
                <div class="details personal">
                    <!-- <span class="title">Courrier info</span> -->

                    <div class="fields">
                        <div class="input-field">
                            <label>nom de fichier :</label>
                            <?php  echo '<span class="st">'. $name.'</span>'; ?>
                        </div>

                        <div class="input-field">
                            <label>entreprise :</label>
                            <?php echo '<span class="st">'. $entreprise .'</span>'; ?>
                        </div>

                        <div class="input-field">
                            <label> Ville :</label>
                            <?php echo '<span class="st">'. $ville_ent .'</span>'; ?>
                        </div>

                        <div class="input-field">
                            <label> objet :</label>
                            <?php echo '<span class="st">'. $objet_ent .'</span>'; ?>
                        </div>
                       
                        <div class="input-field">
                            <label> direction :</label>
                            <?php echo '<span class="st">'.  $dest_direc .'</span>'; ?>
                        </div>

                        <div class="input-field">
                            <label>type :</label>
                             <?php echo '<span class="st">'.   $type_ent .'</span>'; ?>
                        </div>
                    </div>
                </div>

                <br><br><br>
               
            </div>
        
        </form>
    </div>

    <script>

const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));


    </script>




    <style>

/* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #C9ECF7;
}
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}

.st{
    position: relative;
    font-size: 18px;
    
  
}
.mm{
    position: relative;
    font-size: 20px;
    font-weight: 600; 
}

.container header::before{
    content: "";
    position: absolute;
    left: 0;

    height: 3px;
    width: 27px;
   
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 210px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
 .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 16px;

    font-weight: 500;
    color: #434647;
    background-color: lightblue;
}
/* change espace */
.input-field {
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    /* this */
    padding: 0 50px;  
    height: 100px;
    /* end this */
    margin: 8px 0;
}
.input-field  :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}
.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #4070f4;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #265df2;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}




    </style>
</body>
</html>

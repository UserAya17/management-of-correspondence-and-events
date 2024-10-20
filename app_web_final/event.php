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


<!-- /////////////////////////////////////////////// new class -->

<?php

class Event {
    private $id;
    private $name;
    private $description;
    private $start;
    private $end;

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description ?? '';
    }

    public function getStart(): \DateTime {
        return new \DateTime($this->start);
    }
    public function getEnd(): \DateTime {
        return new \DateTime($this->end);
    }



    public function setName(string $name){
         $this->name=$name;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }

    public function setStart(string $start ) {
        $this->start=$start;
    }
    public function setEnd(string $end){
        $this->end= $end;
    }





}

?>










<?php   

class Events{

private $pdo;


public function __construct(\PDO $pdo)
{
    $this->pdo= $pdo;
}


// recpere les evenement commencent entre deux date
    public function getEventsBetween(\DateTime $start, \DateTime $end ): array {

// $pdo = new PDO('mysql:host=localhost;dbname=gest_cour','root','',[
//  \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
//  \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
// ]);

$sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' and '{$end->format('Y-m-d 23:59:59')}' ";

$statement = $this->pdo->query($sql);
$results = $statement->fetchAll();

        return $results;
    }

    // recpere les evenement commencent entre deux date mais indexer par jour

    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end ): array {
$events = $this->getEventsBetween($start,$end);
$days =[];

foreach($events as $event){
    $date= explode(' ',$event['start'])[0];

    if(!isset($days[$date])){
        $days[$date] = [$event];
    }else{
        $days[$date][] = $event;
    }
}

return $days;
    }

// recupere un evenement

public function find(int $id): Event{

   

   $statement = $this->pdo->query("SELECT * FROM events where id = $id LIMIT 1");
  $statement->setFetchMode(\PDO::FETCH_CLASS,Event::class);
  $result=$statement->fetch();

   if($result === false){
throw new \Exception('Aucun résultat n\'a été trouvé ');
   }

  return $result;
} 
  


public function create(Event $event): bool{

    $statement=$this->pdo->prepare('INSERT INTO EVENTS (name,description,start,end) VALUES(?,?,?,?)');
    return $statement->execute([
        $event->getName(),
        $event->getDescription(),
        $event->getStart()->format('Y-m-d H:i:s'),
        $event->getEnd()->format('Y-m-d H:i:s'),
    ]);
}



}
?>




<?php 
function h(?string $value): string {

  if ($value === null){
      return '';
  }  
  return htmlentities($value);
}

?>



<!-- //////////////////////////////////////////////////////////// -->


<Doctype html>
    <html>
        <head>


    
<!-- CSS only -->
     
     




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8">
    <!---<title> Resonsive Pricing Table | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/784bb825aa.js" crossorigin="anonymous"></script>



</head>
<body>

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
          

<?php


$pdo = new PDO('mysql:host=localhost;dbname=gest_cour','root','',[
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
   ]);


$events = new Events($pdo);

if(!isset($_GET['id'])){
    header('location: /404.php');
}


try {
    $event = $events->find($_GET['id']);


}catch(\Exception $e){
 
    header('Location: 404.php');
}



?>


<?php

$x= $event->getId();

?>

<br><br><br><br> <br><br>

<div class="content">
      <div class="card one">
        <div class="top">id: <?= $event->getId(); ?>
          <div class="title"></div>
          <div class="price-sec">
          <span class="price"><?= h($event->getName()); ?> </span>
          
</div>
        </div>

        <div class="info">Description:  <?=h( $event->getDescription());?> </div>
        <div class="details">
          <div class="one">
            <span>Date: <?= $event->getStart()->format('d/m/Y'); ?> </span>
            <i class="fa-solid fa-calendar"></i>
          </div>
          <div class="one">
            <span>Heure de démarrage: <?= $event->getStart()->format('H:i'); ?></span>
            <i class="fa-solid fa-clock"></i>
          </div>
          <div class="one">
            <span>Heure de fin: <?= $event->getEnd()->format('H:i'); ?></span>
            <i class="fa-solid fa-clock"></i>
          </div>

          <a href="delete_evenement.php?id=<?= $event->getId(); ?>" class="nv1"><button>Supprimer</button>
          <a href="evenement.php" class="nv1"><button>calendrier</button></a>
        </div>
      </div>
      
    </div>
        </div>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
.fas{
      font-size: 20px;
      
  }

li a {
  text-decoration: none;
   
}
li a:hover {
  text-decoration: none;
   
}

.nv1{
    text-decoration: none;
   
}


.content{
  max-width: 3200px;
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
 
}
 .content .card{
  background: #fff;
  width: calc(33% - 20px);
  text-align: center;
  padding: 15px 30px  30px 30px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  left: 520px;
}
.content .card .top{
  height: 130px;
  color: #fff;
  padding: 12px 0 0 0 ;
  clip-path: polygon(0 0, 100% 0, 100% 53%, 49% 100%, 0 53%);
}

.content .card .top .title{
 font-size: 27px;
 font-weight: 400;
}
.content .card .top .price-sec{
  margin-top: -10px;
  font-weight: 400;
}
.content .card .top .price{
  font-size: 35px;
}
.content .card .info{
  font-size: 16px;
  margin-top: 20px;
}
.content .card .details .one{
  margin-top: 25px;
  font-size: 15px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
}
.content .card .details .one::before{
  position: absolute;
  content: "";
  width: 100%;
  background: #289ae6;
  height: 1px;
  left: 0;
  top: -12px;
  border-radius: 25px;
}
.content .card .details .one i{
  color: #289ae6 ;
}
.content .card .details i.fa-times{
  color: #289ae6;
}
.content .card button{
  outline: none;
  border: none;
  height: 42px;
  color: #fff;
  margin-top: 30px;
  border-radius: 3px;
  font-size: 18px;
  width: 100%;
  display: block;
  transition: all 0.3s ease;
  cursor: pointer;
  letter-spacing: 1px;
}
.content .one .top,
.content .one button{
  background: #289ae6;
}
.content .two .top,
.content .two button{
  background: #289ae6;
}
.content .three .top,
.content .three button{
  background: #289ae6;
}
.content button:hover {
  filter: brightness(90%);
}
.content .one ::selection{
background: #289ae6;
}
.content .two ::selection{
background: #289ae6;
}
.content .three ::selection{
background:#289ae6;
}
@media (max-width:1000px) {
   .content .card{
    background: #fff;
    width: calc(50% - 20px);
    margin-bottom: 30px;
}
}
@media (max-width:715px) {
 .content .card{
    width: 100%;
}
}

    </style>

</body>
    </html>
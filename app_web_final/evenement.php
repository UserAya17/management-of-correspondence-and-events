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

class Month {
 public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
 private $months = [' janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre'];
 
 public $month;
 public $year;

public function __construct(?int $month = null, ?int $year = null )
{

if($month === null || $month >12){
    $month = intval(date('m'));
}
if($year === null ){
    $year = intval(date('Y'));
}

$this->month = $month;
$this->year = $year;

}


//renvoie le premier jour de mois
public function getStartingDay (): \DateTime {
return new \DateTime( "{$this->year}-{$this->month}-01");}

public function toString(): string{
return $this->months[$this->month -1 ].' '.$this->year;}

// renvoi le nombre de semaine dans le mois
public function getWeeks(): int {
    $start = $this->getStartingDay();
    $end = (clone $start)->modify('+1 month -1 day');
    $startweek= intval($start->format('W'));
    $endweek= intval($end->format('W'));

    if($endweek===1){
        $endweek=intval((clone $end)->modify('-7 days')->format('W'))+1;}
$weeks= $endweek - $startweek + 1;
  if($weeks<0){
    $weeks= intval($end->format('W'));
  } return $weeks;}

// est ce que le jour est dans le mois encour
public function withinMonth(\DateTime $date): bool 
{return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');}

// renvoie mois  suivant
public function nextMonth(): Month{
$month = $this->month + 1;
$year = $this->year;
if($month>12){
    $month =1;
    $year +=1;}
return new Month($month,$year);}

// renvoie mois precedent
public function previousMonth(): Month{
    $month = $this->month - 1;
    $year = $this->year;
    if($month<1){
        $month =12;
        $year -=1;
    }
    return new Month($month,$year);}
}

?>


<!-- //////////////////////////////////////////////////////////// -->


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

}  ?>










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
  

}
?>











<!--  -->


<?php 
function h(?string $value): string {

  if ($value === null){
      return '';
  }  
  return htmlentities($value);
}

?>





<!-- //////////////////////////////////////////////////////////// -->




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
          
          





            
        </head>
<body>

<div class="calendar">

<br><br><br><br>




<?php

$pdo = new PDO('mysql:host=localhost;dbname=gest_cour','root','',[
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
   ]);

$events = new Events($pdo);

$month = new Month($_GET['month'] ?? null , $_GET['year'] ?? null  ) ;
$start=$month->getStartingDay();
$start=$start->format('N')==='1' ? $start : $month->getStartingDay()->modify('last monday');

$weeks=$month->getWeeks(); //nmbr de semaine
$end=(clone $start)->modify('+'.(6 + 7 * ($weeks - 1)) .'days');


$events = $events->getEventsBetweenByDay($start,$end);


?>



<div >

<h1 style="color:#289ae6;" > &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?= $month->toString();  ?></h1>
<table><td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>
<td>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</td>

    
<td><a href="evenement.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?> " class="btn1">&lt;</a></td>
   <td> <a href="evenement.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?> " class="btn1">&gt;</a></td>


</table>
<br>
</div>







<table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
<?php for ($i=0;$i<$weeks;$i++): ?>
<tr >  

<?php foreach($month->days as $k => $day): 
    $date=(clone $start)->modify("+" . ($k + $i * 7) . "days");
    
    $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
    ?>


<td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
<?php if($i ===0): ?><div class="calendar__weekday" ><?= $day; ?></div>
<?php endif; ?>
    <div class="calendar__day" ><?= $date->format('d'); ?></div>

<?php foreach($eventsForDay  as $event): ?>
    <div class="calendar__event   calendar__event--<?= $weeks; ?>weeks" >
   <?= (new DateTime( $event['start']) ) ->format('H:i') ?> - <a class="nv" href="event.php?id=<?= $event['id']; ?>" ><?= h($event['name']); ?></a>
    </div>
 <?php endforeach; ?>
</td>

<?php endforeach; ?>
</tr>
    <?php endfor; ?>
    
</table>

<br><br>



<a href="add.php" class="calenadar__button">+</a>


</div>






<!-- //////////////////////////////////////////////////////////// -->



<style>


li a {
  text-decoration: none;
   
}
li a:hover {
  text-decoration: none;
   
}

.fas{
      font-size: 20px;
      
  }

.calendar__table{

width:80%;
height: calc(100vh - 128px);
position: relative;
    left: 280px;

}

.calendar__table td {
    padding: 10px;;
border: 1px solid #ccc;
vertical-align: top;
width: 14.29%;
height: 20%;
background-color: #55585A;
}

.calendar__table--6weeks td {

height: 16.66%;
}

.calendar__weekday{
    font-weight: bold;
    color: white;
    font-size: 1.2em;
}


.calendar__day {
font-size: 1.3em ;
color:white;
}

.calendar__event{
    color: white;  
}

.calendar__event .calendar__day{
    opacity: 0.3;  
}


.calendar__othermonth .calendar__day{

    opacity: 0.3;

}

.calenadar__button{
  display: block;
    width: 55px;
    height: 55px;
    line-height: 55px;
    text-align: center;
    color: #fff;
    font-size: 30px;
    background-color: #289ae6 ;
    border-radius: 50%;

    box-shadow: 0 6px 10px 0 #0000001a,0 1px 0 #0000001a,0 3px 5px -1px #0003;
    position: absolute;
    bottom: 30px;
    right: 65px;
    top: 750px;
    text-decoration: none;
    transition: transform 0.3s;

}

.calenadar__button:hover{
    text-decoration: none;
    color: #fff;
    transform: scale(1.2);

}
.nv{
    text-decoration: none;
    /* color: #289ae6; */
    color: white;
    transform: scale(1.2);
}

.nv:hover{
    text-decoration: none;
    color: white;
    transform: scale(1.2);
}

</style>

</body>


 

    </html>
<?php
	include 'includes/dbh.inc.php';

	//date_default_timezone_set('Europe/Berlin');

function dates_month($month, $year) {
		date_default_timezone_set('Europe/Berlin');
    $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates_month = array();

    for ($i = 1; $i <= $num; $i++) {
        $mktime = mktime(0, 0, 0, $month, $i, $year);
        $date = date("Y-m-d", $mktime);
        $dates_month[$i] = $date;
    }

    return $dates_month;
}

function date_month($month, $year) {
		date_default_timezone_set('Europe/Berlin');
    $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates_month = array();

    for ($i = 1; $i <= $num; $i++) {
        $mktime = mktime(0, 0, 0, $month, $i, $year);
        $date = date("D d", $mktime);
        $dates_month[$i] = $date;
    }

    return $dates_month;
}

function AlleAzubisUndDualeStudenten(){
	global $conn;

	$result = mysqli_query($conn, "SELECT * FROM registrierung WHERE obAusbilder IS NULL;");
	$Azubis = Array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	    $Azubis[] =  $row['usernameUsers'];  //Namen der Benutzer

	}
	return $Azubis;

}

function EintraegeFuerUebersicht(){
	global $conn;
	$EintraegeFuerUebersicht = mysqli_query($conn,"SELECT * FROM eintrag;");
	$Eintraege = Array();
	while ($row = mysqli_fetch_array($EintraegeFuerUebersicht, MYSQLI_ASSOC)) {
	$Eintraege[] =  $row;
}
	//echo $Eintraege[0]['name']; // test; mit for schleife alle 

	return $Eintraege;
}

/*function EintraegeAlleFrei(){

	global $conn;
	$EintraegeAlleFrei = mysqli_query($conn,"SELECT * FROM eintrag WHERE ;");
	$FreieEintraege = Array();
	while ($row = mysqli_fetch_array($EintraegeAlleFrei, MYSQLI_ASSOC))
	{
		$FreieEintraege[] =  $row;
	}
	
	return $FreieEintraege;
}*/

function SophiasKalender($month,$year){

     //Tage des Monats im Array
     $TageDesMonats = array();
     $TageDesMonats = dates_month($month, $year);

     $TageDesMonat = array();
     $TageDesMonat = date_month($month, $year);

     $Azubis= Array();
     $Azubis = AlleAzubisUndDualeStudenten();

     $Eintraege = Array();
     $Eintraege = EintraegeFuerUebersicht();

     $calendar = "<table class='table-bordered table-responsive'>";//table table-bordered table-sm
     $calendar  .= "<th>Azubis/Duale Studenten</th>";

     foreach ($TageDesMonat as $tag) {

           $calendar .= "<th class='header'>$tag</th>";
     }

     for($i = 0; $i < count($Azubis); $i++)
     {
        $calendar  .= "<tr>"; 
        $calendar  .= "<td>" . $Azubis[$i] . "</td>";
        foreach ($TageDesMonats as $tag) 
        {
          $found = false;
          for($k = 0; $k < count($Eintraege); $k++){
          	  if($Azubis[$i] == $Eintraege[$k]['name']){
          		  if(( $Eintraege[$k]['anfangEins']<= $tag) && ($Eintraege[$k]['endeEins'] >= $tag ))
          		  {
          			  $calendar  .= "<td align= 'center' class ='day event event-urlaub'>".$Eintraege[$k]['grund']."</td>";
          			  $found = true;
          		  }
          	  }
          }
          	  if($found == false){
          		  $calendar  .= "<td></td>";
          	  }
          } 
            $calendar  .= "</tr>";
     }

    return $calendar; 
}


?>

<!DOCTYPE html>
<html>

<head>	
	<title>Übersicht</title>
    <?php include('bootstrapcss.php'); ?>
    <!--<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fullcalendar.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script src="js/scheduler.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/de.js"></script>-->
    <link rel="stylesheet" href="css/tabelle.css">
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>

	<div class="container">
		<div class="card bg-light text-dark">

			<div class="card-body">
				 <div class="text-center">
				 	<?php 
				 		$year = date("F Y");
				 		echo "<h4>$year</h4>";
				 	?>					
				</div> 

				 <?php
					$year = date("Y"); //derzeitiges Jahr
					$month = date("m"); //drezeitiger Monat
					echo SophiasKalender($month,$year);
				 ?>			
			</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
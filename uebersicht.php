<?php
	include 'includes/dbh.inc.php';

	//date_default_timezone_set('Europe/Berlin');

function dates_month($month, $year) {
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
	$EintraegeFuerUebersicht = mysqli_query($conn,"SELECT * FROM eintrag;");//jedes mal ein array für jede spalte
	//lieber eine Abfrage mit einem Join?
}

function SophiasKalender($month,$year){

	 // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];

     //Tage des Monats im Array
     $TageDesMonats = array();
     $TageDesMonats = dates_month($month, $year);

     $Azubis= Array();
     $Azubis = AlleAzubisUndDualeStudenten();

     $calendar = "<table class='table table-bordered table-sm'>";
     $calendar  .= "<th>Azubi/Duale Studenten</th>";

     for($i = 1; $i <= count($TageDesMonats); $i++) { 

          $calendar .= "<th class='header'>$TageDesMonats[$i]</th>"; //// ich könnte jeder row die id geben mit dem Tag des Monats
     }

     for($i = 0; $i < count($Azubis); $i++)
     {
          $calendar  .= "<tr>"; // ich könnte jeder row die id geben mit dem namen des Azubis
          $calendar  .= "<td>" . $Azubis[$i] . "</td>";
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


				 <table>
				    <tr id="somerow">
				        <td>some text</td>
				        <td>blubb</td>            
				    </tr>
				</table>

				<script> 
					var Row = document.getElementById("somerow");
					var Cells = Row.getElementsByTagName("td");
					alert(Cells[0].innerText);
				</script>









				 <table>

			</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
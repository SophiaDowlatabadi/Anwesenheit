<?php
	include 'includes/dbh.inc.php';
	date_default_timezone_set('Europe/Berlin');

    (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
    (int)$nextpage = $currentpage + 1;
    (int)$prevpage = $currentpage - 1;

    $result = mysqli_query($conn,"SELECT * FROM registrierung WHERE obAusbilder IS NULL;");

    /*function build_calendar($month,$year) {
    	//wir brauchen die Anzahl der Tage im Monat
    	//wir brauchen den aktuellen Monat
    	//wir brauchen die Tage der Woche
    	//wir brauchen die einzelenen Tage des Monats?

     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('S','M','T','W','T','F','S');

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

     // Create the table tag opener and day headers

     $calendar = "<table class='table table-bordered table-sm'>";
     //$calendar .= "<caption>$monthName $year</caption>";
     //$calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) { // das muss nicht dayspf week sein sondern days of month

          $calendar .= "<th class='header'>$day</th>";
     } 

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) { 
          $calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>"; 
     }
     
     $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
     while ($currentDay <= $numberDays) {

          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }
          
          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
          
          $date = "$year-$month-$currentDayRel";

          $calendar .= "<td class='day' rel='$date'>$currentDay</td>";

          // Increment counters
 
          $currentDay++;
          $dayOfWeek++;

     }
     
     

     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) { 
     
          $remainingDays = 7 - $dayOfWeek;
          $calendar .= "<td colspan='$remainingDays'>&nbsp;</td>"; 

     }
     
     //$calendar .= "</tr>";

     $calendar .= "</table>";

     return $calendar;

}*/

function dates_month($month, $year) {
		date_default_timezone_set('Europe/Berlin');
    $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dates_month = array();

    for ($i = 1; $i <= $num; $i++) {
        $mktime = mktime(0, 0, 0, $month, $i, $year);
        $date = date("D d.", $mktime);
        $dates_month[$i] = $date;
    }

    return $dates_month;
}


function SophiasKalender($month,$year){
		date_default_timezone_set('Europe/Berlin');

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

     $calendar = "<table class='table table-bordered table-sm'>";
     $calendar  .= "<th>Azubi/Duale Studenten</th>";

     for($i = 1; $i <= count($TageDesMonats); $i++) { // das muss nicht dayspf week sein sondern days of month

          $calendar .= "<th class='header'>$TageDesMonats[$i]</th>";
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

				<!--<?php
					//For all Months in Specific Year
					/*$year = "2010"; // das aktuelle Jahr immer googeln
					$i = 1;
					$month=1; //Numeric Value // der aktuelle Monat googeln
					while($i <= 12){
					echo build_calendar($month,$year);
					$month=$month+1;
					$i++;}*/

				 ?>-->

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
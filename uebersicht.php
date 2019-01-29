<?php
	include 'includes/dbh.inc.php';

    (int)$currentpage = (!empty($_GET["currentpage"]))?$_GET["currentpage"]:0;
    (int)$nextpage = $currentpage + 1;
    (int)$prevpage = $currentpage - 1;

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

				<!--<div id="calendar"></div>-->
				<?php

				$result = mysqli_query($conn,"SELECT * FROM registrierung WHERE obAusbilder IS NULL;");

				echo "<table class='table table-bordered table-sm'>
				<th>Azubis/Duale Studenten</th>
				";

				while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row['usernameUsers'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";

				mysqli_close($conn);

				?>


				<table class='table table-bordered table-sm'>
				    <tr>
				        <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$prevpage"; ?>"> << </a> </td>
				        <td></td>
				        <td><a href="<?php echo "{$_SERVER['PHP_SELF']}?currentpage=$nextpage"; ?>"> >> </a> </td>
				    </tr>
				    <tr>
				        <?php
				            $ts = date(strtotime('last sunday'));
				            $ts += $currentpage * 86400 * 7;
				            $dow = date('w' , $ts);
				            $offset = $dow;

				            $ts = $ts - $offset * 86400;
				            for ($x=0 ; $x<7 ; $x++,$ts += 86400) {
				                echo '<th>' . date("m-d-Y", $ts) . '</th>' ;
				            }
				        ?>
				    </tr>
				</table>


			</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
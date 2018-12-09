<?php
	include_once 'includes/dbh.inc.php';

	$sql = "SELECT * FROM azubi;";
	$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
	<!--boostrap-->
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">

    <!--jquery-->
    <script src="js/jquery-3.3.1.js"></script>

    <!--Datetimepicker-->
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    <script src="js/bootstrap-datetimepicker.min.js"></script>

	<title>Eintrag</title>
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>
	<div class="container">
	<div class="card bg-light text-dark">
	  <div class="card-body">

	  	<form action="includes/speichern.eintrag.inc.php" method="POST">

		  		<div class="input-group mb-3">
			          <div class="input-group-prepend">
			            <label class="input-group-text" for="inputGroupSelectName">Name</label>
			          </div>
			         <select name = "name" class="custom-select" id="inputGroupSelectName">
			         	<option selected>Wähle deinen Namen aus...</option>
				           <?php $result = mysqli_query($conn, "SELECT * FROM azubi");
				           //alle Zeilen aus der Abfrage in ein Array packen
				           $resultset = array();
				           while ($row = mysqli_fetch_array($result)) {
				             $resultset[] = $row;
				           }
			           //die Einträge im Array durchgehen (Jeder Eintrag entspricht einer Zeile in der Tabelle aus deiner Query)
			           //Für jeden Eintrag wird eine Option zu dem select hinzugefügt
			           	foreach ($resultset as $row) : ?>
			            <option value = "<?php echo $row['name']?>"><?php echo $row['name']?></option>
			           <?php endforeach ?> 
			          </select>
			        </div>


				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelectKürzel">Kürzel</label>
				  </div>
				  <select name= "kuerzel" class="custom-select" id="inputGroupSelectKürzel">
				    <option selected>Wähle dein Kürzel aus...</option>
				    <?php $result = mysqli_query($conn, "SELECT * FROM azubi");
			           //alle Zeilen aus der Abfrage in ein Array packen
			           $resultset = array();
			           while ($row = mysqli_fetch_array($result)) {
			             $resultset[] = $row;
			           }
			           //die Einträge im Array durchgehen (Jeder Eintrag entspricht einer Zeile in der Tabelle aus deiner Query)
			           //Für jeden Eintrag wird eine Option zu dem select hinzugefügt
			           foreach ($resultset as $row) : ?>

			            <option value = "<?php echo $row['kuerzel']?>"><?php echo $row['kuerzel']?></option>
			           <?php endforeach ?> 
			          </select>
				</div>


				<!--hier kommen die 2 Datumsfelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Anfang</span>
					 </div>
					 <input type="date" name="DatumVon" placeholder= "DatumVon" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Ende</span>
					 </div>
					 <input type="date" name="DatumBis" placeholder= "DatumBis" class="form-control">
				</div>



				<div class="input-group mb-3">
					
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Datum und Zeit</span>
					 </div>
					 <input type="text" id="datetime" class="form-control">
					 <script type="text/javascript">
					 	$("#datetime").datetimepicker({
					 		format: 'yyyy-mm-dd hh:ii',
					 		autoclose:true
					 	});
					 </script>
				</div>

				

				<!--hier kommen die 2 UhrzeitenFelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Von</span>
					 </div>
					 <input type="time" name="UhrzeitVon" placeholder= "UhrzeitVon" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Bis</span>
					 </div>
					 <input type="time" name="UhrzeitBis" placeholder= "UhrzeitBis" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Grund</span>
					 </div>
					 <input type="text" name="Grund" placeholder= "Grund" class="form-control">
				</div>

				</div>

				<button type="submit" name = "submit" class="btn btn-success btn-lg btn-block">Speichern</button>	

		</form>

	</div>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
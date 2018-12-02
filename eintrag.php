<?php
	include_once 'includes/dbh.inc.php';

	$sql = "SELECT * FROM azubi;";
	$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
	<title>Eintrag</title>
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>
	<div class="container">
	<div class="card bg-light text-dark">
	  <div class="card-body">

	  	<form>

		  		<div class="input-group mb-3">
			          <div class="input-group-prepend">
			            <label class="input-group-text" for="inputGroupSelectName">Name</label>
			          </div>
			         <select class="custom-select" id="inputGroupSelectName">
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
				  <select class="custom-select" id="inputGroupSelectKürzel">
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
				    <label class="input-group-text" for="inputGroupSelectGrund">Grund</label>
				  </div>
				  <select class="custom-select" id="inputGroupSelectGrund">
				    <option selected>Wähle dein Kürzel aus...</option>

				  </select>
				</div>

				<button type="button" class="btn btn-success btn-lg btn-block">Speichern</button>	

		</form>

	</div>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
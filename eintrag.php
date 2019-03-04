<?php
	include_once 'includes/dbh.inc.php';
	session_start();
	$result = mysqli_query($conn,"SELECT obAusbilder FROM registrierung");
	$resultname =  mysqli_query($conn,"SELECT usernameUsers FROM registrierung");
	$obAusbilderArray = Array();
	$storeArrayName = Array();
	$NamenAusbilder = Array();
	$nurAzubis = Array();
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	    $obAusbilderArray[] =  $row['obAusbilder'];  //0 und Nulls
	}
	while ($row = mysqli_fetch_array($resultname, MYSQLI_ASSOC)) {
	    $storeArrayName[] =  $row['usernameUsers'];  //Namen der Benutzer(alle)
	}
	$istAusbilder = FALSE;
		for ($i = 0; $i < count($obAusbilderArray); $i++)
		{
		  $name = $storeArrayName[$i];//alle Namen der Einträge 
		  if ($obAusbilderArray[$i] == "0" && $_SESSION['NameAnmeldung'] == $name) {//wenn  und name übereinstimmt
		    $istAusbilder = TRUE;
		  }
		}

		if ($istAusbilder == FALSE) {
		  echo $_SESSION['NameAnmeldung'];// der angemeldete Azubi 
		}
		else {
		  for ($i = 0; $i < count($obAusbilderArray); $i++) {
		    $name = $storeArrayName[$i];
		    if ($obAusbilderArray[$i] != "0") {
		       echo $name; //alle Azubis
		    }
		  }
		}
	
	/*$sql = "SELECT * FROM azubi;";
	$result = mysqli_query($conn, $sql);*/
?>

<!DOCTYPE html>
<html>

<head>
	<!--boostrap-->
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">

    <!--jquery-->
    <script src="js/jquery-3.3.1.js"></script>

    <!--moment-->
    <script src="js/moment.js"></script>
    <script src="js/momentDE.js"></script>


    <!--Datetimepicker-->
    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.css">
    <script src="js/tempusdominus-bootstrap-4.js"></script>

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
			        <select name = "Namen" class="custom-select" id="inputGroupSelectName">
			         	<option selected>Wähle deinen Namen aus...</option>
			         	<?php $istAusbilder = FALSE;
							for ($i = 0; $i < count($obAusbilderArray); $i++)
							{
							  $name = $storeArrayName[$i];//alle Namen der Einträge 
							  if ($obAusbilderArray[$i] == "0" && $_SESSION['NameAnmeldung'] == $name) {//wenn  und name übereinstimmt
							    $istAusbilder = TRUE;
							  }
							}

							if ($istAusbilder == FALSE): ?> <!--XX-->		
			         		<option style="color:black" value = "<?php echo $_SESSION['NameAnmeldung'];?>"><?php echo $_SESSION['NameAnmeldung']?>
			         	
			         	<?php else: ?>
			         	<?php for ($i = 0; $i < count($obAusbilderArray); $i++): ?>
						<?php $name = $storeArrayName[$i];
							if ($obAusbilderArray[$i] != "0"): ?>
			         	<option style="color:black" value = "<?php echo $name?>"><?php echo $name?>
			         	<?php endif ?>
			         	<?php endfor ?>
			         	<?php endif ?>

			         	</option>
			        </select>
			    </div>

			        <div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Grund</span>
					 </div>
					 <input type="text" name="Grund" placeholder= "Grund" class="form-control">
					</div>

					<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 </div>
					 <input type="text" name="GrundB" disabled="true" placeholder= "Gib für Urlaub= U, Uni= S, Berufschule= B, N= alles andere ein." class="form-control">
					</div>

					<div class="input-group mb-3">
			          <div class="input-group-prepend">
			            <label class="input-group-text" for="inputGroupSelectName">Tageszeit</label>
			          </div>
			         <select name = "Tageszeit" class="custom-select" id="Tageszeit" onchange="check(this.value)">
			         	<option selected>Ganzer Tag</option> <!--value= A-->
				        <option >Teilweise anwesend</option> <!--value= B-->  
			          </select>
			        </div>

					
				<!--hier kommen die 2 Datumsfelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Anfang</span>
					 </div>
					 <input type="date" name="DatumVon" id="Anfang" placeholder= "DatumVon" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Ende</span>
					 </div>
					 <input type="date" name="DatumBis" placeholder= "DatumBis" class="form-control">
				</div>

				<!--hier kommen die 2 UhrzeitenFelder hin-->
				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Von</span>
					 </div>
					 <input type="time" name="UhrzeitVon" id="Von" placeholder= "UhrzeitVon" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Bis</span>
					 </div>
					 <input type="time" name="UhrzeitBis" placeholder= "UhrzeitBis" id="Bis" class="form-control">
				</div>

				</div>

				<button type="submit" name = "submit" class="btn btn-success btn-lg btn-block">Speichern</button>	

		</form>
		<!--<script type="text/javascript">
			/*var anfang = document.getElementById("Anfang");
			anfang.onchange = function () {
   				if (this.value != "" || this.value.length > 0) {
      			document.getElementById("Von").disabled = false;
   				}
			}*/
			/*function check(val){
			 var Von =document.getElementById('Von');
			 var Bis =document.getElementById('Bis');
			 if(val=='B'){
			   Von.disabled = true;
			   Bis.disabled = true;
			}
			 else  {
			   Von.disabled = false;
			   Bis.disabled = false;
			}
			}*/



		</script>-->

	</div>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
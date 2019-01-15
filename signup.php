<?php
	require "header.php"
?>
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
</head>

	<body>

		<div class="container">
		<div class="card bg-light text-dark">

			<div class="card-body">

				<a href="index.php"><- Zurück zur Anmeldung</a>

				<h3 class="text-center">Registrierung</h3>
				<?php
					if(isset($_GET['error'])){//checkt ob in der URL irgwas mit error drinne ist
						if($_GET['error'] == "emptyfields"){
							echo '<p> Du bist dumm!</p>';
						}
						else{
							header("Location: ../signup.php?signup=success");
							exit();
						}

					}
				?>
				<form action="includes/signup.inc.php" method="post">

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">Name</span>
						</div>
						    <input type="text" name="nameid" placeholder= "Vorname und Nachname..." class="form-control">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">Benutzername</span>
						</div>
						    <input type="text" name="uid" placeholder= "Benutzername..." class="form-control">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">Passwort</span>
						</div>
						    <input type="password" name="pwd" placeholder= "Passwort..." class="form-control">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">Wiederhole Passwort</span>
						</div>
						    <input type="password" name="pwd-repeat" placeholder= "Passwort..." class="form-control">
					</div>

					<div class="form-check">
					    <input type="checkbox" class="form-check-input" id="checkboxAusbilder" name="obAusbilder" onclick="testobausb()">
					    <label class="form-check-label" for="exampleCheck1">Ich bin Ausbilder</label>
					</div>

					

					<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupNameAnfang">Anfang Ausbildung</span>
					 </div>
					 <input type="date" id="VonA" name="DatumVon" placeholder= "DatumVon" class="form-control">
					</div> 


					<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Ende Ausbildung</span>
					 </div>
					 <input type="date" id="Bis" name="DatumBis" placeholder= "DatumBis" class="form-control">
					</div>

					<!--checkbox-->

    				<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">Ausbildungsberuf</span>
						</div>
						    <input type="text" id="ausbildung" name="ausbildung" placeholder= "InfKauf, FaSys, FaAn..." class="form-control">
					</div>

					<button type="submit" name = "signup-submit" class="btn btn-success btn-lg btn-block">Registrieren</button>
				</form>

				<script type="text/javascript" >  
			     function testobausb(){  
			          if(document.getElementById("checkboxAusbilder").checked == true){  
			              document.getElementById("VonA").disabled = true;
			              document.getElementById("Bis").disabled = true;
			              document.getElementById("ausbildung").disabled = true;  
			          }else{
			            document.getElementById("VonA").disabled = false;
			            document.getElementById("Bis").disabled = false;
			            document.getElementById("ausbildung").disabled = false;
			          }  
			     }  
			     </script> 
		</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>


	</body>

<?php
?>
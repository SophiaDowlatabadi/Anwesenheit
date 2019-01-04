<?php
	require "header.php"
?>

	<body>

		<div class="container">
		<div class="card bg-light text-dark">

			<div class="card-body">

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
						 	<span class="input-group-text" id="inputGroupName">Benutzername</span>
						</div>
						    <input type="text" name="uid" placeholder= "Benutzername..." class="form-control">
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
						 	<span class="input-group-text" id="inputGroupName">E-Mail</span>
						</div>
						    <input type="text" name="mail" placeholder= "E-Mail..." class="form-control">
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

					<!--andere Felder-->

					<button type="submit" name = "signup-submit" class="btn btn-success btn-lg btn-block">Registrieren</button>
				</form>
		</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>


	</body>

<?php
?>
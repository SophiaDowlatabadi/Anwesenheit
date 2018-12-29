<?php
	require "header.php"
?>

	<body>

		<div class="container">
		<div class="card bg-light text-dark">

			<div class="card-body">

				<h2>Sign Up</h2>
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

					<button type="submit" name = "signup-submit" class="btn btn-success btn-lg btn-block">Registrierung</button>
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
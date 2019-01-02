<?php
	require "header.php"
?>

	<body>

		<div class="container">
			<div class="card bg-light text-dark">

				<div class="card-body">

		<p>You are logged out!</p>
		<p>You are logged in!</p>

				<div>
					<form action="includes/login.inc.php" method="post">

						<div class="input-group mb-3">
							 <div class="input-group-prepend">
							 	<span class="input-group-text" id="inputGroupName">Name</span>
							 </div>
							 <input type="text" name="mailuid" placeholder= "Benutzername..." class="form-control">
						</div>

						<div class="input-group mb-3">
						 	<div class="input-group-prepend">
							 	<span class="input-group-text" id="inputGroupName">Passwort</span>
							</div>
							 <input ype="password" name="pwd" placeholder= "Passwort..." class="form-control">
						</div>

						<button type="submit" name = "login-submit" class="btn btn-success btn-lg btn-block">Log In</button>

					</form>
					<div class="text-center">
						<a href="signup.php">Registrierung</a>
					</div>
				</div>

				</div>
			</div>
		</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>


	</body>

<?php
?>
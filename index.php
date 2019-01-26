<?php
	require "header.php";
	session_start();
?>

	<body>

		<div class="container">
			<div class="card bg-light text-dark">
				
				<div class="text-center">
					<h4> Bitte melde dich an!</h4>
				</div>

				<div class="card-body">

				<div>
					<form action="includes/login.inc.php" method="post">

						<div class="input-group mb-3">
							 <div class="input-group-prepend">
							 	<span class="input-group-text" id="inputGroupName">Name</span>
							 </div>
							 <input type="text" name="userid" placeholder= "Benutzername..." class="form-control">
						</div>

						<div class="input-group mb-3">
						 	<div class="input-group-prepend">
							 	<span class="input-group-text" id="inputGroupName">Passwort</span>
							</div>
							 <input type="password" name="pwd-login" placeholder= "Passwort..." class="form-control">
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
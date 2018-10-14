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
	  	<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Name</label>
			  </div>
			  <select class="custom-select" id="inputGroupSelect01">
			    <option selected>Wähle deinen Namen aus...</option>
			    <option value="1">One</option>
			    <option value="2">Two</option>
			    <option value="3">Three</option>
			  </select>
			</div>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Kürzel</label>
			  </div>
			  <select class="custom-select" id="inputGroupSelect01">
			    <option selected>Wähle dein Kürzel aus...</option>
			    <option value="1">One</option>
			    <option value="2">Two</option>
			    <option value="3">Three</option>
			  </select>
			</div>


			<!--hier kommen die 2 Datumsfelder hin-->


			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Grund</label>
			  </div>
			  <select class="custom-select" id="inputGroupSelect01">
			    <option selected>Wähle dein Kürzel aus...</option>
			    <option value="1">One</option>
			    <option value="2">Two</option>
			    <option value="3">Three</option>
			  </select>
			</div>
	</div>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
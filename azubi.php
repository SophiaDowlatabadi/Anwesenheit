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
			 	<span class="input-group-text" id="inputGroup-sizing-default">Name</span>
			 </div>
			 <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
		<div class="input-group mb-3">
			 <div class="input-group-prepend">
			 	<span class="input-group-text" id="inputGroup-sizing-default">Kürzel</span>
			 </div>
			 <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
		<div class="input-group mb-3">
			 <div class="input-group-prepend">
			 	<span class="input-group-text" id="inputGroup-sizing-default">Ausbildung</span>
			 </div>
			 <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	  </div>
	</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
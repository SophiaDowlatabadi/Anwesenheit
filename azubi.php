
<!DOCTYPE html>
<html>

<head>
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
	<title>Auszubildende</title>
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>
	<div class="container">
	<div class="card bg-light text-dark">

	  <div class="card-body">

		  	<form action="includes/speichern.azubi.inc.php" method="POST" >

			    <div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupName">Name</span>
					 </div>
					 <input type="text" name="name" placeholder= "Name" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupKuerzel">Kürzel</span>
					 </div>
					 <input type="text" name ="kuerzel" placeholder= "Kürzel" class="form-control">
				</div>


				<div class="input-group mb-3">
					 <div class="input-group-prepend">
					 	<span class="input-group-text" id="inputGroupAusbildung">Ausbildung</span>
					 </div>
					 <input type="text" name="ausbildung" placeholder= "Ausbildung" class="form-control">
				</div>


				<button type="submit" name = "submit" class="btn btn-success btn-lg btn-block">Speichern</button>

			</form>

	  </div>
	  
	</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
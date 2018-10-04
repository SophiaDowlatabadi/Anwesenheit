<!DOCTYPE html>
<html>

<head>
	<?php include('bootstrapcss.php'); ?>
	<link rel="stylesheet" href="css/navigationstyle.css">
</head>

<body>
	<div class= "container"> 
		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<div class= "container"> 
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"><img src="img/icon.png"></a>
				</div>

				<div class="navbar-nav collapse navbar-collapse" id="mainNav">	
						<a class="nav-item nav-link" href="index.php" id="ueb"><img src="img/tabelle.png"> Übersicht </a>
						<a class="nav-item nav-link" href="eintrag.php" id="ein"><img src="img/bearbeiten.png">Eintrag </a>	
				 </div>

				<button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
					<span class="navbar-toggler-icon"> </span>
				</button>
			</div>
		</nav>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
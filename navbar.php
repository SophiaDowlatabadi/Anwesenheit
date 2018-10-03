<!DOCTYPE html>
<html>

<head>
	<?php include('bootstrapcss.php'); ?>
	<link rel="stylesheet" href="css/navigationstyle.css">
</head>

<body>
		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<div class= "container"> 
				<button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav">
					<span class="navbar-toggler-icon"> </span>
				 </button>
			<div class="collapse navbar-collapse" id="mainNav">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="index.php" id="ueb"> Übersicht </a>
					<a class="nav-item nav-link" href="element.php" id="ein"> Eintrag </a>
				</div>
			 </div>
			</div>
		</nav>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
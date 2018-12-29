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
					<a class="navbar-brand" href="uebersicht.php"><img src="img/icon.png"></a>
				</div>

				<div class="navbar-nav collapse navbar-collapse" id="mainNav">	
						<a class="nav-item nav-link" href="uebersicht.php" id="ueb"><img src="img/tabelle.png"> Übersicht </a>
						<a class="nav-item nav-link" href="eintrag.php" id="ein"><img src="img/bearbeiten.png">Eintrag </a>
						<a class="nav-item nav-link" href="azubi.php" id="ein"><img src="img/people.png">Auszubildenden/Studenten </a>				
				 </div>
				 <form action="includes/logout.inc.php" method="post">
							<button type = "submit" name="logout-submit" class="btn btn-success btn-sm btn-block float-right">Log Out</button>
				</form>
			</div>
		</nav>
	</div>
	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
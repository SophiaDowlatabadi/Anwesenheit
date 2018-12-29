<!DOCTYPE html>
<html>

<head>	
	<title>Übersicht</title>
    <?php include('bootstrapcss.php'); ?>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fullcalendar.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/fullcalendar.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/de.js"></script>
</head>

<body>
	<header>
	<?php include('navbar.php'); ?>
	</header>

	<div class="container">
		<div class="card bg-light text-dark">

			<div class="card-body">
				
				<div id="calendar"></div>

			</div>
		</div>
	</div>

	<footer>
		<?php include('bootstrapjs.php'); ?>	
	</footer>

</body>

</html>
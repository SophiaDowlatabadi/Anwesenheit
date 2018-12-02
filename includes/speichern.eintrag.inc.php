<?php
	include_once 'dbh.inc.php';

	$kuerzel = $_POST['kuerzel'];
	$DatumVon = $_POST['DatumVon'];
	$DatumBis = $_POST['DatumBis'];
	$UhrzeitVon = $_POST['UhrzeitVon'];
	$UhrzeitBis = $_POST['UhrzeitBis'];
	$Grund = $_POST['Grund'];	
	$name = $_POST['name'];

	$sqlEintrag = "INSERT INTO eintrag(kuerzel,Grund, DatumVON, DatumBis, UhrzeitVon, UhrzeitBis, name) VALUES('$kuerzel','$Grund','$DatumVon','$DatumBis','$UhrzeitVon','$UhrzeitBis','$name');";
	mysqli_query($conn, $sqlEintrag);

	header("Location: ../eintrag.php?speichern=success");

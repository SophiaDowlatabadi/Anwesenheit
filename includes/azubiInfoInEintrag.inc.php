<?php
	include_once 'dbh.inc.php';

	$name = $_POST['name']
	$kuerzel = $_POST['kuerzel'];
	$DatumVon = $_POST['DatumVon'];
	$DatumBis = $_POST['DatumBis'];
	$UhrzeitVon = $_POST['UhrzeitVon'];
	$UhrzeitBis = $_POST['UhrzeitBis'];
	$Grund = $_POST['Grund'];

	$sql = "INSERT INTO eintrag(kuerzel,Grund, DatumVON, DatumBis, UhrzeitVon, UhrzeitBis) VALUES('$kuerzel','$Grund', $DatumVon','$DatumBis','$UhrzeitVon','$UhrzeitBis');";
	mysqli_query($conn, $sql);

	header("Location: ../eintrag.php?speichern=success");
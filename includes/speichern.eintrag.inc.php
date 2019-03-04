<?php
	include_once 'dbh.inc.php';

	$name = $_POST['Namen'];
	$Grund = $_POST['Grund'];
	$Tageszeit = $_POST['Tageszeit'];
	$DatumVon = $_POST['DatumVon'];
	$DatumBis = $_POST['DatumBis'];
	$UhrVon = $_POST['UhrzeitVon'];
	$UhrBis = $_POST['UhrzeitBis'];

	$sqlEintrag = "INSERT INTO eintrag(name,grund,tageszeit,anfangEins,endeEins,Von,Bis) VALUES('$name','$Grund','$Tageszeit','$DatumVon','$DatumBis','$UhrVon','$UhrBis');";
	mysqli_query($conn, $sqlEintrag);

	header("Location: ../eintrag.php?speichern=success");

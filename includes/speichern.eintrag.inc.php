<?php
	include_once 'dbh.inc.php';

	$name = $_POST['Namen'];
	$Grund = $_POST['Grund'];
	$Tageszeit = $_POST['Tageszeit'];
	$DatumVon = $_POST['DatumVon'];
	$DatumBis = $_POST['DatumBis'];
	$AnfangZwei= $_POST['AnfangZwei'];	
	$EndeZwei = $_POST['EndeZwei'];
	$UhrVon = $_POST['UhrzeitVon'];
	$UhrBis = $_POST['UhrzeitBis'];

	$sqlEintrag = "INSERT INTO eintrag(name,grund,tageszeit,anfangEins,endeEins,anfangZwei,endeZWei,Von,Bis) VALUES('$name','$Grund','$Tageszeit','$DatumVon','$DatumBis','$AnfangZwei','$EndeZwei','$UhrVon','$UhrBis');";
	mysqli_query($conn, $sqlEintrag);

	header("Location: ../eintrag.php?speichern=success");

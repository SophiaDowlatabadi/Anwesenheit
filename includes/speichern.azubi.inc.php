<?php
	include_once 'dbh.inc.php';

	$kuerzel = $_POST['kuerzel'];
	$name = $_POST['name'];
	$ausbildung = $_POST['ausbildung'];

	$sql = "INSERT INTO azubi(kuerzel,name,ausbildung) VALUES('$kuerzel','$name','$ausbildung');";
	mysqli_query($conn, $sql);

	header("Location: ../azubi.php?speichern=success");
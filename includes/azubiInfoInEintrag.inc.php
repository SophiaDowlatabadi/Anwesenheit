<?php
	include_once 'dbh.inc.php';

	$name = $_POST['name'];
	$kuerzel = $_POST['kuerzel'];
	$ausbildung = $_POST['ausbildung'];

	$sql = "INSERT INTO azubi(name,kuerzel,ausbildung) VALUES('$name', '$kuerzel', '$ausbildung');";
	mysqli_query($conn, $sql);

	header("Location: ../eintrag.php?speichern=success");
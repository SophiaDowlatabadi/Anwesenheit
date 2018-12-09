<?php
	
	$connect = new PDO('mysql:host=localhost;dbname=anwesenheit', 'root', '');

	
	$data = array();

	$query = "SELECT * FROM eintrag ORDER BY id";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
	 $data[] = array(
	  'id'   => $row["eintragID"],
	  'title'   => $row["Grund"],
	  'start'   => $row["DatumVON"],
	  'end'   => $row["DatumBIS"]
	 );
	}

	echo json_encode($data);

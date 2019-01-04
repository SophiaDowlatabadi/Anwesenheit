<?php
	session_start();
	session_unset();//uidUser und so also die session variablen werden gelöscht
	session_destroy();
	header("Location: ../index.php");
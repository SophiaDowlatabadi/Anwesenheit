<?php
	if(isset($_POST['login-submit'])){
		require 'dbh.inc.php';

		$mailuid = $_POST['mailuid']; //das muss geändert werden
		$password = $_POST['pwd-login'];

		if(empty($mailuid) || empty($password)){
			header("Location: ../index.php?error=emptyfields");
			exit();
		}
		else{
			$sql = "SELECT * FROM userazubi WHERE uidUser=? OR emailidUser=?;"; //!
			$statement = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($statement, $sql)){ //run and check if sql statement is ok
				header("Location: ../index.php?error=sqlerror");
				exit();

			}
			else{
				mysqli_stmt_bind_param($statement, "ss", $mailuid, $mailuid);//wegen placeholder //!
				mysqli_stmt_execute($statement);//ausführen
				$result = mysqli_stmt_get_result($statement);

				if($row = mysqli_fetch_assoc($result)){// assoc = associated array anordnen wenn gefetcht wurde, weil in result nicht in einer form ist mit der wir arbeiten können
					$pwdCheck = password_verify($password, $row['pwdidUser']);
					if($pwdCheck == false){
						header("Location: ../index.php?error=wrongpwd1");
						exit();
					}
					else if($pwdCheck == true){
						session_start();
						$_SESSION['userId'] = $row['idUsers']; // zweites sind die Spalten in der DB
						$_SESSION['useruId'] = $row['uidUser'];// die Variablen können dann auch in der Webseite benutzt werden

						header("Location: ../index.php?login=success");
						exit();



					}
					else{
						header("Location: ../index.php?error=wrongpwd2");
						exit();
					}
				}
				else{
					header("Location: ../index.php?error=wrongpwd3");
					exit();
				}


			}

		}


	}
	else{
		header("Location: ../index.php");
		exit();
	}
<?php
	if(isset($_POST['signup-submit'])){

		require 'dbh.inc.php';

		$username = §_POST['uid'];
		$email = §_POST['mail'];
		$password = §_POST['pwd'];
		$passwordRepeat = §_POST['pwd-repeat'];
		//hier kommen noch die anderen Daten aus den anderen Felder hin

		if(empty($username) || empty($email) || empty($password)|| empty($passwordRepeat)){//alle Felder ausgefüllt

			header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail"=$email);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){ //beide unten
			header("Location: ../signup.php?error=invalidmail&uid=".$username);
			exit();
		}

		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //wenn Email ok ist
			header("Location: ../signup.php?error=invalidmailuid");
			exit();
		}
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){ //PWD Überprüfung
			header("Location: ../signup.php?error=uid&mail=".$email);
			exit();
		}
		else if($password !== $passwordRepeat){
			header("Location: ../signup.php?error=pwdcheck&uid".$username."&mail"=$email);
			exit();
		}
		else{ // wenn username schon verwendet wird
			$sql = "SELECT uidUser FROM userazubi WHERE uidUser=?";
			$statement = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($statement, $sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
			}
			else{
				mysqli_stmt_bind_param($statement, "s", $username);// in "" steht worauf kontrolliert werden soll; s=string, int=i, b= blob, d= double
				mysqli_stmt_execute($statement);
				mysqli_stmt_store_result($statement);
				$resultcheck = mysqli_stmt_num_rows($statement);// das ist das ergebniss der db(die zeile)
				if($resultcheck > 0){
					header("Location: ../signup.php?error=usertaken");
					exit();
				}
				else{
					$sql = "INSERT INTO";
				}

			}

		}
	}

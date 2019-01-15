<?php
	if(isset($_POST['signup-submit'])){

		require 'dbh.inc.php';

		$name = $_POST['nameid'];
		$username = $_POST['uid'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		$beginn = $_POST['DatumVon'];
		$ende = $_POST['DatumBis'];
		$ausbildungsberuf = $_POST['ausbildung'];
		$obAusbilder = $_POST['obAusbilder'];

		if(empty($name) ||empty($username) || empty($password) || empty($passwordRepeat)){//alle Felder ausgefüllt

			header("Location: ../signup.php?error=emptyfields&uid=".$username);
			exit();
		}
		else if(preg_match("/^*$/", $password) == true){ //PWD Überprüfung
			header("Location: ../signup.php?error=pws");
			exit();
		}
		else if($password !== $passwordRepeat){ //ob die PWDer übereinstimmen
			header("Location: ../signup.php?error=pwdcheck&uid".$username);
			exit();
		}
		else{ // wenn username schon verwendet wird
			$sql = "SELECT usernameUsers FROM registrierung WHERE usernameUsers=?";
			$statement = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($statement, $sql)){
				header("Location: ../signup.php?error=sqlerrorx");
				exit();
			}
			else{
				mysqli_stmt_bind_param($statement, "s", $username);// in "" steht worauf kontrolliert werden soll; s=string, int=i, b= blob, d= double
				mysqli_stmt_execute($statement);
				mysqli_stmt_store_result($statement);
				$resultcheck = mysqli_stmt_num_rows($statement);// das ist das ergebniss der db(die zeile)
				if($resultcheck >= 1){
					header("Location: ../signup.php?error=usertaken");
					exit();
				}
				else{
					$sql = "INSERT INTO registrierung(nameUsers,usernameUsers, pwdUsers, anfang, ende, ausbildungsberufUsers, obAusbilder) VALUES (?,?,?,?,?,?,?) ";
					$statement = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($statement, $sql)){
						header("Location: ../signup.php?error=sqlerror");
						exit();
					}
					else{

						$hashdPwd = password_hash($password, PASSWORD_DEFAULT);//bicript
						mysqli_stmt_bind_param($statement, "sssssss", $name,$username,$hashdPwd, $beginn,$ende,$ausbildungsberuf, $obAusbilder);// in "" steht worauf kontrolliert werden soll; s=string, int=i, b= blob, d= double
						mysqli_stmt_execute($statement);
						mysqli_stmt_store_result($statement);
						header("Location: ../uebersicht.php?signup=success");
						exit();
					
					}
				}

			}
			mysqli_stmt_close($statement);
			mysqli_close($conn);

		}
		header("Location: ../signup.php");
		exit();

	}


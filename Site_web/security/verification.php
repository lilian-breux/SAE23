<?php
	session_start();
	/* Access to the database */
	include ("../mysql.php");
	
	/*Recovery of form data*/

	#mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	#htmlspecialchars replaces 5 characters and avoids injecting SQL code.
	$grade = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['grade']));
	$login = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['email'])); 
    $mdp = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['mdp']));
	
	/* SQL queries */

	if($grade=="Administration"){ #If he wants to connect as an administrator
		$requete = "SELECT count(*) FROM Administration where 
			login = '".$login."' and password = SHA1('".$mdp."') ";#Selects in the whole table the number of accounts that have the information given for login and password
		$exec_requete = mysqli_query($id_bd,$requete);
		$reponse = mysqli_fetch_array($exec_requete);
		$count = $reponse['count(*)'];
		if($count!=0){ #Username and password are correct
			$_SESSION["auth"]="admin";
			header('Location: ../Administration.php');
		} else {#If the number is equal to 0
			header('Location: ../login.php?erreur=1'); #Incorrect user or password
		}
	} else { #Or if he wants to connect to a building account
		$requete = "SELECT count(*) FROM Batiment where 
			login = '".$login."' and password = SHA1('".$mdp."') ";#Selects in the whole table the number of accounts that have the information given for login and password
		$exec_requete = mysqli_query($id_bd,$requete);
		$reponse = mysqli_fetch_array($exec_requete);
		$count = $reponse['count(*)'];
		if($count!=0){ #Username and password are correct
			$_SESSION["auth"]=$grade;
			header('Location: ../'.$grade.'.php');
		} else {#If the number is equal to 0
			header('Location: ../login.php?erreur=1'); #Incorrect user or password
		}
	}
 ?>

<?php
	session_start();
	/* Access to the database */
	include ("../mysql.php");
	
	/*mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	htmlspecialchars replaces 5 characters and avoids injecting SQL code.*/
	$grade = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['grade']));
	$login = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['email'])); 
    $mdp = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['mdp']));
	
	if($grade=="Administration"){
		$requete = "SELECT count(*) FROM Administration where 
			login = '".$login."' and password = SHA1('".$mdp."') ";
		$exec_requete = mysqli_query($id_bd,$requete);
		$reponse = mysqli_fetch_array($exec_requete);
		$count = $reponse['count(*)'];
		if($count!=0){ //Username and password are correct
			$_SESSION["auth"]="admin";
			header('Location: ../Administration.php');
		} else {
			header('Location: ../login.php?erreur=1'); //Incorrect user or password
		}
	} else {
		$requete = "SELECT count(*) FROM Batiment where 
			login = '".$login."' and password = SHA1('".$mdp."') ";
		$exec_requete = mysqli_query($id_bd,$requete);
		$reponse = mysqli_fetch_array($exec_requete);
		$count = $reponse['count(*)'];
		if($count!=0){ //Username and password are correct
			$_SESSION["auth"]=$grade;
			header('Location: ../'.$grade.'.php');
		} else {
			header('Location: ../login.php?erreur=1'); //Incorrect user or password
			$_SESSION = array(); // Reset of the session table
            session_destroy();   // Destroy the session
            unset($_SESSION);
		}
	}
 ?>
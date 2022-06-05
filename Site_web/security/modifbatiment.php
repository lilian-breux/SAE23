<?php
    session_start(); 
	if ($_SESSION['auth']!="admin")
        header("Location:login.php?erreur=2");
    
    include ("../mysql.php");
	
	//mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	//htmlspecialchars replaces 5 characters and avoids injecting SQL code.
	$grade = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['grade']));
	$login = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['email'])); 
    $mdp = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['mdp']));
	
    $requete = "UPDATE `Batiment` SET `login`= '".$login."',`password`=SHA1('".$mdp."') WHERE `name` = '".$grade."'";
    $exec_requete = mysqli_query($id_bd,$requete)
        or die("Execution de la requete impossible : $requete");;
    header('Location: ../Administration.php?erreur=0');
?>
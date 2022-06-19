<?php
    session_start(); 
	if ($_SESSION['auth']!="admin")# If it's not a administator
        header("Location:login.php?erreur=2");#Sends to the login.php page
    
    include ("../mysql.php"); #Connection with the database
	
    /*Recovery of form data*/

	#mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	#htmlspecialchars replaces 5 characters and avoids injecting SQL code.
	$bate = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['bate']));
	$type = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['type']));
    $room = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['room']));
    $modif = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['modification']));
	
    if($modif=="Nouveau"){
        $requete="SELECT * FROM `Capteur` WHERE `bate`= '".$bate."' AND `type` = '".$type."' AND `room` = '".$room."'";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        $resultat=mysqli_fetch_array($exec_requete);
        if(empty($resultat)){
            $requete = "INSERT INTO `Capteur` (`bate`, `type`, `room`, `idcapt`) VALUES ('".$bate."', '".$type."', '".$room."', NULL) ";
            $exec_requete = mysqli_query($id_bd,$requete)
                or die("Execution de la requete impossible : $requete");
            header('Location: ../Administration.php?erreur=0');#erreur=0 means that it worked well
        } else {
            header('Location: ../Administration.php?erreur=3');#erreur=4 means that the sensor name already exists
        }
    }
    if($modif=="Supprimer"){
        $requete="SELECT * FROM `Capteur` WHERE `bate`= '".$bate."' AND `type` = '".$type."' AND `room` = '".$room."'";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        $resultat=mysqli_fetch_array($exec_requete);
        if(empty($resultat)){
            header('Location: ../Administration.php?erreur=2');#erreur=5 means that the sensor doesn't exists
        } else {
        /* SQL queries */

        #To secure passwords we use SHA1. The passwords do not appear in clear text in the database
        $requete = "DELETE FROM Batiment WHERE `bate`= '".$bate."' AND `type` = '".$type."' AND `room` = '".$room."'";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        header('Location: ../Administration.php?erreur=0');#erreur=0 means that it worked well
        }
    }
?>
<?php
    session_start(); 
	if ($_SESSION['auth']!="admin")# If it's not a administator
        	header("Location:login.php?erreur=2");#Sends to the login.php page
    
    include ("../mysql.php"); #Connection with the database
	
    /*Recovery of form data*/

	#mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	#htmlspecialchars replaces 5 characters and avoids injecting SQL code.
	$bate = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['bate']));
	$login = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['email'])); 
    $mdp = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['mdp']));
    $modif = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['modification']));
	
    if($modif=="Modifier"){
        $requete="SELECT * FROM `Batiment` WHERE `name`='".$bate."';";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        $resultat=mysqli_fetch_array($exec_requete);

        if(empty($resultat)){
            header('Location: ../Administration.php?erreur=2');#erreur=2 means that the bulding who have this name and/or this login doesn't exists
        } else {
            /* SQL queries */

            #To secure passwords we use SHA1. The passwords do not appear in clear text in the database
            $requete = "UPDATE `Batiment` SET `login`= '".$login."',`password`=SHA1('".$mdp."') WHERE `name` = '".$bate."'";
            $exec_requete = mysqli_query($id_bd,$requete)
                or die("Execution de la requete impossible : $requete");
            header('Location: ../Administration.php?erreur=0');#erreur=0 means that it worked well
        }

        
    }
    if($modif=="Nouveau"){
        $requete="SELECT * FROM `Batiment` WHERE `name`='".$bate."';";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        $resultat=mysqli_fetch_array($exec_requete);
        if(empty($resultat)){
            $requete = "INSERT INTO `Batiment` (`name`, `login`, `password`) VALUES ('".$bate."', '".$login."', SHA1('".$mdp."'))";
            $exec_requete = mysqli_query($id_bd,$requete)
                or die("Execution de la requete impossible : $requete");
            header('Location: ../Administration.php?erreur=0');#erreur=0 means that it worked well
        } else {
            header('Location: ../Administration.php?erreur=3');#erreur=3 means that the building name already exists
        }
    }
    if($modif=="Supprimer"){
        $requete="SELECT * FROM `Batiment` WHERE `name`='".$bate."' AND `login`='".$login."';";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        $resultat=mysqli_fetch_array($exec_requete);
        if(empty($resultat)){
            header('Location: ../Administration.php?erreur=2');#erreur=2 means that the bulding who have this name and/or this login doesn't exists
        } else {
        /* SQL queries */

        #To secure passwords we use SHA1. The passwords do not appear in clear text in the database
        $requete = "DELETE FROM Batiment WHERE `name` = '".$bate."' AND `login`='".$login."';";
        $exec_requete = mysqli_query($id_bd,$requete)
            or die("Execution de la requete impossible : $requete");
        header('Location: ../Administration.php?erreur=0');#erreur=0 means that it worked well
        }
    }
?>

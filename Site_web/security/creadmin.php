
<?php
    session_start();
    include ("../mysql.php"); #Connection with the database
    
    #Request that allows to count the number of administrators
	$requete = "SELECT count(*) FROM `Administration`";
    $exec_requete = mysqli_query($id_bd,$requete)
        or die("Execution de la requete impossible : $requete");;
    $reponse = mysqli_fetch_array($exec_requete);

    /*Recovery of form data*/

	#mysqli_real_escape_string is function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection.
	#htmlspecialchars replaces 5 characters and avoids injecting SQL code.
    $login = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['email'])); 
    $mdp = mysqli_real_escape_string($id_bd,htmlspecialchars($_POST['mdp']));

    /* SQL queries */

    $count = $reponse['count(*)'];
    if($count==0){ #If the number of administrators is equal to 1
        $requete = "INSERT INTO `Administration` (`login`, `password`) VALUES ('$login', SHA1('".$mdp."'))";
        $resultat = mysqli_query($id_bd, $requete)
            or die("Execution de la requete impossible : $requete"); #the administrator account has been created on the database
        
        mysqli_close($id_bd);
        header('Location: ../index.php'); #Return to the home page
    } else { #If the number of directors is greater than 1 
        header('Location: ../login.php?erreur=2'); #an error is returned because the administrator account is already created
    }
?>

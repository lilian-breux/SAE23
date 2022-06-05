<?php
    session_start();
    include ("../mysql.php");
    
	$requete = "SELECT count(*) FROM `Administration`";
    $exec_requete = mysqli_query($id_bd,$requete)
        or die("Execution de la requete impossible : $requete");;
    $reponse = mysqli_fetch_array($exec_requete);

    $login = $_POST['email'];
    $mdp = $_POST['mdp'];

    $count = $reponse['count(*)'];
    if($count==0){
        $requete = "INSERT INTO `Administration` (`login`, `password`) VALUES ('$login', SHA1('".$mdp."'))";
        $resultat = mysqli_query($id_bd, $requete)
            or die("Execution de la requete impossible : $requete");
        
        mysqli_close($id_bd);
        header('Location: ../index.php');
    } else {
        header('Location: ../login.php?erreur=2');
    }
?>

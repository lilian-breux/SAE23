<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="../styles/style.css" />
	</head>
    <body>
        <section>
            <?php
                include("./includes/nav.php");
                include ("./mysql.php");
            ?>
            <!-- Login -->
            <h1>Connexion à un compte</h1>
            <form action="./security/verification.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email" required /><br />
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" minlength="3" required /><br />
                <select name="grade" id="grade">
                    <option value="Administration">Administration</option>
                <?php
                    $requete = "SELECT * FROM `Batiment` ORDER BY `name`";
                    $resultat = mysqli_query($id_bd, $requete)
                        or die("Execution de la requete impossible : $requete");
                    mysqli_close($id_bd);
                    while($ligne=mysqli_fetch_array($resultat)){
                        extract($ligne);
                        if ($i){
                            echo '<option value="'.$name.'">'.$name.'</option>' ;
                            $i=false;
                        } else {
                             echo '<option value="'.$name.'">'.$name.'</option>' ;
                        }  
                    }
                ?>
                </select><br />

                <button type="submit">Envoyer</button>
                <button type="reset">Réinitialiser</button>
                <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1)
                            echo "<p class=\"error\">Utilisateur ou mot de passe incorrect</p>";
                        if($err==2)
                            echo "<p class=\"error\">Vous n'avez pas la permission d'accéder à cette page, veuillez vous connecter avec un compte autorisé !</p>";
                    }
                ?>
            </form>
        </section>
    </body>
</html>

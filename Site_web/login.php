<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<!-- Title of the web page -->
		<title> Connexion </title>
		
		<!-- Definition of the metadata of the website -->   
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" /> 
		<meta http-equiv= "X-UA-Compatible" content= "IE=edge" />
		<meta name="description" content="SAE" />
		<meta name="keywords" content="HTML, CSS, PHP" />
		<link rel="stylesheet" type="text/css" href="../styles/style.css" />
	</head>
	
	
    <!-- Beginning of the website's body -->	
    <body>
<!-- Navigation bar -->
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
	
			
		<!-- Beginning of the PHP code to display a responsive form --> 
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
	<!-- Website's footer -->
	 <footer>
		 <ul>
			<li><a href="mlegales.php"> Mentions Légales </a></li>
			<li>
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
					<img style="border:0;width:88px;height:31px"
						src="http://jigsaw.w3.org/css-validator/images/vcss"
						alt="¡CSS Validé!" /></a>
			</li>
			<li> IUT R&T </li>		
		</ul>
	 </footer>
    </body>
</html>

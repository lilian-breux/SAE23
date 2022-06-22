
<?php 
	session_start(); 
	if ($_SESSION['auth']!="admin")# If it's not a administator
        header("Location:login.php?error=2");#Sends to the login.php page
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		
        <!-- Title of the web page -->
		<title>Administration</title>
        <!-- Definition of the metadata of the website -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" /> 
		<meta http-equiv= "X-UA-Compatible" content= "IE=edge" />
		<meta name="description" content="SAE" />
		<meta name="keywords" content="HTML, CSS, PHP" />
		<link rel="stylesheet" type="text/css" href="./styles/style.css" />
	</head>

	<!-- Navigation bar -->
   
    <body>
         <header>
        <?php 
            include("./includes/nav.php");
        ?>
    	</header>
            <!-- Modifies building accounts -->
            <h1>Modification d'un bâtiment</h1>
            <table class="capteur">
				 <thead>
                    <tr>
                        <th colspan="2">Bâtiments existants</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><th>Nom du bâtiment</th><th>Login</th></tr>
                    <?php
                        include ("mysql.php"); #Connection with the database

                        /* SQL query to retrieve the login corresponding to the building */

                        $requete = "SELECT `login`, `name` FROM `Batiment` ORDER BY `name`";
                        $resultat = mysqli_query($id_bd, $requete);
                        
                        while($row = mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$row["name"]."</td><td>".$row["login"]."</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
		<section>
            <form class="formulaire" action="./security/modifbatiment.php" method="POST">
                <input type="text" name="bate" id="bate" placeholder="Nom du batiment" maxlength="4" required /><br />
                <input type="email" name="email" id="email" placeholder="Email" required /><br />
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" minlength="3" required /><br />
                <select name="modification" id="modification">
                    <option value="Nouveau">Nouveau bâtiment</option>
                    <option value="Modifier">Modifier un bâtiment</option>
                    <option value="Supprimer">Supprimer un bâtiment</option>
                </select><br />

                <button type="submit">Envoyer</button>
                <button type="reset">Réinitialiser</button>
            </form>
		</section>
            <?php
            if(isset($_GET['erreur'])){ 
                    $err = $_GET['erreur'];
                    if($err==0)
                        echo "<p class=\"right\">Tout à bien fonctionné</p>";
                    if($err==1)
                        echo "<p class=\"error\">Utilisateur incorrect</p>";
                    if($err==2)
                        echo "<p class=\"error\">Nom du batiment et/ou Utilisateur sont incorrect</p>";
                    if($err==3)
                        echo "<p class=\"error\">Nom du batiment existe déjà</p>";
            }
            ?>           
			<h2	 class="titre">Suppression/Ajout de capteurs</h2>
            
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Capteurs existants</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><th>Bâtiment</th><th>Salle</th><th>type de Capteur</th></tr>
                    <?php
                        include ("mysql.php"); #Connection with the database

                        /* SQL query to retrieve all sensors in the database */

                        $requete = "SELECT `bate`, `room`, `type` FROM `Capteur` ORDER BY `bate`, `room`";
                        $resultat = mysqli_query($id_bd, $requete);
                        
                        while($row = mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$row["bate"]."</td><td>".$row["room"]."</td><td>".$row["type"]."</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
			<section>
            <form action="./security/modifcapteur.php" method="POST">
                <select name="bate" id="bate">
                <?php
                    /* SQL query to retrieve the login corresponding to the building */
                    $requete = "SELECT * FROM `Batiment` ORDER BY `name`";
                    $resultat = mysqli_query($id_bd, $requete)
                        or die("Execution de la requete impossible : $requete");
                    mysqli_close($id_bd);
                    while($ligne=mysqli_fetch_array($resultat)){
                        extract($ligne);
                        echo '<option value="'.$name.'">'.$name.'</option>' ;
                    }
                ?>
                </select><br />
                <input type="text" name="room" id="room" placeholder="Nom de la salle" maxlength="4" required /><br />
                <select name="type" id="type">
                    <option value="temperature">Temperature</option>
                    <option value="luminosite">Luminosite</option>
                    <option value="co2">Co2</option>
                </select><br />
                <select name="modification" id="modification">
                    <option value="Nouveau">Nouveau capteur</option>
                    <option value="Supprimer">Supprimer un capteur</option>
                </select><br />

                <button type="submit">Envoyer</button>
                <button type="reset">Réinitialiser</button>
            </form>
            <?php
                /* Allows to notify if there was an error or everything went well */
                if(isset($_GET['erreur'])){ 
                    $err = $_GET['erreur'];
                    if($err==6)
                        echo "<p class=\"right\">Tout à bien fonctionné</p>";
                    if($err==4)
                        echo "<p class=\"error\">Le capteur existe déjà</p>";
                    if($err==5)
                        echo "<p class=\"error\">Le capteur n'existe pas</p>";
                }
            ?>
        <!-- Website's footer -->
	</section>
	    <footer>
        <ul>
            <li><a href="mlegales.php"> Mentions Légales </a></li>
            <li>
                <a href="https://jigsaw.w3.org/css-validator/#validate_by_input">
                    <img style="border:0;width:88px;height:31px"
                        src="http://jigsaw.w3.org/css-validator/images/vcss"
                        alt="¡CSS Validé!" /></a>
            </li>
            <li>
                <a href="https://validator.w3.org/#validate_by_input">
                <img style="border:0;width:88px;height:31px"
                    src="https://www.w3.org/Icons/valid-html401.png"
                    alt="¡HTML Validé!" />
            </li>
            <li> IUT R&T </li>
        </ul>
	    </footer>
    </body>
</html>

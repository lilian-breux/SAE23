<?php 
	session_start(); 
	if ($_SESSION['auth']!="admin")# If it's not a administator
        header("Location:login.php?error=2");#Sends to the login.php page
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <!-- Title of the web page -->
		<meta charset="UTF-8" />
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
    <header>
        <?php 
            include("./includes/nav.php");
        ?>
    </header>
    <body>
        <section>
            <!-- Modifies building accounts -->
            <h1>Modification d'un bâtiment</h1>
            <table>
                <h2>Bâtiments existants</h2>
                <tbody>
                    <tr><th>Nom du bâtiment</th><th>Login</th></tr>
                    <?php
                        include ("mysql.php"); #Connection with the database

                        /* SQL query to retrieve the login corresponding to the building */

                        $requete = "SELECT `login`, `name` FROM `Batiment` ORDER BY `name`";
                        $resultat = mysqli_query($id_bd, $requete);
                        
                        while($row = mysqli_fetch_array($resultat)){
                            extract($row);
                            if ($i){
                                echo "<tr><td>".$row["name"]."</td><td>".$row["login"]."</td></tr>";
                                $i=false;
                            } else {
                                echo "<tr><td>".$row["name"]."</td><td>".$row["login"]."</td></tr>";
                            }  
                        }
                    ?>
                </tbody>
            </table>
            <form action="./security/modifbatiment.php" method="POST">
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
            <?php
                /* Allows to notify if there was an error or everything went well */
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
        </section>
        <!-- Website's footer -->
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

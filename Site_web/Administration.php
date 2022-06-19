<?php 
	session_start(); 
	if ($_SESSION['auth']!="admin")
        header("Location:login.php?error=2");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Administration</title>
		<link rel="stylesheet" type="text/css" href="../styles/style.css" />
	</head>
	<!-- Navigation bar -->
    <body>
        <?php 
            include("./includes/nav.php");
        ?>
        <section>
            <!-- Modification des comptes bâtiments -->
            <h1>Modification d'un bâtiment</h1>
            <table>
                <h2>Bâtiments existants</h2>
                <tbody>
                    <tr><th>Nom du bâtiment</th><th>Login</th></tr>
                    <?php
                        include ("mysql.php");

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
                <input type="email" name="email" id="email" placeholder="Email" required /><br />
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" minlength="3" required /><br />
                <select name="grade" id="grade">
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
            </form>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p class=\"error\">Utilisateur incorrect</p>";
                    elseif($err==0)
                        echo "<p class=\"right\">Utilisateur et/ou mot de passe bien changés</p>";
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

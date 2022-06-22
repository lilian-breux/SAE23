
<?php 
	session_start(); 
	if ($_SESSION['auth']!="RT"){
        if ($_SESSION['auth']!="admin"){
            header("Location:login.php?erreur=2");
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Batiment réseaux et télécoms</title>
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
        <h1>Batiment réseau</h1>
        <?php 
            include("mysql.php");#Connection with the database
    	?>
        <article class="salle">
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E208</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Temperature</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                        /* SQL query that allows us to link all the tables for example here we want all the values of the sensor with its dates and time of the sensor in the INFO building on a temperature sensor in room E208 */ 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='temperature' AND room='E208'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E208</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Luminosité</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='luminosite' AND room='E208'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E208</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Co2</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='co2' AND room='E208'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
        </article>
        <article class="salle">
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E207</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Temperature</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='temperature' AND room='E207'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E207</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Luminosité</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='luminosite' AND room='E207'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
            <table class="capteur">
                <thead>
                    <tr>
                        <th colspan="3">Salle E207</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Co2</td>
                        <td>Date</td>
                        <td>Heure</td>
                    </tr>
                    <?php 
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, `Mesure`.`date`, `Mesure`.`hours`
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='co2' AND room='E207'
                                    ORDER BY date DESC, hours DESC;";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            while($ligne=mysqli_fetch_array($resultat)){
                                echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                            }

                    ?>
                </tbody>
            </table>
        </article>
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

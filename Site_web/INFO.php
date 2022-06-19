<?php 
	session_start(); 
	if ($_SESSION['auth']!="INFO"){
        if ($_SESSION['auth']!="admin"){
            header("Location:login.php?erreur=2");
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Batiment informatique</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    </head>
<!-- Navigation bar -->
    <body>
        <h1>Batiment informatique</h1>
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B208</th>
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
                                WHERE bate='INFO' AND type='temperature' AND room='B208'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B208</th>
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
                                WHERE bate='INFO' AND type='luminosite' AND room='B208'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B208</th>
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
                                WHERE bate='INFO' AND type='co2' AND room='B208'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B207</th>
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
                                WHERE bate='INFO' AND type='temperature' AND room='B207'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B207</th>
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
                                WHERE bate='INFO' AND type='luminosite' AND room='B207'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle B207</th>
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
                                WHERE bate='INFO' AND type='co2' AND room='B207'
                                ORDER BY date DESC, hours DESC;";
                        $resultat = mysqli_query($id_bd, $requete)
                            or die("Execution de la requete impossible : $requete");
                        while($ligne=mysqli_fetch_array($resultat)){
                            echo "<tr><td>".$ligne['value']."</td><td>".$ligne['date']."</td><td>".$ligne['hours']."</td></tr>";
                        }

                ?>
            </tbody>
        </table>
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

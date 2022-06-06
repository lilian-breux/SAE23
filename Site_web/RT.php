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
        <link rel="stylesheet" type="text/css" href="./styles/style.css" />
    </head>
    <body>
        <h1>Batiment réseau</h1>
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E208</th>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E208</th>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E208</th>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E207</th>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E207</th>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4">Salle E207</th>
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
    </body>
</html>
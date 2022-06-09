<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Consultation</title>
        <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    </head>
    <body>
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
        <h1>Consultation en temps réel</h1>
        <?php 
            $requete="SELECT max(date), max(hours) FROM `Mesure`";
            $resultat = mysqli_query($id_bd, $requete);
                        
            while($row = mysqli_fetch_array($resultat)){
                echo "<p>Date de la dernière mesure : ".$row["max(date)"]."<br /> Heure de la dernière mesure : ".$row["max(hours)"]."</p>";
            }
            #echo "<p>Date de la dernière mesure".$ligne["date"]."<br /> Heure de la dernière mesure :".$test["hours"]."</p>";
        ?>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Batiment RT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salle</td>
                    <td>Temperature</td>
                    <td>Luminosité</td>
                    <td>Co2</td>
                </tr>
                <?php 
                    $piece = array('E207', 'E208');
                    for ($j = 0; $j <= 1; $j++) {
                        echo "<tr>";
                        echo "<td>".$piece[$j]."</td>";

                        $captype = array('temperature', 'luminosite', 'co2');
                        for ($i = 0; $i <= 2; $i++) {
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, MAX(`Mesure`.`date`), MAX(`Mesure`.`hours`)
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='RT' AND type='$captype[$i]' AND room='$piece[$j]';";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            if ($captype[$i] = 'temperature'){
                                while($temperature = mysqli_fetch_array($resultat)){
                                    echo "<td>".$temperature['value']."</td>";
                                }
                            }
                            if ($captype[$i] = 'luminosite'){
                                while($luminosite = mysqli_fetch_array($resultat)){
                                    echo "<td>".$luminosite['value']."</td>";
                                }
                            }
                            if ($captype[$i] = 'co2'){
                                while($co2 = mysqli_fetch_array($resultat)){
                                    echo "<td>".$co2['value']."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th colspan="4">Batiment INFO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Salle</td>
                    <td>Temperature</td>
                    <td>Luminosité</td>
                    <td>Co2</td>
                </tr>
                <?php 
                    $piece = array('B207', 'B208');
                    for ($j = 0; $j <= 1; $j++) {
                        echo "<tr>";
                        echo "<td>".$piece[$j]."</td>";

                        $captype = array('temperature', 'luminosite', 'co2');
                        for ($i = 0; $i <= 2; $i++) {
                            $requete="SELECT `Capteur`.`bate`, `Capteur`.`room`, `Capteur`.`type`, `Valeur`.`value`, MAX(`Mesure`.`date`), MAX(`Mesure`.`hours`)
                                    FROM `Capteur` 
                                        LEFT JOIN `Valeur` ON `Valeur`.`idcap` = `Capteur`.`idcapt` 
                                        LEFT JOIN `Mesure` ON `Valeur`.`idmesu` = `Mesure`.`idmesu`
                                    WHERE bate='INFO' AND type='$captype[$i]' AND room='$piece[$j]';";
                            $resultat = mysqli_query($id_bd, $requete)
                                or die("Execution de la requete impossible : $requete");
                            if ($captype[$i] = 'temperature'){
                                while($temperature = mysqli_fetch_array($resultat)){
                                    echo "<td>".$temperature['value']."</td>";
                                }
                            }
                            if ($captype[$i] = 'luminosite'){
                                while($luminosite = mysqli_fetch_array($resultat)){
                                    echo "<td>".$luminosite['value']."</td>";
                                }
                            }
                            if ($captype[$i] = 'co2'){
                                while($co2 = mysqli_fetch_array($resultat)){
                                    echo "<td>".$co2['value']."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>

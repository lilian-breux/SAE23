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
 <header>
     <nav>
        <ul>
	      <li><p> SAE 23 Mettre en place une solution informatique pour l'entreprise </p> </li>
              <li><a href="Administration.php"> Administration </a> </li>
              <li><a href="consultation.php"> Consultation </a></li> 
              <li><a href="RT.php">RT</a></li>
	      <li><a href="INFO.php">RT</a></li>
              <li><a href="index.php"> Accueil </a></li>
	      <li><a href="login.php"> Connexion</a></li>
	      <li><a href="../GanttProject/SAE23.pdf"> GANTT </a></li>
    	</ul>
      </nav>
    </header>
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
    </body>
</html>

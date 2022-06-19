<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
	
    <head>
	<!-- Title of the web page -->
	<title>Consultation</title>  
	    
	/* Definition of the metadata of the website -->   
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
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
	
	<!-- Title -->
        <h1>Consultation en temps réel</h1>
	    
	<!-- PHP code used to extract the last measurement done by the sensors --> 
        <?php 
            $requete="SELECT max(date), max(hours) FROM `Mesure`";
            $resultat = mysqli_query($id_bd, $requete);
                        
            while($row = mysqli_fetch_array($resultat)){
                echo "<p>Date de la dernière mesure : ".$row["max(date)"]."<br /> Heure de la dernière mesure : ".$row["max(hours)"]."</p>";
            }
            #echo "<p>Date de la dernière mesure".$ligne["date"]."<br /> Heure de la dernière mesure :".$test["hours"]."</p>";
        ?>
	    
	<!-- Table to extract the values sent by the sensors in real time from "Bâtiment RT" -->
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
		    
		<!-- PHP code to extract the values sent by the sensors in real time from "Bâtiment RT" -->    
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
	    
	<!-- Table to extract the values sent by the sensors in real time from "Bâtiment INFO" -->
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
		    
		<!-- PHP code to extract the values sent by the sensors in real time from "Bâtiment INFO" -->    
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
		 <li>
		    <a href="https://jigsaw.w3.org/css-validator/#validate_by_input">
			<img style="border:0;width:88px;height:31px"
			    src="https://www.w3.org/Icons/valid-html401.png"
			    alt="¡HTML Validé!" />
		</li>
		<li> IUT R&T </li>		
	</ul>
	 </footer>
    </body>
</html>

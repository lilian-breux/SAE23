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
        <link rel="stylesheet" type="text/css" href="./styles/style.css" />
    </head>
    <body>
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
        <p>Info</p>
    </body>
</html>

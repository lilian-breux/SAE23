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
        <?php 
            include("./includes/nav.php");
            include("mysql.php");
    	?>
        <p>RT</p>
    </body>
</html>
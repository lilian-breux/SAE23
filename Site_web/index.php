<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
 <head>
  /* Title of the web page */
  <title>SAE 23</title>
	 
  /* Definition of the metadata of the website */
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" /> 
  <meta http-equiv= "X-UA-Compatible" content= "IE=edge" />
  <meta name="description" content="SAE" />
  <meta name="keywords" content="HTML, CSS, PHP" />
  <link rel="stylesheet" type="text/css" href="../styles/style.css" />
 </head>
	
	/* Beginning of the web page's body */
	 <body>
	 	<?php 
            include("./includes/nav.php");
    		?>
		 /* Titre */
		<h1> SAE 23 - Mettre en place une solution informatique pour l'entreprise </h1>
		<br>
		 
		 /* Beginning of the PHP code */ 
		<?php 
			include ("mysql.php");
			
			/* Creation of the administrator account */
			$requete = "SELECT count(*) FROM `Administration`";
			$exec_requete = mysqli_query($id_bd,$requete);
			$reponse = mysqli_fetch_array($exec_requete);
			
		 	/* Creation of the form allowing a user to login */ 
			$count = $reponse['count(*)'];
			if($count==0){
				echo "<h1>Création de compte administrateur</h1>";
				echo "<form action=\"./security/creadmin.php\" method=\"POST\">";
				echo "    <input type=\"email\" name=\"email\" id=\"email\" placeholder=\"Email\" required /><br />";
				echo "    <input type=\"password\" name=\"mdp\" id=\"mdp\" placeholder=\"Mot de passe\" minlength=\"3\" required /><br />";
				echo "    <button type=\"submit\">Envoyer</button>";
				echo "    <button type=\"reset\">Réinitialiser</button>";
				echo "</form>";
			}
		?>
		 
		 /* Saé's presentation paragraph */
		<p> L'objectif de ce site web est d'offrir aux gestionnaires des bâtiments de l'IUT de Blagnac
			une interface conviviale et simple pour la visualisation des données capteurs. </p>
		<br>
		<h1> Bâtiments gérés </h1>
		<p> Voici la liste des bâtiments gérés avec leurs salles, où on retroue des capteurs de luminosité,
		    CO2 et température: </p>
		 
		 /* Listing the building halls where there's a sensor */ 
		<ul>
			<li> Bâtiment B </li>
				<ul>
					<li> B208 </li>
					<li> B207 </li>
				</ul>
			<br>
			<li> Bâtiment E </li>
				<ul>
					<li> E207 </li>
					<li> E208 </li>
				</ul>
		</ul>
		<br>
		 
	/* Web page's footer */
	 <footer>
		<ul>
			<li><a href="mlegales.html"> Mentions Légales </a></li>
		</ul>
	 </footer> 
	</body>
</html>

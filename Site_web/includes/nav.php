	<nav> 
		<ul>
			<!-- Links without secured consultation -->
			<li><a href="./index.php"> Accueil </a></li> 
			<li><a href="./consultation.php"> Consultation </a></li>
			<?php  
	    # Links with secured consultation #
			
            if ($_SESSION['auth']=="admin"){
                echo "<li><a href=\"./Administration.php\"> Administration </a></li>";
                echo "<li><a href=\"./INFO.php\"> Gestion INFO </a></li>";
                echo "<li><a href=\"./RT.php\"> Gestion RT</a></li>";
            }
            else{
                if($_SESSION['auth']=="INFO"){
                    echo "<li><a href=\"./INFO.php\"> Gestion </a></li>";
                }
                if($_SESSION['auth']=="RT"){
                    echo "<li><a href=\"./RT.php\"> Gestion </a></li>";
                }
                else{
                    echo "<li><a href=\"login.php\"> Connexion </a></li>";
                }
            }
        ?>
		</ul>
	</nav>
	
	

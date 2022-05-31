	<nav> 
		<ul>
			<li><a href="index.html"> Accueil </a></li> 
			<li><a href="consultation.html"> Consultation </a></li>
			<?php 
			if ($_SESSION['auth'])==("admin") {
				{
				echo "<li><a href="administration.html"> Administration </a></li>
				<li><a href="consultation.html"> Consultation </a></li>";
			}
			else {
				if ($_SESSION['auth'])==("INFO") {
					echo "<li><a href="consultation.html"> Consultation </a></li>";
				}
			}
				else { 
					if ($_SESSION['auth'])==("RT") {
						echo "<li><a href="consultation.html"> Consultation </a></li>";
					}
					else {
						echo "<li><a href="ttk.html"> Log In </a></li>";
					}
				}
			}
			?>
		</ul>
	</nav>
	
	
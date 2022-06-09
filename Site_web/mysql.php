<?php
/* Connection script to the smi database */

  $id_bd = mysqli_connect( "localhost","lmll","MatLucLuiLil4", "SAE23")
    or die("Connexion au serveur et/ou à la base de données impossible");

  /* Character encoding management */
  mysqli_query($id_bd, "SET NAMES 'utf8'");

?>

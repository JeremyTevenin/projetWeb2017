<?php
	session_destroy(); // Détruit la session courante
	
	header( "Location: index.php" );
?>

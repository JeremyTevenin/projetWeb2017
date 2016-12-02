<?php
	session_start();
	session_destroy(); // detruit la session courante
	
	header( "Location: index.php" );
?>

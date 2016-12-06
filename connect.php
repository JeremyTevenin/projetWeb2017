<?php
    try {
		$dbauteur = new PDO('mysql:host=localhost;dbname=auteur', 'root', '');
	} catch (PDOException $e) {
		print 'Error!: ' . $e_>getMessage() . '<br/>';
		die();
	}

	try {
		$dbmenu = new PDO('mysql:host=localhost;dbname=menu', 'root', '');
	} catch (PDOException $e) {
		print 'Error!: ' . $e_>getMessage() . '<br/>';
		die();
	}
	
	if (!isset($_SESSION)) { 
		session_start(); 
	}
?>

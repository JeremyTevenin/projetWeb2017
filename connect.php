<?php
    try {
		$db = new PDO('mysql:host=localhost;dbname=auteur', 'root', '');
	} catch (PDOException $e) {
		print 'Error!: ' . $e_>getMessage() . '<br/>';
		die();
	}

    session_start();
    
    function connexion() {
        
        if ( isset($_SESSION['mail']) &&  isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
            echo "Bienvenue ".$_SESSION['nom']." ".$_SESSION['prenom']." !";
            echo "<a href=\"deconnexion.php\">  Se deconnecter  </a>";
        } else {
            echo 'Bienvenue ! <a href="index.php">Se connecter</a> <a href="inscription.php">S\'inscrire ?</a><br/>';
        }
    }

?>

<?php
    try {
		$db = new PDO('mysql:host=localhost;dbname=reversi', 'root', '');
	} catch (PDOException $e) {
		print 'Error!: ' . $e_>getMessage() . '<br/>';
		die();
	}

    session_start();
    
    function connexion() {
        
        if ( isset($_SESSION['pseudo']) ) {
            echo "Bienvenue ".$_SESSION['pseudo'].", bonne chance !";
            echo "<a href=\"deconnexion.php\">  Se deconnecter  </a>";
        } else {
            echo 'Bienvenue, bonne chance ! <a href="index.php">Se connecter</a> <a href="inscription.php">S\'inscrire ?</a><br/>';
        }
    }
    /*//Condition permettant de se rediriger en cas de mauvaise session
    if ( !isset($_SESSION['pseudo']) ) 
    {
        header( 'Location: inscription.php' );
        exit();
    }*/
?>

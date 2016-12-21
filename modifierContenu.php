<?php
include('connect.php');

// Vérifie si on a créé une page
if (isset($_POST['modifierArticle'])) {	
	// On réupére toutes les données
	$nomArticle = $_POST['update_nom_article'];
	$repertoire = $_POST['repertoire'];
	$nom = $_SESSION['nom'];
	$prenom = $_SESSION['prenom'];
	
	$texte = $_POST['textarea'];

	// On récupère la date
	$date.setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	$date = utf8_encode(strftime('%A %d %b %Y'));
	
	// On crée alors l'article modifié
	$handle = fopen( "./articles/$repertoire/$repertoire.php", "c+" );
																					
	$handleTexte = fopen( "./articles/$repertoire/texte.txt", "c+" );
	fwrite($handleTexte, $texte);
	fclose($handleTexte);

	$texte = addcslashes( $texte, "\"" );
					
	$entetePage = "
<?php
	function $repertoire() {	
		echo \" 					<h2> $nomArticle </h2>\\n\"; 
		echo \"						$texte\\n\";
		echo \"						<br /><br />\\n\"; 	";
								
	fwrite( $handle, $entetePage );						
										
	$piedPage = "
		echo \" 				Article écrit par $prenom $nom le $date\\n\"; 
		echo \" 				(date dernière modification)\\n\"; 
	} 
?> 									";
					
	fwrite( $handle, $piedPage );
	fclose( $handle );			
	
	header("Location: lepetitscientifique.php?url=$repertoire"); 
}
?>
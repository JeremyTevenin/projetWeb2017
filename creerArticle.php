<?php
include('connect.php');

// Vérifie si on a créé une page
if (isset($_POST['creerArticle'])) {		
	$nomArticle = $_POST['insert_nom_article'];
	
	// On crée un nom de répertoire valide
	// - preg_replace recherche et remplace l'expression 
	// - str_replace remplace les espaces par '_'
	// - strtolower retourne tout les caractère en minuscule
	$repertoire = preg_replace('/[^a-z0-9-_]/', '', 
			str_replace(array(" ", "'"), "_", 
			strtolower(iconv('utf-8', 'us-ascii//TRANSLIT', iconv('utf-8', 'utf-8//IGNORE', $nomArticle)))));
	
	$url = "$repertoire.php";
					
	// On récupère la date				
	$date.setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	$date = utf8_encode(strftime('%A %d %b %Y'));
	
	// On crée alors l'article
	$handle = fopen( "./articles/$repertoire/$url", "c+" );
																				
	$nom = $_SESSION['nom'];
	$prenom = $_SESSION['prenom'];
	
	// Avec le texte renseigné dans l'éditeur
	$texte = $_POST['textarea'];

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
	} 
?> 									";
					
	fwrite( $handle, $piedPage );
	fclose( $handle );			
	
	header("Location: lepetitscientifique.php?url=$repertoire"); 
}
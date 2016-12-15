<?php
include('connect.php');

// Vérifie si on a créé une page
if (isset($_POST['creerArticle'])) {		
	$nom = $_POST['insert_nom_article'];
	
	// On crée un nom de répertoire valide
	// - preg_replace recherche et remplace l'expression 
	// - str_replace remplace les espaces par '_'
	// - strtolower retourne tout les caractère en minuscule
	$repertoire = preg_replace('/[^a-z0-9-_]/', '', 
			str_replace(array(" ", "'"), "_", 
			strtolower(iconv('utf-8', 'us-ascii//TRANSLIT', iconv('utf-8', 'utf-8//IGNORE', $nom)))));
	
	$url = "$repertoire.php";
					
	$date = strftime('%A %d %B %Y');
	$date.setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	$date = strftime('%A %d %B %Y');
	
	// On crée alors la page 
	$handle = fopen( "./$repertoire/$url", "c+" );
																				
	$nom = $_SESSION['nom'];
	$prenom = $_SESSION['prenom'];
	
	// Avec le texte renseigné dans le questionnaire
	$texte = $_POST['textarea'];

	$handleTexte = fopen( "./$repertoire/texte.txt", "c+" );
	fwrite($handleTexte, $texte);
	fclose($handleTexte);

	$texte = addcslashes( $texte, "\"" );
					
	$entetePage = "
<?php
	function $repertoire() {			
		 
		echo \" 					<h1> $nom </h1>\\n\"; 
		echo \"						$texte\\n\";
		echo \"						<br>\\n\"; 	";
								
	fwrite( $handle, $entetePage );						
				
						
	$piedPage = "
		echo \" 					<fieldset class='cadrePublication'>\\n\"; 
		echo \" 						Article écrit par $prenom $nom le $date\\n\"; 
		echo \" 					</fieldset>\\n\"; 
		echo \"					</fieldset>\\n\"; 
		echo \"				</div>\\n\"; 
		echo \"			</div>\\n\"; 
	} 
?> 									";
					
	fwrite( $handle, $piedPage );
	fclose( $handle );			
	
	header("Location: lepetitscientifique.php"); 
}
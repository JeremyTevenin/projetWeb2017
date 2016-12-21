<?php
include('connect.php');

// On inclut les modèles
include('categorieModel.php');
include('sousCategorieModel.php');
include('articleModel.php');
include('auteurModel.php');

// On inclut les vues
include('vueMenu.php');
include('vueGestionCateg.php');
include('vueGestionSousCateg.php');
include('vueGestionArticle.php');
include('vueGestionAuteur.php');
include('vueLepetitScientifique.php');
	
// On inclut tous les fichier php du dossier articles
$dossierArticles = 'articles';
$dossier = opendir($dossierArticles);
while($fichier = readdir($dossier)){
	while($fichier = readdir($dossier)){
		if ($fichier != '/' && $fichier != '...' && $fichier != '..' && $fichier != '.') {
			include $dossierArticles.'/'.$fichier.'/'.$fichier.'.php';
		}
	}
}
closedir($dossier);	
	
entete();

// On crée les modèles
$categorie = new Categorie;
$souscategorie = new SousCategorie;
$article = new Article;
$auteur = new Auteur;

$dataCateg = $categorie->getCategories();
$dataSousCateg = $souscategorie->getSousCategories();
$dataArticle = $article->getArticles();

$dataAuteur = $auteur->getAuteurs();

menu($dataCateg, $dataSousCateg, $dataArticle);

contenu();

// Si on est en mode invité
if (isset($_GET['url'])) {
	$_GET['url']();
}

// Si on est connecté en tant qu'administrateur
if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {				
	if (isset($_GET['ajouterCateg'])) {
		tabAjouteCateg($dataCateg);
	}
	
	if (isset($_GET['modifierCateg'])) {
		tabModifierCateg($dataCateg);
	}
	
	if (isset($_GET['supprimerCateg'])) {
		tabSupprimeCateg($dataCateg, $dataSousCateg);
	}
	
	if (isset($_GET['ajouterSousCateg'])) {
		tabAjouteSousCateg($dataSousCateg, $dataCateg);
	}
	
	if (isset($_GET['modifierSousCateg'])) {
		tabModifierSousCateg($dataSousCateg);
	}
	
	if (isset($_GET['supprimerSousCateg'])) {
		tabSupprimeSousCateg($dataSousCateg, $dataArticle);
	}
					
	if (isset($_GET['supprimerAuteur'])) {
		tabSupprimeAuteur($dataAuteur);
	}
	
	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_nom_categ'])) {
		$categorie->ajouterCategorie($_GET['insert_id_categ'], $_GET['insert_nom_categ']);
	}

	if (isset($_GET['update_id_categ']) && isset($_GET['update_nom_categ'])) {
		$categorie->modifierCategorie($_GET['update_id_categ'], $_GET['update_nom_categ']);
	}

	if (isset($_GET['delete_id_categ'])) {
		$categorie->supprimerCategorie($_GET['delete_id_categ']);
	}

	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_id_souscateg']) && isset($_GET['insert_nom_souscateg'])) {
		$souscategorie->ajouterSousCategorie($_GET['insert_id_categ'], $_GET['insert_id_souscateg'], $_GET['insert_nom_souscateg']);
	}

	if (isset($_GET['update_id_souscateg']) && isset($_GET['update_nom_souscateg'])) {
		$souscategorie->modifierSousCategorie($_GET['update_id_souscateg'], $_GET['update_nom_souscateg']);
	}

	if (isset($_GET['delete_id_souscateg'])) {
		$souscategorie->supprimerSousCategorie($_GET['delete_id_souscateg']);
	}
	
	if (isset($_GET['delete_auteur'])) {
		$auteur->supprimerAuteur($_GET['delete_auteur']);
	}
} else if (isset($_SESSION['mail'])) { // Si on est juste rédacteur
	if (isset($_GET['modifierAuteur'])) {
		tabModifierAuteur();
	}

	if (isset($_GET['update_auteur'])) {
		$auteur->modifierAuteur($_GET['update_auteur'], $_GET['update_password_auteur']);
	}
	
	if (isset($_GET['ajouterArticle'])) {
		ajouterArticle($dataCateg, $dataSousCateg, $dataArticle);
	}
	
	if (isset($_GET['insert_id_souscateg']) && isset($_GET['insert_id_article']) && isset($_GET['insert_nom_article'])) {
		$date = date("Y-m-d"); 
		$id = $_SESSION['id'];
	
		$bool = true;
	
		// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur
		foreach($dataArticle as $atuple) {	
			if ($_GET['insert_nom_article'] == $atuple['nom_article']) {	
				$bool = false;
				// Si le nom de l'article est déjà prit, on redirige l'utilisateur vers l'ajout d'un autre page avec un message d'erreur			
				echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterArticle&erreurNomArticle');\");</script>\n";
			}
		}	
	
		if ($bool) {
			$article->ajouterArticle($_GET['insert_id_souscateg'], $_GET['insert_id_article'], $id, $date, $_GET['insert_nom_article']);
		}
	}
	
	if (isset($_GET['modifierArticle'])) {
		modifierArticle($dataArticle);
	}
	
	if (isset($_GET['supprimerArticle'])) {
		tabSupprimerArticle($dataArticle);
	}

	if (isset($_GET['delete_id_article']) && isset($_GET['delete_repertoire'])) {
		$dirname = "articles/".$_GET['delete_repertoire'];
		// On vérifie si le repertoire contenant l'article existe
		if (is_dir($dirname)) {
			$handle = opendir( "./$dirname" ); // On ouvre ce repertoire
			// On parcoure son contenu
			while (($filename = readdir($handle))) {
				// On supprime tous les fichiers sauf les fichiers spéciaux
				if ( $filename != '.' && $filename != '..' && $filename != 'index.php' ) {
					unlink("$dirname/$filename");
				}
			}
			rmdir($dirname); // Quand tous les fichiers sont supprimer, on supprime le repertoire
		}	
		
		$article->supprimerArticle($_GET['delete_id_article']);
	}
}

pied();
?>		


<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="style.css">
		<title>Le petit Scientifique</title>	
	</head>
	<body>
        <?php
            include('connect.php');
            include('categorieModel.php');
            include('sousCategorieModel.php');
            include('articleModel.php');
			
            include('vueMenu.php');
            include('vueGestionCateg.php');
            include('vueGestionSousCateg.php');
            //include('vueGestionArticle.php');
			
            include('header.php');

			$categorie = new Categorie;
			$souscategorie = new SousCategorie;
			$article = new Article;
			
			$data1 = $categorie->getCategories();
			$data2 = $souscategorie->getSousCategories();
			$data3 = $article->getArticles();
			
			menu($data1, $data2, $data3);
			
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
        ?>
		
		<section id="article">
<?php
			
			if (!isset($_SESSION['mail'])) {
				echo "Bonojur<br />\n";
			} 

			if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {
				echo "			Bonjour ".$_SESSION['mail']."\n";
				
				if (isset($_GET['ajouterCateg'])) {
					tabAjouteCateg($data1);
				}
				
				if (isset($_GET['modifierCateg'])) {
					tabModifierCateg($data1);
				}
				
				if (isset($_GET['supprimerCateg'])) {
					tabSupprimeCateg($data1, $data2);
				}
				
				if (isset($_GET['ajouterSousCateg'])) {
					tabAjouteSousCateg($data2, $data1);
				}
				
				if (isset($_GET['modifierSousCateg'])) {
					tabModifierSousCateg($data2);
				}
				
				if (isset($_GET['supprimerSousCateg'])) {
					tabSupprimeSousCateg($data2, $data3);
				}
			}
?>		
		</section>
	</body>
</html>

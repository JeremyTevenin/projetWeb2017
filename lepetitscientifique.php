<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="style.css">
	
	</head>
	<body>
        <?php
            include('connect.php');
            include('categorieModel.php');
            include('sousCategorieModel.php');
            include('affichage.php');
            include('header.php');
            include('menu.php');
			
			
			menu();
        ?>
		
		<section id="article">
<?php
			$categorie = new Categorie;
			$souscategorie = new SousCategorie;
			if (!isset($_SESSION['mail'])) {
				echo "Bonojur<br />";
				        
				$data1 = $categorie->getCategories();
				$data2 = $souscategorie->getSousCategories();
				
				tableauCategorie($data1, $data2);
				
				if (isset($_GET['delete'])) {
					$categorie->supprimerCategorie($_GET['delete']);
				}
				
			} else {
				echo "Bonjour ".$_SESSION['mail'];
			}
?>		
		</section>
	</body>
</html>

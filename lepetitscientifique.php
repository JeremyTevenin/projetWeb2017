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
				
			/*	$data = $categorie->getCategories();
				foreach($data as $tuple) {	
				
					$data2 = $souscategorie->getSousCategorie($tuple['id_categ']);
					foreach($data2 as $stuple) {	
						$data1[$tuple['id_categ']][] = $data2;

					}
				}*/
					
				$data1 = $categorie->getCategories();	
				$data2 = $souscategorie->getSousCategories();	
				
				/*Array ( [0] => Array ( [id_categ] => 1 [0] => 1 [nom_categ] => Retouche [1] => Retouche ) 
						[1] => Array ( [id_categ] => 2 [0] => 2 [nom_categ] => Test [1] => Test ) 
						[2] => Array ( [id_categ] => 3 [0] => 3 [nom_categ] => Transformation [1] => Transformation ) 
						[3] => Array ( [id_categ] => 4 [0] => 4 [nom_categ] => Cr�ation [1] => Cr�ation ) 
						[4] => Array ( [id_categ] => 5 [0] => 5 [nom_categ] => Collections �t� 2015 [1] => Collections �t� 2015 ) ) 
*/
				
				
			/*	$data[][] = array();
					
				for ($i = 0; $i < count($data); $i++) {
					for ($j = 0; $j < count($data); $j++) {
						print_r  ($data[$i]);
						$data[$i][$j] = $souscategorie->getSousCategorie($data[$i]);
					}
				}*/
					
				/*foreach($data1 as $tuple) {	
					$data2 = $souscategorie->getSousCategorie($tuple['id_categ']);
				}*/
				
				tableauCategorie($data1, $data2);	
				
			/*	$categories = mysql_query("SELECT * FROM categories");
				while ($categorie = mysql_fetch_object($categories)) {
					$data[$categorie->libelle] = array();
					$souscategories = mysql_query("SELECT * FROM souscategories WHERE idCategorie = '".$categorie->id."'");
					while ($souscategorie = mysql_fetch_object($souscategories)) {
						$data[$categorie->libelle][] = $souscategorie->libelle;
				}
				foreach($data as $cat => $souscats)  {
					echo '-'.$cat.'<br>';
					foreach($souscats as $souscat)  {
				
				}*/
				//$lignes2 = $souscategorie->getSousCategories();
				
				echo "<br /><br /><br />\n";
				echo "<br /><br /><br />\n";

				foreach($data1 as $tuple) {	
				echo "							".$tuple['id_categ']."\n";
				echo "							".$tuple['nom_categ']."<br />\n";
							

					foreach($data2 as $stuple) {	
						
						echo "					**		".$stuple['id_souscateg']."\n";
						echo "							".$stuple['nom_souscateg']."<br />\n";
					}
				}
					
				echo "<a href=\"lepetitscientifique.php?delete=2\"> Supprimer </a>\n";
				
				if (isset($_GET['delete'])) {
					$categorie->supprimerCategorie($_GET['delete']);
				}
				
			} else {
				echo "Bonjour ".$_SESSION['mail'];
				$categorie->getCategories();
			}
?>		
		</section>
	</body>
</html>

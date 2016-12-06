<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="style.css">
	</head>
	<body>
<?php

		include('connect.php');
		include('header.php');
		include('menu.php');

		// Vérifie si une session est en cours, sinon l'utilisateur est automatiquement redirigé vers la page d'accueil	
		if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {		
			// On affiche le menu
			menu();
			
			echo " 		<section class=\"enLigne\">\n";
			echo "			<h1>Ajouter une catégorie</h1>\n";
			echo " 			<section class=\"boite1\">\n";
																
			$requeteMenu = "SELECT * FROM categorie";	
					
			// Vérifie si on a envoyé le formulaire d'ajout d'un menu
			if (isset($_POST['insertValid'])) {									
				// On change les ' en \' pour que la requête interprête bien le nom de la catégorie
				$nomcateg = str_replace( "'", "\'", $_POST['nom_categ'] );
				$req = "INSERT INTO categorie (id_categ, nom_categ) VALUES( 	'".$_POST['id_categ'].   "',
																		'".$nomcateg.	"')";
				$dbmenu->exec($req);
				
				echo "<script> window.setTimeout(\"location=('ajouterCategorie.php');\",1000);</script>\n";
			}
			
			// On affiche toutes les catégories de la table MENU
			$res =  $dbmenu->query($requeteMenu);	
			
			echo "				<table>\n";
			
			$dernierId = 1;
			$bool = false;
			
			// Si il n'y a aucune catégorie, on n'affiche pas le tableau	
			if ( $res->rowCount() >= 1) {
				echo "					<tr>\n";	
				echo "						<th> ID CATEGORIE 	</th>\n";																	
				echo "						<th> NOM CATEGORIE	</th>\n";																		
				echo "					</tr>\n";	
				
				$bool = true;
					
				// Boucle listant toutes les catégories
				$lignes = $res->fetchAll();
				foreach($lignes as $tuple) {	
					echo "					<tr>\n";
					echo "						<td>\n";
					echo "							".$tuple['id_categ']."\n";
					echo "						</td>\n";
					echo "						<td>\n";
					echo "							".$tuple['nom_categ']."\n";
					echo "						</td>\n";	
					echo "					</tr>\n";
					
					if ($bool) {
						$dernierId = $tuple['id_categ'] + 1; 
					}
				}
			}
			
			$res->closeCursor();
				
			echo "				</table>\n";			
			echo " 			</section>\n";			
			echo "			<section class=\"boite2\">\n";
			echo "				<br>\n";								
			echo "				<form action=\"ajouterCategorie.php\" method=\"post\">\n";	
			echo "					<table>\n";
			echo "						<tr>\n";	
			echo "							<th>ID CATEGORIE</th>\n";																
			echo "							<th>NOM CATEGORIE</th>\n";																
			echo "						</tr>\n";
			echo "						<tr>\n";
			
			// Formulaire d'ajout d'un menu, l'utilisateur doit renseigner un id_menu unique et un nom_menu 
			echo "							<td> $dernierId <input type=\"hidden\" name=\"id_categ\" value=\"$dernierId\">	</td>\n";
			echo "							<td> <input class=\"saisie\" type=\"text\" name=\"nom_categ\" maxlength=\"25\" required=required>	</td>\n";
			echo "						</tr>\n";
			echo "					</table>\n";
			echo "					<br /><input class=\"bouton_valider\" name=\"insertValid\" value=\"\"  type=\"submit\">\n";
			echo "				</form>\n";
			echo " 			</section>\n";
			echo " 		</section>\n";
		} else {
			header( 'Location: lepetitscientifique.php' );
		}
?>
	</body>
</html>
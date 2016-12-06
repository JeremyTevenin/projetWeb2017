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
		if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1)  {	
			menu();
			
			echo " 		<section class=\"centre\">\n";
			echo "			<h1>Supprimer une catégorie</h1>\n";				
									
			$requeteCateg = "select * FROM categorie";	
			
			// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
			if (isset($_GET['delete'])) {
				$reqSupp = "DELETE FROM categorie WHERE id_categ=".$_GET['delete'];
				$dbmenu->exec($reqSupp);
				
				echo "<script> window.setTimeout(\"location=('supprimerCategorie.php');\",1000);</script>\n";
			}
			
			$categ = $dbmenu->query($requeteCateg);
			
			if ( $categ->rowCount() >= 1 ) {
				echo "			<p>Vous ne pouvez supprimer un menu que lorsque celui-ci ne possède aucun sous-menu.\n";
			}
			
			echo "			<table>\n";
			
			// Si il n'y a pas de catégorie, on n'affiche pas le tableau
			if ( $categ->rowCount() >= 1 ) {		
				echo "				<tr>\n";	
				echo "					<th> ID CATEGORIE 			</th>\n";	
				echo "					<th> NOM CATEGORIE			</th>\n";	
				echo "					<th> ID SOUS-CATEGORIE + NOM	</th>\n";																		
				echo "				</tr>\n";
			}
			
			$lignes = $categ->fetchAll();
			foreach($lignes as $tupleCateg) {
				$requeteSousCateg = "select * FROM souscategorie WHERE id_categ=".$tupleCateg['id_categ'];
				$souscateg = $dbmenu->query($requeteSousCateg);
			
				// Si il n'y a aucune sous-catégorie associé à cette catégorie, alors l'utilisateur peut alors le supprimer
				if ( $souscateg->rowCount() < 1 ) {
					echo "				<tr>\n";
					echo "					<td>\n";
					echo "						".$tupleCateg['id_categ']."\n";
					echo "					</td>\n";
					echo "					<td>\n";
					echo "						".$tupleCateg['nom_categ']."\n";
					echo "					</td>\n";
					echo "					<td>\n"; 
					echo "						<a href=\"supprimerCategorie.php?delete=".$tupleCateg['id_categ']."\"> Supprimer </a>\n";
					echo "					</td>\n";	
					echo "				</tr>\n";
				}
				
				$lignes = $souscateg->fetchAll();
				foreach($lignes as $tupleSousCateg) {
					if (count($souscateg)) {
						echo "				<tr>\n";
						echo "					<td>\n";
						echo "						".$tupleCateg['id_categ']."\n";
						echo "					</td>\n";
						echo "					<td>\n";
						echo "						".$tupleCateg['nom_categ']."\n";
						echo "					</td>\n";
					}						
					
					echo "					<td>\n";
					echo "						(".$tupleSousCateg['id_souscateg'].") ".$tupleSousCateg['nom_souscateg']."\n";		
					echo "					</td>\n";
					echo "				</tr>\n";
				
				}
				$souscateg->closeCursor();
			}
			
			$categ->closeCursor();
							
			echo "			</table>\n";				
			echo " 		</section>\n";
		} else {	
			header( 'Location: accueil.php' );
		}
?>
	</body>
</html>
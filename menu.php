<?php
// Fonction qui crée le menu déroulant grâce à des requêtes effectuées sur la base de données MENU
function menu2() {
	include('connect.php');
		
	$requeteCateg = "select * FROM categorie";	
	$resCateg = $dbmenu->query($requeteCateg);
	
	echo " 		<nav class=\"menu\">\n";
	echo " 			<ul>\n";
	
	$tupleCateg = $resCateg->fetchAll();
			
		// Boucle listant toutes les catégories de la base de données
		foreach($tupleCateg as $nomCateg) {
			echo " 				<li class=\"more\">\n";
			echo "					".$nomCateg['nom_categ']."\n";
			echo "					<ul class=\"sousmenu\">\n";
						
			$requeteSousCateg = "select * FROM souscategorie WHERE id_categ=".$nomCateg['id_categ'];
			$resSousCateg = $dbmenu->query($requeteSousCateg);	
				
			// Boucle listant toutes les sous-catégories d'une catégorie
			$tupleSousCateg = $resSousCateg->fetchAll();
		
			foreach($tupleSousCateg as $nomSousCateg) {
				echo "						<li>\n";
				echo "							".$nomSousCateg['nom_souscateg']."\n";			
				echo "							<ul class=\"page\">\n";
								
				$requeteArticle = "select * FROM article WHERE id_souscateg =".$nomSousCateg['id_souscateg'];
				$resArticle = $dbmenu->query($requeteArticle);
				
				$tupleArticle = $resArticle->fetchAll();
			
				// Boucle listant tous les articles d'une sous-catégorie
				foreach($tupleArticle as $nomArticle) {
					echo "								<li>\n";
					echo "									<form name=\"recup\" method=\"get\" action=\"".$nomArticle['url']."\">\n";
					echo "										<input type=\"hidden\" name=\"id_article\" value=\"".$nomArticle['id_article']."\" />\n";
					// Page accessible grâce à une redirection vers celle ci en cliquant
					echo "										<a href=\"".$nomArticle['repertoire']."/".$nomArticle['url']."\" onClick=\"recup.submit();\">".$nomArticle['nom_article']."</a>\n";
					echo "									</form>\n";
					echo "								</li>\n";	
				}
					
				echo "							</ul>\n";
				echo " 						</li>\n";
			}		
			
			echo " 					</ul>\n";
			echo " 				</li>\n";
		}
		$resCateg->closeCursor(); // fin du traitement de la requête
		
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {		
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";	
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterCateg.php\">Ajouter une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierCateg.php\">Modifier une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerCateg.php\">Supprimer une catégorie</a>\n";
		echo "						</li>\n";
		echo "					</ul>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les sous-catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterSousCateg.php\">Ajouter une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierSousCateg.php\">Modifier une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerSousCateg.php\">Supprimer une sous-categorie</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les auteurs\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterAuteur.php\">Ajouter un auteur</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierAuteur.php\">Modifier un auteur</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerAuteur.php\">Supprimer un auteur</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		
	} else if (isset($_SESSION['mail'])) {
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierAuteur.php\">Modifier son compte</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?ajouterArticle.php\">Ajouter un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierArticle.php\">Modifier un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\lepetitscientifique?supprimerArticle.php\">Supprimer un article</a>\n";
		echo "				</li>\n";
	} else {
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"accueil.php\">S'incrire/Se connecter</a>\n";
		echo "				</li>\n";
	}
	
	echo " 			</ul>\n";
	echo " 		</nav>\n";	
}
?>
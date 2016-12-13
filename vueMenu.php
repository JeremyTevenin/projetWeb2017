<?php
function menu($dataCateg, $dataSousCateg, $dataArticle) {
	echo " 		<nav class=\"menu\">\n";
	
	if (isset($_SESSION['mail'])) {
		echo "			Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom']."\n";
	}
	
	echo " 			<ul>\n";
	
	// Boucle listant toutes les catégories de la base de données
	foreach($dataCateg as $nomCateg) {
		echo " 				<li class=\"more\">\n";
		echo "					".$nomCateg['nom_categ']."\n";
		echo "					<ul class=\"sousmenu\">\n";
					
		foreach($dataSousCateg as $nomSousCateg) {
			if ($nomCateg['id_categ'] == $nomSousCateg['id_categ']) {	
				echo "						<li>\n";
				echo "							".$nomSousCateg['nom_souscateg']."\n";			
				echo "							<ul class=\"page\">\n";
									
				// Boucle listant tous les articles d'une sous-catégorie
				foreach($dataArticle as $nomArticle) {
					if ($nomSousCateg['id_souscateg'] == $nomArticle['id_souscateg']) {	
						echo "								<li>\n";
						echo "									<form name=\"recup\" method=\"get\" action=\"".$nomArticle['url']."\">\n";
						echo "										<input type=\"hidden\" name=\"id_article\" value=\"".$nomArticle['id_article']."\" />\n";
						// Page accessible grâce à une redirection vers celle ci en cliquant
						echo "										<a href=\"".$nomArticle['repertoire']."/".$nomArticle['url']."\" onClick=\"recup.submit();\">".$nomArticle['nom_article']."</a>\n";
						echo "									</form>\n";
						echo "								</li>\n";	
					}
				}
				echo "							</ul>\n";
				echo " 						</li>\n";
			}
		}		
		echo " 					</ul>\n";
		echo " 				</li>\n";
	}
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {		
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";	
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterCateg\">Ajouter une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierCateg\">Modifier une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerCateg\">Supprimer une catégorie</a>\n";
		echo "						</li>\n";
		echo "					</ul>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les sous-catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterSousCateg\">Ajouter une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierSousCateg\">Modifier une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerSousCateg\">Supprimer une sous-categorie</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?supprimerAuteur\"> Supprimer un auteur</a>\n";	
		echo "				</li>\n";
	} else if (isset($_SESSION['mail'])) {
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierAuteur\">Modifier son compte</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?ajouterArticle\">Ajouter un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierArticle\">Modifier un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\lepetitscientifique?supprimerArticle\">Supprimer un article</a>\n";
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
<?php
function menu($dataCateg, $dataSousCateg, $dataArticle) {
	echo " 		<div class=\"nav-side-menu\">\n";
	echo " 		<div class=\"brand\"> sCims </div>\n";
	echo "		<i class=\"fa fa-bars fa-2x toggle-btn\" data-toggle=\"collapse\" data-target=\"#menu-content\"></i>\n";
	
	if (isset($_SESSION['mail'])) {
		echo "			Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom']."\n";
	}
	
	echo "		<div class=\"menu-list\">\n";
	echo " 			<ul id=\"menu-content\" class=\"menu-content collapse out\">\n";
	
		echo " 				<li>\n";
		echo "					<a href=\"#\">\n";
		echo "					<i class=\"fa fa-dashboard fa-lg\"></i> Accueil\n";
		echo "					</a>\n";
		echo "				</li>\n";
	
	// Boucle listant toutes les catégories de la base de données
	foreach($dataCateg as $nomCateg) {
		echo " 				<li data-toggle=\"collapse\" data-target=\"#products\" class=\"collapsed\">\n";
		echo "					".$nomCateg['nom_categ']." <span class=\"arrow\"></span>\n";
		echo "				</li>\n";
		echo "				<ul class=\"sub-menu collapse\" id=\"products\">\n";
					
		// Boucle listant toutes les sous-catégories de la base de données
		foreach($dataSousCateg as $nomSousCateg) {
			if ($nomCateg['id_categ'] == $nomSousCateg['id_categ']) {	
				echo "						<li data-toggle=\"collapse\" data-target=\"#service\" class=\"collapsed\">\n";
				echo "						".$nomSousCateg['nom_souscateg']."\n";
				echo "						</li>\n";
				echo "						<ul class=\"sub-menu collapse\" id=\"service\">\n";
									
				// Boucle listant tous les articles d'une sous-catégorie
				foreach($dataArticle as $nomArticle) {
					if ($nomSousCateg['id_souscateg'] == $nomArticle['id_souscateg']) {	
						echo "								<li data-toggle=\"collapse\" data-target=\"#new\" class=\"collapsed \">\n";
						echo "									<form name=\"recup\" method=\"get\" action=\"".$nomArticle['url']."\">\n";
						echo "										<input type=\"hidden\" name=\"id_article\" value=\"".$nomArticle['id_article']."\" />\n";
						// Page accessible grâce à une redirection vers celle ci en cliquant
						echo "										<a href=\"".$nomArticle['repertoire']."/".$nomArticle['url']."\" onClick=\"recup.submit();\">".$nomArticle['nom_article']."</a>\n";
						echo "									</form>\n";
						echo "								</li>\n";	
					}
				}
				echo "							</ul>\n";
			}
		}		
		echo " 					</ul>\n";
	}
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {		
		echo " 				<li>\n";
		echo "					<a href=\"deconnexion.php\"><i class=\"fa fa-user fa-lg\"></i> Se déconnecter</a>\n";
		echo "				</li>\n";	
		echo " 				<li data-toggle=\"collapse\" data-target=\"#new\" class=\"collapsed\">\n";
		echo "					Gérer les catégories<span class=\"arrow\"></span>\n";
		echo " 					<ul class=\"sub-menu collapse\" id=\"new\">\n";
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
		echo " 				<li data-toggle=\"collapse\" data-target=\"#new1\" class=\"collapsed\">\n";
		echo "					Gérer les sous-catégories<span class=\"arrow\"></span>\n";
		echo " 					<ul class=\"sub-menu collapse\" id=\"new1\">\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterSousCateg\"></i>Ajouter une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierSousCateg\">Modifier une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerSousCateg\">Supprimer une sous-categorie</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		echo " 				<ul>\n";
		echo " 					<li>\n";
		echo "						<a href=\"lepetitscientifique?supprimerAuteur\">Supprimer un auteur</a>\n";	
		echo "					</li>\n";
		echo "				</ul>\n";
	} else if (isset($_SESSION['mail'])) {
		echo " 				<li>\n";
		echo "					<a href=\"deconnexion.php\"><i class=\"fa fa-user fa-lg\"></i>Se déconnecter</a>\n";
		echo "				</li>\n";
		echo " 				<li>\n";
		echo "					<a href=\"lepetitscientifique?modifierAuteur\"><i class=\"fa fa-user fa-lg\"></i>Modifier son compte</a>\n";
		echo "				</li>\n";
		echo " 				<li>\n";
		echo "					<a href=\"lepetitscientifique?ajouterArticle\"><i class=\"fa fa-user fa-lg\"></i>Ajouter un article</a>\n";
		echo "				</li>\n";
		echo " 				<li>\n";
		echo "					<a href=\"lepetitscientifique?modifierArticle\"><i class=\"fa fa-user fa-lg\"></i>Modifier un article</a>\n";
		echo "				</li>\n";
		echo " 				<li>\n";
		echo "					<a href=\lepetitscientifique?supprimerArticle\"><i class=\"fa fa-user fa-lg\"></i>Supprimer un article</a>\n";
		echo "				</li>\n";
	} else {
		echo " 				<li>\n";
		echo "					<a href=\"accueil.php\"><i class=\"fa fa-user fa-lg\"></i>S'incrire/Se connecter</a>\n";
		echo "				</li>\n";
	}
	
	echo " 			</ul>\n";
	echo " 		</div>\n";	
	echo " 		</div>\n";	
}
?>

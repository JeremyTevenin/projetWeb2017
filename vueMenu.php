<?php
function menu($dataCateg, $dataSousCateg, $dataArticle) {
	echo " 		<div class=\"nav-side-menu\">\n";
	echo "		<i class=\"fa fa-bars fa-2x toggle-btn\" data-toggle=\"collapse\" data-target=\"#menu-content\"></i>\n";
	
	echo "		<div class=\"menu-list\">\n";
	echo " 			<ul id=\"menu-content\" class=\"menu-content collapse out\">\n";
			echo " 				<li class=\"brand\">\n";
						if (isset($_SESSION['mail'])) {
							echo "			Bonjour ".$_SESSION['prenom']." ".$_SESSION['nom']."\n";
							echo "<a href=\"deconnexion.php\"><img width=\"25px\" height=\"25px\" src=\"images/dec.png\"/></a>\n";
						}
								echo " 				</li>\n";
		echo " 				<li>\n";
		echo "					<a class=\"block\" href=\"lepetitscientifique.php\">\n";
		echo "					<i class=\"fa fa-dashboard fa-lg\"></i> Accueil\n";
		echo "					</a>\n";
		echo "				</li>\n";
	
	// Boucle listant toutes les catégories de la base de données
	$cpt = 0;
	$cpt1 = 0;
	$cpt2 = 0;
	foreach($dataCateg as $nomCateg) {
		$cpt = $cpt+1;
		echo " 				<li data-toggle=\"collapse\" data-target=\"#categ".$cpt."\" class=\"collapsed\">\n";
		echo "					".$nomCateg['nom_categ']." <span class=\"arrow\"></span>\n";
		echo " 				</li>\n";
		echo "					<ul class=\"sub-menu collapse\" id=\"categ".$cpt."\">\n";

					
		// Boucle listant toutes les sous-catégories de la base de données
		foreach($dataSousCateg as $nomSousCateg) {
			$cpt1 = $cpt1+1;
			if ($nomCateg['id_categ'] == $nomSousCateg['id_categ']) {	
				echo "						<li data-toggle=\"collapse\" data-target=\"#souscateg".$cpt1."\" class=\"collapsed\">\n";
				echo "						".$nomSousCateg['nom_souscateg']."\n";
				echo "						</li>\n";
				echo "							<ul class=\"sub-sub-menu collapse\" id=\"souscateg".$cpt1."\">\n";
								
				// Boucle listant tous les articles d'une sous-catégorie
				foreach($dataArticle as $nomArticle) {
				$cpt2 = $cpt2+1;
					if ($nomSousCateg['id_souscateg'] == $nomArticle['id_souscateg']) {	
						echo "						<li data-toggle=\"collapse\" data-target=\"#article".$cpt2."\" class=\"collapsed \">\n";
						// Page accessible grâce à une redirection vers celle ci en cliquant
						echo "							<a class=\"block\" href=\"lepetitscientifique?url=".$nomArticle['repertoire']."/".$nomArticle['url']."\" onClick=\"recup.submit();\">".$nomArticle['nom_article']."</a>\n";
						echo "						</li>\n";	
					}
				}
				echo "							</ul>\n";
			}
		}	
		echo " 					</ul>\n";
		
	}
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {		
		echo " 				<li data-toggle=\"collapse\" data-target=\"#new\" class=\"collapsed \">\n";
		echo "					Gérer les catégories<span class=\"arrow\"></span>\n";
		echo " 					<ul class=\"sub-menu collapse\" id=\"new\">\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?ajouterCateg\">Ajouter une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?modifierCateg\">Modifier une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?supprimerCateg\">Supprimer une catégorie</a>\n";
		echo "						</li>\n";
		echo "					</ul>\n";
		echo "				</li>\n";
		echo " 				<li data-toggle=\"collapse\" data-target=\"#new1\" class=\"collapsed \">\n";
		echo "					Gérer les sous-catégories<span class=\"arrow\"></span>\n";
		echo " 					<ul class=\"sub-menu collapse\" id=\"new1\">\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?ajouterSousCateg\"></i>Ajouter une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?modifierSousCateg\">Modifier une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?supprimerSousCateg\">Supprimer une sous-categorie</a>\n";
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
		echo "					<a class=\"block\" href=\"lepetitscientifique?modifierAuteur\"><i class=\"fa fa-user fa-lg\"></i>Modifier son compte</a>\n";
		echo "				</li>\n";
		echo " 				<li data-toggle=\"collapse\" data-target=\"#new2\" class=\"collapsed \">\n";
		echo "					Gérer les articles<span class=\"arrow\"></span>\n";
		echo " 					<ul class=\"sub-menu collapse\" id=\"new2\">\n";		
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?ajouterArticle\">Ajouter un article</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?modifierArticle\"></i>Modifier un article</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a class=\"block\" href=\"lepetitscientifique?supprimerArticle\"></i>Supprimer un article</a>\n";
		echo "						</li>\n";
		echo "					</ul>\n";
		echo "				</li>\n";
	} else {
		echo " 				<li>\n";
		echo "					<a class=\"block\" href=\"accueil?inscription\"><i class=\"fa fa-user fa-lg\"></i>S'incrire</a>\n";
		echo "				</li>\n";
		echo " 				<li>\n";
		echo "					<a class=\"block\" href=\"accueil?connexion\"><i class=\"fa fa-user fa-lg\"></i>Se connecter</a>\n";
		echo "				</li>\n";
	}
	
	echo " 			</ul>\n";
	echo " 		</div>\n";	
	echo " 		</div>\n";	
}
?>

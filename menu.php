<?php
// Fonction qui crée le menu déroulant grâce à des requêtes effectuées sur la base de données MENU
function menu() {
	include('connect.php');
		
	$requeteMenu = "select * FROM MENU";	
	$resMenu = $dbmenu->query($requeteMenu);
	
	echo " 		<nav class=\"menu\">\n";
	echo " 			<ul>\n";
	
	$tupleMenu = $resMenu->fetchAll();
	
	// Compteurs pour afficher les barres
	$cptPage = 0;
			
	// Compteurs pour afficher les barres
		$cptPage = 0;
		$cptSousMenu = 0;
				
		// Boucle listant tout les menus de la base de données
		foreach($tupleMenu as $nomMenu) {
			echo " 				<li class=\"more\">\n";
			echo "					".$nomMenu['nom_menu']."\n";
			echo "					<ul class=\"sousmenu\">\n";
						
			$requeteSousMenu = "select * FROM SOUSMENU WHERE id_menu=".$nomMenu['id_menu'];
			$resSousMenu = $dbmenu->query($requeteSousMenu);	
				
			// Boucle listant tout les sous-menus d'un menu
			$tupleSousMenu = $resSousMenu->fetchAll();
		
			foreach($tupleSousMenu as $nomSousMenu) {
				echo "						<li>\n";
				echo "							".$nomSousMenu['nom_sousmenu']."\n";			
				echo "							<ul class=\"page\">\n";
								
				$requetePage = "select * FROM PAGE WHERE id_sousmenu =".$nomSousMenu['id_sousmenu'];
				$resPage = $dbmenu->query($requetePage);
				
				$tuplePage = $resPage->fetchAll();
			
				// Boucle listant toute les pages d'un sous-menu
				foreach($tuplePage as $nomPage) {
					echo "								<li>\n";
					echo "									<form name=\"recup\" method=\"get\" action=\"".$nomPage['url']."\">\n";
					echo "										<input type=\"hidden\" name=\"id_page\" value=\"".$nomPage['id_page']."\" />\n";
					// Page accessible grâce à une redirection vers celle ci en cliquant
					echo "										<a href=\"".$nomPage['repertoire']."/".$nomPage['url']."\" onClick=\"recup.submit();\">".$nomPage['nom_page']."</a>\n";
					echo "									</form>\n";
					echo "								</li>\n";	
					
					$cptPage = $cptPage + 1; 
				}
					
				echo "							</ul>\n";
				echo " 						</li>\n";
				
				$cptPage = 0;
				$cptSousMenu = $cptSousMenu + 1; 
			}		
			
			echo " 					</ul>\n";
			echo " 				</li>\n";
			
			$cptSousMenu = 0;
		}
		$resMenu->closeCursor(); // fin du traitement de la requête
		
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail'])) {			
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"ajouterMenu.php\">Ajouter un menu</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"modifierMenu.php\">Modifier un menu</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"supprimerMenu.php\">Supprimer un menu</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"ajouterArticle.php\">Ajouter un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"modifierArticle.php\">Modifier un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\supprimerArticle.php\">Supprimer un article</a>\n";
		echo "				</li>\n";
	} else {
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"accueil.php\">S'incrire/Se connecter</a>\n";
		echo "				</li>\n";
	}
	
	echo " 			</ul>\n";
	echo " 		</nav>\n";	
}
?>
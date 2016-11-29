// Fonction qui crée le menu déroulant grâce à des requêtes effectuées sur la base de données MENU
	function menu()
	{
		// Connexion à la base de données
		try {
			$dsn = "mysql:host=localhost;dbname=menu";
			$menu = new PDO($dsn, "root", "");
		}
		catch(PDOException $e) {
			exit( 'Erreur lors de la connexion à la base de données');
		}
	
		$requeteMenu = "select * FROM MENU";	
		$resMenu = $menu->query($requeteMenu);
		
		echo " 			<ul class=\"menu\">\n";
		
		$tupleMenu = $resMenu->fetchAll();
		
		// Compteurs pour afficher les barres
		$cptPage = 0;
		$cptSousMenu = 0;
				
		// Boucle listant tout les menus de la base de données
		foreach($tupleMenu as $nomMenu) {
			echo " 				<li class=\"titreMenu\">\n";
			echo "					".$nomMenu['nom_menu']."\n";
			echo "					<ul class=\"sousmenu\">\n";
						
			$requeteSousMenu = "select * FROM SOUSMENU WHERE id_menu=".$nomMenu['id_menu'];
			$resSousMenu = $menu->query($requeteSousMenu);	
				
			// Boucle listant tout les sous-menus d'un menu
			$tupleSousMenu = $resSousMenu->fetchAll();
		
			foreach($tupleSousMenu as $nomSousMenu) {
				echo "						<li>\n";
				echo "							".$nomSousMenu['nom_sousmenu']."\n";			
				echo "							<ul class=\"page\">\n";
								
				$requetePage = "select * FROM PAGE WHERE id_sousmenu =".$nomSousMenu['id_sousmenu'];
				$resPage = $menu->query($requetePage);
				
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
		if ( isset($_SESSION['nom_utilisateur']) ) {		
			$droitAcces = $_SESSION['admin'];
			if ( $droitAcces == 1 ) {
				echo " 				<li class=\"titreMenu\">\n";
				echo "					<a href=\"menuModif.php\">Modifier le site</a>\n";
				echo "				</li>\n";
			}
		}
		
		echo " 			</ul>\n";
	}
<?php
	include "fonctionAux.php";

	entete();
	contenu();
	pied();
	
	function contenu()
	{	
		// Vérifie si une session est en cours, sinon l'utilisateur est automatiquement redirigé vers la page d'accueil
		if ( isset($_SESSION['nom_utilisateur']) ) 
		{	
			// Vérifie si la session actuelle est autorisé à accéder à cette fonctionnalité, sinon on la redirige vers la page d'accueil					
			$droitAcces = $_SESSION['admin']; 
			if ( $droitAcces == 1 ) {	
				echo " 		<nav>\n";
								menu();
				echo " 		</nav>\n";
				echo " 		<section class=\"enLigne\">\n";
				echo "			<h1>Ajouter un sous menu</h1>\n";	
				echo "			<section class=\"boite1\">\n";	
				
				// Connexion à la base de données
				try {
					$dsn = "mysql:host=localhost;dbname=menu";
					$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				catch(PDOException $e) {
					exit( 'Erreur lors de la connexion à la base de données');
				}
				
				// Vérifie si on a envoyé le formulaire d'ajout d'un sous-menu 
				if ( isset($_POST['insertValid']) ) {	
					// On change les ' en \' pour que la requête interprête bien le nom 
					$nomsousmenu = str_replace( "'", "\'", $_POST['nom_sousmenu'] );
				
					$req = "INSERT INTO SOUSMENU (id_menu, nom_sousmenu) VALUES( '".$_POST['id_menu']. "', '".$nomsousmenu."')";
					$connexion->exec($req);
									
					echo "<script> window.setTimeout(\"location=('ajouterSousMenu.php');\",1000);</script>\n";
				}
				
				echo "				<table>\n";
						
				// On affiche tous les sous-menus existant avant d'afficher le formulaire d'ajout d'un sous-menu 
				$requeteMenu = "select * FROM MENU";
				$menu = $connexion->query($requeteMenu);
				
				// Si il n'y a aucun menu, on n'affiche un message
				if ( $menu->rowCount() > 0 ) {
					echo "					<tr>\n";	
					echo "						<th> ID MENU + NOM	</th>\n";	
					echo "						<th> ID SOUS-MENU	</th>\n";																		
					echo "						<th> NOM SOUS-MENU	</th>\n";																		
					echo "					</tr>\n";
				}
				else {
					echo "					Vous ne pouvez pas ajouter un sous-menu tant qu'il n'y a pas de menu\n";	
				}
				
				// Boucle listant tous les menus
				$lignes = $menu->fetchAll();
				foreach($lignes as $tupleMenu) {	
					
					$requeteSousMenu = "SELECT * FROM SOUSMENU WHERE id_menu=".$tupleMenu['id_menu'];
					$sousmenu = $connexion->query($requeteSousMenu);
									
					// On affiche le nom du menu s'il n'a pas de sous-menu				
					if ( $sousmenu->rowCount() == 0 ) {
						echo "					<tr>\n";
						echo "						<td>\n";
						echo "							(".$tupleMenu['id_menu'].") ".$tupleMenu['nom_menu']."\n";
						echo "						</td>\n";
					}
										
					// Boucle listant tous les sous-menus
					$lignes = $sousmenu->fetchAll();
					foreach($lignes as $tupleSousMenu) {					
						echo "					<tr>\n";
						echo "						<td>\n";
						echo "							(".$tupleMenu['id_menu'].") ".$tupleMenu['nom_menu']."\n";
						echo "						</td>\n";
						
						if ($sousmenu->rowCount() > 0) {
							echo "						<td>\n";
							echo "							".$tupleSousMenu['id_sousmenu']."\n";
							echo "						</td>\n";
							echo "						<td>\n";
							echo "							".$tupleSousMenu['nom_sousmenu']."\n";
							echo "						</td>\n";
						}
					
						echo "					</tr>\n";
					}
					
					// Si le dernier menu n'a pas de sous-menu, il faut fermer la ligne
					if ( $sousmenu->rowCount() == 0 ) {
						echo "						<td colspan=2>\n";
						echo "							aucun sous menu associé\n";
						echo "						</td>\n";
						echo "					</tr>\n";
					}					
				}
			
				echo "				</table>\n";				
				echo "			</section>\n";				
				echo "			<section class=\"boite2\">\n";				
				
				// Tableau permettant de saisir les champs
				echo "				<form action=\"ajouterSousMenu.php\" method=\"post\">\n";		
				echo "					<table>\n";
				echo "						<tr>\n";	
				echo "							<th> ID MENU		</th>\n";	
				echo "							<th> NOM SOUS-MENU	</th>\n";																
				echo "						</tr>\n";
				echo "						<tr>\n";
				
				$nb = $tupleMenu['id_menu'];
				
				// Formulaire d'ajout d'un sous-menu, l'utilisateur doit renseigner un id_menu existant, un id_sousmenu unique et un nom_sousmenu
				echo "							<td> <input class=\"saisie\" type=\"number\" min=\"1\" max=\"$nb\" name=\"id_menu\"  required=required> 	</td>\n";
				echo "							<td> <input class=\"saisie\" type=\"text\" name=\"nom_sousmenu\" maxlength=\"50\" 	required=required>	</td>\n";
				echo "						</tr>\n";
				echo "					</table>\n";
				echo "					<br /><input class=\"bouton_valider\" name=\"insertValid\" value=\"\"  type=\"submit\">\n";
				echo "				</form>\n";	
				echo " 			</section>\n";
				echo " 		</section>\n";
			}
			else {
				header( 'Location: accueil.php' );
			}
		}
		else {
			header( 'Location: accueil.php' );
		}
	}
?>
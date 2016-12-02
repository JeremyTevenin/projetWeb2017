<?php
	include "fonctionAux.php";

	enteteAdmin();
	contenu();
	piedAdmin();
	
	function contenu() {	
		// Vérifie si une session est en cours, sinon le client est automatiquement redirigé vers la page d'accueil
		if (isset($_SESSION['mail'])) {		
			// Vérifie si la session actuelle est autorisée à accéder à cette fonctionnalité, sinon on la redirige vers la page d'accueil							
			if ($_SESSION['mail'] == "admin") {	
				echo " 		<section class=\"centre\">\n"; 
				echo "			<h1>Supprimer un hôtel</h1>\n";
				echo " 			<div class=\"boite1\">\n";
																	
				$requeteHotel = "select * FROM HOTEL";	
				
				// Connexion à la base de données
				try {
					$dsn = "mysql:host=localhost;dbname=projetweb";
					$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				} catch(PDOException $e) {
					exit( 'Erreur lors de la connexion à la base de données');
				}
				
				// On vérifie si l'admin a cliqué sur un bouton pour supprimer un hôtel et on le supprime
				if (isset($_GET['delete'])) {
					$reqSupp = "DELETE FROM HOTEL WHERE Identifiant=".$_GET['delete'];
					$connexion->exec($reqSupp);
					
					echo "<script> window.setTimeout(\"location=('supprimerHotel.php');\",500);</script>\n";
				}
				
				$hotel = $connexion->query($requeteHotel);
				
				if ($hotel->rowCount() >= 1) {
					echo "				<p>Vous ne pouvez supprimer un hôtel que lorsque celui-ci ne possède aucune chambre !\n";
				}
				
				echo "				<table>\n";
				
				// Si il n'y a pas d'hôtel, on n'affiche pas le tableau
				if ($hotel->rowCount() >= 1) {		
					echo "					<tr>\n";	
					echo "						<th> ID	HOTEL	    </th>\n";	
					echo "						<th> NOM			</th>\n";	
					echo "						<th> ADRESSE		</th>\n";	
					echo "						<th> VILLE	     	</th>\n";	
					echo "						<th> NUMERO CHAMBRE	</th>\n";																		
					echo "					</tr>\n";
				}
				
				$lignes = $hotel->fetchAll();
				foreach($lignes as $tupleHotel) {
					$requeteChambre = "select * FROM CHAMBRE WHERE Id_Hotel=".$tupleHotel['Identifiant'];
					$chambre = $connexion->query($requeteChambre);
				
					// Si il n'y a aucune chambre associé à cet hôtel, alors l'admin peut alors le supprimer
					if ($chambre->rowCount() < 1) {
						echo "					<tr>\n";
						echo "						<td>\n";
						echo "							".$tupleHotel['Identifiant']."\n";
						echo "						</td>\n";
						echo "						<td>\n";
						echo "							".$tupleHotel['Nom']."\n";
						echo "						</td>\n";
						echo "						<td>\n";
						echo "							".$tupleHotel['Adresse']."\n";
						echo "						</td>\n";
						echo "						<td>\n";
						echo "							".$tupleHotel['Ville']."\n";
						echo "						</td>\n";
						echo "						<td>\n"; 
						echo "							<a href=\"supprimerHotel.php?delete=".$tupleHotel['Identifiant']."\"> Supprimer </a>\n";
						echo "						</td>\n";	
						echo "					</tr>\n";
					}
					
					$lignes = $chambre->fetchAll();
					foreach($lignes as $tupleChambre) {
						if (count($chambre)) {
							echo "					<tr>\n";
							echo "						<td>\n";
							echo "							".$tupleHotel['Identifiant']."\n";
							echo "						</td>\n";
							echo "						<td>\n";
							echo "							".$tupleHotel['Nom']."\n";
							echo "						</td>\n";
							echo "						<td>\n";
							echo "							".$tupleHotel['Adresse']."\n";
							echo "						</td>\n";
							echo "						<td>\n";
							echo "							".$tupleHotel['Ville']."\n";
							echo "						</td>\n";
						}							
						
						echo "						<td>\n";
						echo "							(".$tupleChambre['Numero'].")\n";		
						echo "						</td>\n";
						echo "					</tr>\n";
					
					}
					$chambre->closeCursor();
				}
				
				$hotel->closeCursor();
								
				echo "				</table>\n";				
				echo " 			</div>\n";
				echo " 		</section>\n";
				
				menu();
			} else {	
				header('Location: accueilConnex.php');
			}
		} else {
			header('Location: accueil.php');
		}
	}
?>
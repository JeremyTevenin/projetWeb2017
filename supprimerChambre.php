<?php
	include "fonctionAux.php";

	enteteAdmin();
	contenu();
	piedAdmin();
	
	function contenu() {	
		// Vérifie si une session est en cours, sinon le client est automatiquement redirigé vers la page d'accueil
		if (isset($_SESSION['mail'])) {	
			// Vérifie si la session actuelle est autorisé à accéder à cette fonctionnalité, sinon on la redirige vers la page d'accueil					
			if ($_SESSION['mail'] == "admin") {	
				echo " 		<section class=\"centre\">\n";
				echo "			<h1>Supprimer une chambre</h1>\n";	
				
				$requeteHotel = "select * FROM HOTEL";	
				
				// Connexion à la base de données
				try {
					$dsn = "mysql:host=localhost;dbname=projetweb";
					$connexion = new PDO($dsn, "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				} catch(PDOException $e) {
					exit( 'Erreur lors de la connexion à la base de données');
				}
				
				if (isset($_GET['delete'])) {
					$reqSupp = "DELETE FROM CHAMBRE WHERE Numero=".$_GET['delete'];
					$connexion->exec($reqSupp);
					
					echo "<script> window.setTimeout(\"location=('supprimerChambre.php');\",500);</script>\n";
				}
				
				$hotel = $connexion->query($requeteHotel);
				
				if ($hotel->rowCount() > 0) {
					echo "			<p> Vous ne pouvez supprimer une chambre que lorsque celui-ci ne contient aucune réservation\n";
				}
				
				echo "					<table>\n";
				
				if ($hotel->rowCount() > 0) {
					echo "			<tr>\n";	
					echo "				<th> ID HOTEL + NOM	</th>\n";	
					echo "				<th> NUMERO CHAMBRE </th>\n";									
					echo "				<th> ID RESERVATION </th>\n";									
					echo "			</tr>\n";
				}
				
				$lignes = $hotel->fetchAll();
				foreach($lignes as $tupleHotel) {	
					$requeteChambre = "select * FROM CHAMBRE WHERE Id_Hotel=".$tupleHotel['Identifiant'];
					$chambre = $connexion->query($requeteChambre);
					
					$lignes = $chambre->fetchAll();
					foreach($lignes as $tupleChambre) {
							
						if ($chambre->rowCount() >= 1) {
							echo "			<tr>\n";
							echo "				<td>\n";
							echo "					(".$tupleHotel['Identifiant'].") ".$tupleHotel['Nom']."\n";
							echo "				</td>\n";
						}
						
						echo "				<td>\n";
						echo "					(".$tupleChambre['Numero'].")\n";		
						echo "				</td>\n";
											
						$requeteReservation = "select * FROM RESERVATION WHERE Id_Chambre =".$tupleChambre['Numero'];
						$reservation = $connexion->query($requeteReservation);
							
						if ($reservation->rowCount() == 0) {
							echo "				<td>\n"; 
							echo "					<a href=\"supprimerChambre.php?delete=".$tupleChambre['Numero']."\"> Supprimer </a>\n";
							echo "				</td>\n";	
							echo "			</tr>\n";
						}
							
						$cptPage = 1;	
						$lignes = $reservation->fetchAll();
						foreach($lignes as $tupleReservation) {
							echo "				<td>\n";
							echo "					".$tupleReservation['Numero']."\n";
							echo "				</td>\n";
																						
							if ($cptPage < $reservation->rowCount()) {								
								echo "			</tr>\n";
								echo "			<tr>\n";
								echo "				<td>\n";
								echo "					(".$tupleHotel['Identifiant'].") ".$tupleHotel['Nom']."\n";
								echo "				</td>\n";
								echo "				<td>\n";
								echo "					(".$tupleChambre['Numero'].")\n";		
								echo "				</td>\n";
								$cptPage ++;
							}			
						}	
					}					
				}
				
				echo "			</table>\n";				
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
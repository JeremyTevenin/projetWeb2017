<?php
function tabSupprimeAuteur($data) {
	echo " 			<section class=\"centre\">\n";
	echo "				<h1>Supprimer un auteur</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_auteur'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerAuteur');\");</script>\n";
	}
	
	echo "				<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data) >= 1) {		
		echo "					<tr>\n";	
		echo "						<th> NOM	</th>\n";	
		echo "						<th> PRENOM	</th>\n";	
		echo "						<th> MAIL   </th>\n";																		
		echo "					</tr>\n";
	}
	
	foreach($data as $tuple) {	
		if ($tuple['mail'] != "admin@admin.fr") {
			echo "					<tr>\n";
			echo "						<td>\n";
			echo "							".$tuple['nom']."\n";
			echo "						</td>\n";
			echo "						<td>\n";
			echo "							".$tuple['prenom']."\n";
			echo "						</td>\n";
			echo "						<td>\n";
			echo "							".$tuple['mail']."\n";
			echo "						</td>\n";
			echo "						<td>\n"; 
			echo "							<a href=\"lepetitscientifique.php?supprimerAuteur&delete_auteur=".$tuple['id']."\"> Supprimer </a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		}
	}
	
	echo "				</table>\n";				
	echo " 			</section>\n";
}

function tabModifierAuteur() {
	echo " 		<section class=\"centre\">\n";
	echo "			<h1>Modifier son compte</h1>\n";	
	
	// Vérifie si on a envoyé le formulaire de modification d'un menu
	if (isset($_GET['update_auteur'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?modifierAuteur');\");</script>\n";
	}
	
	echo "			<table>\n";
	echo "				<tr>\n";	
	echo "					<th> NOM    </th>\n";																	
	echo "					<th> PRENOM </th>\n";																		
	echo "					<th> MAIL   </th>\n";																		
	echo "				</tr>\n";
	echo "				<tr>\n";
		
	// On vérifie si que l'utilisateur a remplit tous les champs et qu'il a envoyé le formulaire
	// Dans un menu, on ne peut changer que le nom de celui-ci
	echo "					<form action=\"lepetitscientifique.php\" method=\"get\">";		
	echo "						<input type=\"hidden\" name=\"modifierAuteur\">\n";
	echo "						<td>\n";
	echo "							".$_SESSION['nom']."\n";
	echo " 							<input type=\"hidden\" name=\"update_auteur\" value=\"".$_SESSION['id']."\">\n";
	echo "						</td>\n";
	echo "						<td>\n";
	echo "							".$_SESSION['prenom']."\n";
	echo "						</td>\n";
	echo "						<td>\n";
	echo " 							<input name=\"update_mail_auteur\" value=\"".$_SESSION['mail']."\" required=required  pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$\">\n";
	echo " 						</td>"; 
	echo "						<td>\n";
	echo "							<input value=\"Valider\" type=\"submit\">\n";
	echo " 						</td>\n";
	echo "					</form>";
	echo "				</tr>\n";				
	echo "			</table>\n";					
	echo " 		</section>\n";
}
?>
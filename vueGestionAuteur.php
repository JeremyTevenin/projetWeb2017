<?php
function tabSupprimeAuteur($data) {
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_auteur'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerAuteur');\");</script>\n";
	}
	
	echo "			<h4>Supprimer les rédacteurs</h4>\n";
	echo "			<div class=\"custyle\">\n";
	
	// Si il n'y a pas de d'auteur, on n'affiche pas le tableau
	if (count($data) >= 2) {		
		echo "				<table class=\"table table-striped custab\">\n";
		echo "					<thead>\n";	
		echo "						<tr>\n";	
		echo "							<th> NOM	   </th>\n";	
		echo "							<th> PRENOM	   </th>\n";	
		echo "							<th> MAIL      </th>\n";																		
		echo "							<th> SUPPRIMER </th>\n";																		
		echo "						</tr>\n";
		echo "					</thead>\n";
	} else {
		echo "				<p>Il n'y a aucun rédacteur inscrit.</p>\n";
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
			echo "							<a href=\"lepetitscientifique.php?supprimerAuteur&delete_auteur=".$tuple['id']."\"><img width=\"25\" height=\"25\" src=\"images/supp.png\" alt=\"supprimer\"/></a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		}
	}
	
	if (count($data) >= 2) {
		echo "				</table>\n";	
	}
	
	echo " 			</div>\n";
}

function tabModifierAuteur() {
	echo "			<h4>Modifier son mot de passe</h4>\n";
	echo "			<div class=\"custyle\">\n";
	
	// Vérifie si on a envoyé le formulaire de modification de mdp
	if (isset($_GET['update_auteur'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?modifierAuteur');\");</script>\n";
	}
	
	echo "				<p>Votre nouveau mot de passe ne doit pas contenir de caractères spéciaux,
							il doit  contenir 6 caractères et posséder au moins une majuscule et un chiffre </p>\n";
					
	echo "				<form action=\"lepetitscientifique.php\" method=\"get\">\n";		
	echo "					<table class=\"table table-striped custab\">\n";
	echo "						<thead>\n";	
	echo "							<tr>\n";	
	echo "								<th> NOM                  </th>\n";																	
	echo "								<th> PRENOM               </th>\n";																		
	echo "								<th> NOUVEAU MOT DE PASSE </th>\n";																		
	echo "								<th> MODIFIER </th>\n";																		
	echo "							</tr>\n";
	echo "						</thead>\n";
	echo "						<tr>\n";
		
	// On vérifie si l'utilisateur a remplit tous les champs et qu'il a envoyé le formulaire
	echo "							<td>\n";
	echo "							<input type=\"hidden\" name=\"modifierAuteur\">\n";
	echo "								".$_SESSION['nom']."\n";
	echo " 								<input type=\"hidden\" name=\"update_auteur\" value=\"".$_SESSION['id']."\">\n";
	echo "							</td>\n";
	echo "							<td>\n";
	echo "								".$_SESSION['prenom']."\n";
	echo "							</td>\n";
	echo "							<td>\n";
	echo " 								<input type=\"password\" name=\"update_password_auteur\" value=\"\" required=required  pattern=\"(?=^.{6,}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$\">\n";
	echo " 							</td>"; 
	echo "							<td>\n";
	echo "								<button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25\" height=\"25\" src=\"images/val.png\" alt=\"valider\"/></button>\n";
	echo " 							</td>\n";
	echo "						</tr>\n";				
	echo "					</table>\n";
	echo "				</form>\n";					
	echo " 			</div>\n";
}
?>

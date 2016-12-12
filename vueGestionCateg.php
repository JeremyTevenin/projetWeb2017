<?php
function tabAjouteCateg($data1) {
	echo " 			<section class=\"centre\">\n";
	echo "				<h1>Ajouter une catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_nom_categ'])) {	
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterCateg');\");</script>\n";
	}	
	
	echo "				<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "					<tr>\n";	
		echo "						<th> ID CATEGORIE 		</th>\n";	
		echo "						<th> NOM CATEGORIE		</th>\n";													
		echo "					</tr>\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "					<tr>\n";
		echo "						<td>\n";
		echo "							".$tuple['id_categ']."\n";
		echo "						</td>\n";
		echo "						<td>\n";
		echo "							".$tuple['nom_categ']."\n";
		echo "						</td>\n";
		echo "					</tr>\n";
		
		$dernierId = $tuple['id_categ'] + 1; 
	}
	
	echo "				</table>\n";			
	echo "					<form action=\"lepetitscientifique.php\" method=\"get\">\n";	
	echo "						<table>\n";
	echo "							<tr>\n";
	
	// Formulaire d'ajout d'un menu, l'utilisateur doit renseigner un id_menu unique et un nom_menu 
	echo "								<input type=\"hidden\" name=\"ajouterCateg\">\n";
	echo "								<td> $dernierId <input type=\"hidden\" name=\"insert_id_categ\" value=\"$dernierId\">	</td>\n";
	echo "								<td> <input class=\"saisie\" type=\"text\" name=\"insert_nom_categ\" required=required pattern=\"([-A-z0-9À-ž\s]){3,}\">	</td>\n";
	echo "							</tr>\n";
	echo "						</table>\n";
	echo "						<br /><input value=\"Valider\" type=\"submit\">\n";
	echo "					</form>\n";
	echo " 				</section>\n";
}

function tabModifierCateg($data1) {
	echo " 		<section class=\"centre\">\n";
	echo "			<h1>Modifier une catégorie</h1>\n";			
	echo "			<table>\n";
	echo "				<tr>\n";	
	echo "					<th> ID CATEGORIE  </th>\n";																	
	echo "					<th> NOM CATEGORIE </th>\n";																		
	echo "					<th>               </th>\n";																		
	echo "				</tr>\n";
						
	// Vérifie si on a envoyé le formulaire de modification d'un menu
	if (isset($_GET['update_id_categ']) && isset($_GET['update_nom_categ'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?modifierCateg');\");</script>\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "				<tr>\n";
		
		// On vérifie si que l'utilisateur a remplit tous les champs et qu'il a envoyé le formulaire
		// Dans un menu, on ne peut changer que le nom de celui-ci
		if (isset($_GET['update']) && $_GET['update'] == $tuple['id_categ']) {
			echo "					<form action=\"lepetitscientifique.php\" method=\"get\">";		
			echo "						<input type=\"hidden\" name=\"modifierCateg\">\n";
			echo "						<td>\n";
			echo "							".$tuple['id_categ']."\n";
			echo " 							<input type=\"hidden\" name=\"update_id_categ\" value=\"".$tuple['id_categ']."\">\n";
			echo "						</td>\n";
			echo "						<td>\n";
			echo " 							<input name=\"update_nom_categ\" value=\"".$tuple['nom_categ']."\" required=required pattern=\"([-A-z0-9À-ž\s]){3,}\">\n";
			echo " 						</td>"; 
			echo "						<td>\n";
			echo "							<input value=\"Valider\" type=\"submit\">\n";
			echo " 						</td>\n";
			echo "					</form>";
		} else {// Si l'utilisateur n'a pas cliqué sur un bouton modifier, on affiche les menus avec un bouton modifier
			echo "					<td>\n";
			echo "						".$tuple['id_categ']."\n";
			echo "					</td>\n";
			echo "					<td>\n";
			echo "						".$tuple['nom_categ']."\n";
			echo "					</td>\n";						
			echo " 					<td>\n";
			echo "						<a href=\"lepetitscientifique?modifierCateg&update=".$tuple['id_categ']."\"> modifier </a>\n";
			echo "					</td>\n";
		}
		
		echo "				</tr>\n";
	}	
				
	echo "			</table>\n";					
	echo " 		</section>\n";
}

function tabSupprimeCateg($data1, $data2) {
	echo " 			<section class=\"centre\">\n";
	echo "				<h1>Supprimer une catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_id_categ'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerCateg');\");</script>\n";
	}
	
	if (count($data1) >= 1 ) {
		echo "				<p>Vous ne pouvez supprimer une catégorie que lorsque celle-ci ne possède aucune sous-catégorie.\n";
	}
	
	echo "				<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "					<tr>\n";	
		echo "						<th> ID CATEGORIE 		</th>\n";	
		echo "						<th> NOM CATEGORIE		</th>\n";	
		echo "						<th> ID SOUS-CATEGORIE  </th>\n";																		
		echo "						<th> NOM SOUS-CATEGORIE	</th>\n";																		
		echo "						<th> </th>\n";																		
		echo "					</tr>\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "					<tr>\n";
		echo "						<td>\n";
		echo "							".$tuple['id_categ']."\n";
		echo "						</td>\n";
		echo "						<td>\n";
		echo "							".$tuple['nom_categ']."\n";
		echo "						</td>\n";
		
		$bool = false;
		foreach($data2 as $stuple) {		
			if ($tuple['id_categ'] == $stuple['id_categ']) {	
				if ($bool) {
					echo "						<td></td>\n";
					echo "						<td></td>\n";
				}

				echo "						<td>\n";
				echo "							".$stuple['id_souscateg']."\n";
				echo "						</td>\n";
				echo "						<td>\n";
				echo "							".$stuple['nom_souscateg']."\n";		
				echo "						</td>\n";
				echo "						<td></td>\n";
				echo "					</tr>\n";
				
				$bool = true;
			} 
		}

		if (!$bool) {	
			echo "						<td></td>\n";
			echo "						<td></td>\n";
			echo "						<td>\n"; 
			echo "							<a href=\"lepetitscientifique.php?supprimerCateg&delete_id_categ=".$tuple['id_categ']."\"> Supprimer </a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		} 
	}
	
	echo "				</table>\n";				
	echo " 			</section>\n";
}
?>
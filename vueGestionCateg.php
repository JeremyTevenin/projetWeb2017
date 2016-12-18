<?php
function tabAjouteCateg($data1) {
	echo "			<div class=\"custyle\">\n";
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['insert_id_categ']) && isset($_GET['insert_nom_categ'])) {	
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterCateg');\");</script>\n";
	}	
	
	echo "				<table class=\"table table-striped custab\">\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "				<thead>\n";	
		echo "					<tr>\n";	
		echo "						<th> ID CATEGORIE 		</th>\n";	
		echo "						<th> NOM CATEGORIE		</th>\n";													
		echo "						<th> AJOUTER		</th>\n";													
		echo "					</tr>\n";
		echo "				</thead>\n";
	}
	
	$dernierId = 0;
	
	foreach($data1 as $tuple) {	
		echo "					<tr>\n";
		echo "						<td>\n";
		echo "							".$tuple['id_categ']."\n";
		echo "						</td>\n";
		echo "						<td>\n";
		echo "							".$tuple['nom_categ']."\n";
		echo "						</td>\n";
		echo "						<td></td>\n";
		echo "					</tr>\n";
		
		$dernierId = $tuple['id_categ'] + 1; 
	}
	
	echo "					<form action=\"lepetitscientifique.php\" method=\"get\">\n";	
	echo "							<tr>\n";
	
	// Formulaire d'ajout d'un menu, l'utilisateur doit renseigner un id_menu unique et un nom_menu 
	echo "								<input type=\"hidden\" name=\"ajouterCateg\">\n";
	echo "								<td> $dernierId <input type=\"hidden\" name=\"insert_id_categ\" value=\"$dernierId\">	</td>\n";
	echo "								<td> <input class=\"saisie\" type=\"text\" name=\"insert_nom_categ\" required=required pattern=\"([-A-z0-9À-ž\s]){3,}\">	</td>\n";
	echo "								<td> <button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25px\" height=\"25px\" src=\"images/ajout.png\"/></button>	</td>\n";
	echo "							</tr>\n";
	echo "						</table>\n";
	echo "					</form>\n";
	echo " 				</div>\n";
}

function tabModifierCateg($data1) {
	echo "		<div class=\"custyle\">\n";
	echo "			<table class=\"table table-striped custab\">\n";
	echo "				<thead>\n";	
	echo "					<tr>\n";	
	echo "						<th> ID CATEGORIE  </th>\n";																	
	echo "						<th> NOM CATEGORIE </th>\n";																		
	echo "						<th> MODIFIER      </th>\n";																		
	echo "					</tr>\n";
	echo "				</thead>\n";
						
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
			echo "							<button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25px\" height=\"25px\" src=\"images/val.png\"/></button>\n";
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
			echo "						<a href=\"lepetitscientifique?modifierCateg&update=".$tuple['id_categ']."\"><img width=\"25px\" height=\"25px\" src=\"images/modif.png\"/></a>\n";
			echo "					</td>\n";
		}
		
		echo "				</tr>\n";
	}	
				
	echo "			</table>\n";					
	echo " 		</div>\n";
}

function tabSupprimeCateg($data1, $data2) {
	echo "		<div class=\"custyle\">\n";
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_id_categ'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerCateg');\");</script>\n";
	}
	
	if (count($data1) >= 1 ) {
		echo "				<p>Vous ne pouvez supprimer une catégorie que lorsque celle-ci ne possède aucune sous-catégorie.\n";
	}
	
	echo "			<table class=\"table table-striped custab\">\n";			
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "				<thead>\n";	
		echo "					<tr>\n";	
		echo "						<th> ID CATEGORIE 		</th>\n";	
		echo "						<th> NOM CATEGORIE		</th>\n";	
		echo "						<th> ID SOUS-CATEGORIE  </th>\n";																		
		echo "						<th> NOM SOUS-CATEGORIE	</th>\n";																		
		echo "						<th> SUPPRIMER			</th>\n";																		
		echo "					</tr>\n";
		echo "				</thead>\n";
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
			echo "							<a href=\"lepetitscientifique.php?supprimerCateg&delete_id_categ=".$tuple['id_categ']."\"><img width=\"25px\" height=\"25px\" src=\"images/supp.png\"/></a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		} 
	}
	
	echo "				</table>\n";				
	echo " 			</div>\n";
}
?>

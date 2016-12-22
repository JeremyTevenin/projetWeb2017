<?php
function tabAjouteSousCateg($data1, $nomCateg) {
	echo "			<h4>Ajouter une sous-catégorie</h4>\n";			
	echo "			<div class=\"custyle\">\n";			
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour ajouter une sous-catégorie
	if (isset($_GET['insert_id_souscateg']) && isset($_GET['insert_nom_souscateg'])) {	
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterSousCateg');\");</script>\n";
	}	
	
	// Si il n'y a pas de sous-catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "				<table class=\"table table-striped custab\">\n";
		echo "					<thead>\n";	
		echo "						<tr>\n";	
		echo "							<th> ID SOUS-CATEGORIE 	</th>\n";	
		echo "							<th> NOM SOUS-CATEGORIE	</th>\n";													
		echo "						</tr>\n";
		echo "					</thead>\n";
	}
	
	$dernierId = 0;
	
	foreach($data1 as $tuple) {	
		echo "					<tr>\n";
		echo "						<td>\n";
		echo "							".$tuple['id_souscateg']."\n";
		echo "						</td>\n";
		echo "						<td>\n";
		echo "							".$tuple['nom_souscateg']."\n";
		echo "						</td>\n";
		echo "					</tr>\n";
		
		$dernierId = $tuple['id_souscateg'] + 1; 
		$nb = $tuple['id_categ'];
	}
		
	echo "				</table>\n";			
	echo "				<form action=\"lepetitscientifique.php\" method=\"get\">\n";	
	echo "					<table class=\"table table-striped custab\">\n";
	echo "						<thead>\n";	
	echo "							<tr>\n";	
	echo "								<th> NOM CATEGORIE 	    </th>\n";	
	echo "								<th> ID SOUS-CATEGORIE 	</th>\n";	
	echo "								<th> NOM SOUS-CATEGORIE	</th>\n";													
	echo "								<th> AJOUTER			</th>\n";													
	echo "							</tr>\n";
	echo "						</thead>\n";
	echo "							<tr>\n";

	// Formulaire d'ajout d'une sous-catégorie, l'administrateur doit choisir une catégorie et renseigné un nom de sous-catégorie 
	echo "							<td>\n";
	echo "								<input type=\"hidden\" name=\"ajouterSousCateg\">\n";
	echo "								<select name=insert_id_categ>\n";
	
	foreach($nomCateg as $n) {		
		echo "									<option value=".$n['id_categ'].">".$n['nom_categ']."</option>\n";  
	}
	
	echo "								</select>\n";
	echo "							</td>\n";
	echo "							<td> $dernierId <input type=\"hidden\" name=\"insert_id_souscateg\" value=\"$dernierId\">	</td>\n";
	echo "							<td> <input type=\"text\" name=\"insert_nom_souscateg\" required=required pattern=\"([-A-zÀ-ž\s]){3,}\"></td>\n";
	echo "							<td> <button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25\" height=\"25\" src=\"images/ajout.png\" alt=\"ajouter\"/></button></td>\n";
	echo "						</tr>\n";
	
	if (count($data1) >= 1) {		
		echo "					</table>\n";
	}
	
	echo "				</form>\n";
	echo " 			</div>\n";
}

function tabModifierSousCateg($data1) {
	echo "			<h4>Modifier une sous-catégorie</h4>\n";			
	echo "			<div class=\"custyle\">\n";
	
	// Si il n'y a pas de sous-catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "				<form action=\"lepetitscientifique.php\" method=\"get\">\n";		
		echo "					<table class=\"table table-striped custab\">\n";
		echo "						<thead>\n";	
		echo "							<tr>\n";	
		echo "								<th> ID SOUS-CATEGORIE  </th>\n";																	
		echo "								<th> NOM SOUS-CATEGORIE </th>\n";																		
		echo "								<th> MODIFIER           </th>\n";																		
		echo "							</tr>\n";
		echo "						</thead>\n";
	} else {
		echo "				<p>Il n'y a aucune sous-catégrie à modifier</>\n";		
	}
						
	// Vérifie si on a envoyé le formulaire de modification d'une sous-catégorie
	if (isset($_GET['update_id_souscateg']) && isset($_GET['update_nom_souscateg'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?modifierSousCateg');\");</script>\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "						<tr>\n";
		
		// On vérifie si que l'utilisateur a remplit tous les champs et qu'il a envoyé le formulaire
		if (isset($_GET['update']) && $_GET['update'] == $tuple['id_souscateg']) {
			echo "								<td>\n";
			echo "								<input type=\"hidden\" name=\"modifierSousCateg\">\n";
			echo "									".$tuple['id_souscateg']."\n";
			echo " 									<input type=\"hidden\" name=\"update_id_souscateg\" value=\"".$tuple['id_souscateg']."\">\n";
			echo "								</td>\n";
			echo "								<td>\n";
			echo " 									<input name=\"update_nom_souscateg\" value=\"".$tuple['nom_souscateg']."\" required=required pattern=\"([-A-z0-9À-ž\s]){3,}\">\n";
			echo " 								</td>"; 
			echo "								<td>\n";
			echo "									<button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25\" height=\"25\" src=\"images/val.png\" alt=\"valider\"/></button>\n";
			echo " 								</td>\n";
		} else {// Si l'utilisateur n'a pas cliqué sur un bouton modifier
			echo "							<td>\n";
			echo "								".$tuple['id_souscateg']."\n";
			echo "							</td>\n";
			echo "							<td>\n";
			echo "								".$tuple['nom_souscateg']."\n";
			echo "							</td>\n";						
			echo " 							<td>\n";
			echo "								<a href=\"lepetitscientifique?modifierSousCateg&update=".$tuple['id_souscateg']."\"><img width=\"25\" height=\"25\" src=\"images/modif.png\" alt=\"modifier\"/></a>\n";
			echo "							</td>\n";
		}
		
		echo "						</tr>\n";
	}	
				
	if (count($data1) >= 1) {		
		echo "					</table>\n";	
		echo "				</form>\n";
	}
	
	echo " 			</div>\n";
}

function tabSupprimeSousCateg($data1, $data2) {
	echo "		<h4>Supprimer une sous-catégorie</h4>\n";			
	echo "		<div class=\"custyle\">\n";			
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_id_souscateg'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerSousCateg');\");</script>\n";
	}
	
	// Si il n'y a pas de sous-catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "			<p>Vous ne pouvez supprimer une sous-catégorie que lorsque celle-ci ne possède aucun article.\n";
		echo "			<table class=\"table table-striped custab\">\n";
		echo "				<thead>\n";	
		echo "					<tr>\n";	
		echo "						<th> ID SOUS-CATEGORIE 	</th>\n";	
		echo "						<th> NOM SOUS-CATEGORIE	</th>\n";	
		echo "						<th> ID ARTICLE         </th>\n";																		
		echo "						<th> NOM ARTICLE        </th>\n";																		
		echo "						<th> SUPPRIMER			</th>\n";																		
		echo "					</tr>\n";
		echo "				</thead>\n";
	} else {
		echo "				<p>Il n'y a aucune sous-catégorie à suppirmer\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "					<tr>\n";
		echo "						<td>\n";
		echo "							".$tuple['id_souscateg']."\n";
		echo "						</td>\n";
		echo "						<td>\n";
		echo "							".$tuple['nom_souscateg']."\n";
		echo "						</td>\n";
		
		$bool = false;
		foreach($data2 as $stuple) {		
			if ($tuple['id_souscateg'] == $stuple['id_souscateg']) {	
				if ($bool) {
					echo "						<td></td>\n";
					echo "						<td></td>\n";
				}

				echo "						<td>\n";
				echo "							".$stuple['id_article']."\n";
				echo "						</td>\n";
				echo "						<td>\n";
				echo "							".$stuple['nom_article']."\n";		
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
			echo "							<a href=\"lepetitscientifique.php?supprimerSousCateg&delete_id_souscateg=".$tuple['id_souscateg']."\"><img width=\"25\" height=\"25\" src=\"images/supp.png\" alt=\"supprimer\"/></a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		} 
	}
	
	if (count($data1) >= 1) {	
		echo "				</table>\n";
	}
	
	echo " 			</div>\n";
}
?>

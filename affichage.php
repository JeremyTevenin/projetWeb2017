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
	echo "								<td> <input class=\"saisie\" type=\"text\" name=\"insert_nom_categ\" required=required pattern=\"[\'\s-a-zA-Zéèàôöîïç]{2,25}\">	</td>\n";
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
			echo " 							<input name=\"update_nom_categ\" value=\"".$tuple['nom_categ']."\" required=required pattern=\"[\'\s-a-zA-Zéèàôöîïç]{2,25}\">\n";
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





function tabAjouteSousCateg($data1, $nomCateg) {
	echo " 			<section class=\"centre\">\n";
	echo "				<h1>Ajouter une sous-catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['insert_id_souscateg']) && isset($_GET['insert_nom_souscateg'])) {	
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterSousCateg');\");</script>\n";
	}	
	
	echo "				<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "					<tr>\n";	
		echo "						<th> ID SOUS-CATEGORIE 	</th>\n";	
		echo "						<th> NOM SOUS-CATEGORIE	</th>\n";													
		echo "					</tr>\n";
	}
	
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
	}
		
	echo "				</table>\n";			
	echo "					<form action=\"lepetitscientifique.php\" method=\"get\">\n";	
	echo "					<table>\n";
	echo "					<tr>\n";	
	echo "						<th> NOM CATEGORIE 	    </th>\n";	
	echo "						<th> ID SOUS-CATEGORIE 	</th>\n";	
	echo "						<th> NOM SOUS-CATEGORIE	</th>\n";													
	echo "					</tr>\n";
	echo "							<tr>\n";
	
	$nb = $tuple['id_categ'];
	
	// Formulaire d'ajout d'un menu, l'utilisateur doit renseigner un id_menu unique et un nom_menu 
	echo "								<input type=\"hidden\" name=\"ajouterSousCateg\">\n";
	echo "								<td>\n";
	
	echo "			<select name=insert_id_categ>\n";
	foreach($nomCateg as $n) {	
		echo "			<option value=".$n['id_categ'].">".$n['nom_categ']."</option>\n";  
	}
	
	echo "								</td>\n";
	
	//<input type=\"number\" min=\"1\" max=\"$nb\" name=\"insert_id_categ\" required=required> 	</td>\n";
	echo "								<td> $dernierId <input type=\"hidden\" name=\"insert_id_souscateg\" value=\"$dernierId\">	</td>\n";
	echo "								<td> <input type=\"text\" name=\"insert_nom_souscateg\" required=required pattern=\"[\'\s-a-zA-Zéèàôöîïç]{2,25}\"></td>\n";
	echo "							</tr>\n";
	echo "						</table>\n";
	echo "						<br /><input value=\"Valider\" type=\"submit\">\n";
	echo "					</form>\n";
	echo " 				</section>\n";
}

function tabModifierSousCateg($data1) {
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
			echo " 							<input name=\"update_nom_categ\" value=\"".$tuple['nom_categ']."\" required=required pattern=\"[\'\s-a-zA-Zéèàôöîïç]{2,25}\">\n";
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

function tabSupprimeSousCateg($data1, $data2) {
	echo " 			<section class=\"centre\">\n";
	echo "				<h1>Supprimer une sous-catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_id_souscateg'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerSousCateg');\");</script>\n";
	}
	
	if (count($data1) >= 1 ) {
		echo "				<p>Vous ne pouvez supprimer une sous-catégorie que lorsque celle-ci ne possède aucun article.\n";
	}
	
	echo "				<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "					<tr>\n";	
		echo "						<th> ID SOUS-CATEGORIE 	</th>\n";	
		echo "						<th> NOM SOUS-CATEGORIE	</th>\n";	
		echo "						<th> ID ARTICLE         </th>\n";																		
		echo "						<th> NOM ARTICLE        </th>\n";																		
		echo "						<th> </th>\n";																		
		echo "					</tr>\n";
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
			echo "							<a href=\"lepetitscientifique.php?supprimerSousCateg&delete_id_souscateg=".$tuple['id_souscateg']."\"> Supprimer </a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		} 
	}
	
	echo "				</table>\n";				
	echo " 			</section>\n";
}






function menu($dataCateg, $dataSousCateg, $dataArticle) {
	echo " 		<nav class=\"menu\">\n";
	echo " 			<ul>\n";
	
	// Boucle listant toutes les catégories de la base de données
	foreach($dataCateg as $nomCateg) {
		echo " 				<li class=\"more\">\n";
		echo "					".$nomCateg['nom_categ']."\n";
		echo "					<ul class=\"sousmenu\">\n";
					
		foreach($dataSousCateg as $nomSousCateg) {
			if ($nomCateg['id_categ'] == $nomSousCateg['id_categ']) {	
				echo "						<li>\n";
				echo "							".$nomSousCateg['nom_souscateg']."\n";			
				echo "							<ul class=\"page\">\n";
									
				// Boucle listant tous les articles d'une sous-catégorie
				foreach($dataArticle as $nomArticle) {
					if ($nomSousCateg['id_souscateg'] == $nomArticle['id_souscateg']) {	
						echo "								<li>\n";
						echo "									<form name=\"recup\" method=\"get\" action=\"".$nomArticle['url']."\">\n";
						echo "										<input type=\"hidden\" name=\"id_article\" value=\"".$nomArticle['id_article']."\" />\n";
						// Page accessible grâce à une redirection vers celle ci en cliquant
						echo "										<a href=\"".$nomArticle['repertoire']."/".$nomArticle['url']."\" onClick=\"recup.submit();\">".$nomArticle['nom_article']."</a>\n";
						echo "									</form>\n";
						echo "								</li>\n";	
					}
				}
					
				echo "							</ul>\n";
				echo " 						</li>\n";
			}
		}		
		
		echo " 					</ul>\n";
		echo " 				</li>\n";
	}
	
	// Menu de l'administrateur qui lui permet de gérer le contenu du site
	if (isset($_SESSION['mail']) && $_SESSION['admin'] == 1) {		
		echo " 				<li class=\"titreMenu\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";	
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterCateg\">Ajouter une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierCateg\">Modifier une catégorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerCateg\">Supprimer une catégorie</a>\n";
		echo "						</li>\n";
		echo "					</ul>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les sous-catégories\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterSousCateg\">Ajouter une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierSousCateg\">Modifier une sous-categorie</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerSousCateg\">Supprimer une sous-categorie</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					Gérer les auteurs\n";
		echo " 					<ul>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?ajouterAuteur\">Ajouter un auteur</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?modifierAuteur\">Modifier un auteur</a>\n";
		echo "						</li>\n";
		echo " 						<li>\n";
		echo "							<a href=\"lepetitscientifique?supprimerAuteur\">Supprimer un auteur</a>\n";
		echo "						</li>\n";		
		echo "					</ul>\n";		
		echo "				</li>\n";
		
	} else if (isset($_SESSION['mail'])) {
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"deconnexion.php\">Se déconnecter</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierAuteur\">Modifier son compte</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?ajouterArticle\">Ajouter un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"lepetitscientifique?modifierArticle\">Modifier un article</a>\n";
		echo "				</li>\n";
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\lepetitscientifique?supprimerArticle\">Supprimer un article</a>\n";
		echo "				</li>\n";
	} else {
		echo " 				<li class=\"more\">\n";
		echo "					<a href=\"accueil.php\">S'incrire/Se connecter</a>\n";
		echo "				</li>\n";
	}
	
	echo " 			</ul>\n";
	echo " 		</nav>\n";	
}

function tableauArticle() {

}

?>
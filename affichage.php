<?php
function tableauCategorie($data1, $data2) {
	echo " 		<section class=\"centre\">\n";
	echo "			<h1>Supprimer une catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique.php');\");</script>\n";
	}
	
	if (count($data1) >= 1 ) {
		echo "			<p>Vous ne pouvez supprimer une catégorie que lorsque celle-ci ne possède aucune sous-catégorie.\n";
	}
	
	echo "			<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($data1) >= 1) {		
		echo "				<tr>\n";	
		echo "					<th> ID CATEGORIE 		</th>\n";	
		echo "					<th> NOM CATEGORIE		</th>\n";	
		echo "					<th> ID SOUS-CATEGORIE  </th>\n";																		
		echo "					<th> NOM SOUS-CATEGORIE	</th>\n";																		
		echo "					<th> </th>\n";																		
		echo "				</tr>\n";
	}
	
	foreach($data1 as $tuple) {	
		echo "				<tr>\n";
		echo "					<td>\n";
		echo "						".$tuple['id_categ']."\n";
		echo "					</td>\n";
		echo "					<td>\n";
		echo "						".$tuple['nom_categ']."\n";
		echo "					</td>\n";
	//	echo "				<tr>\n";
		echo "					<td></td>\n";
		echo "					<td></td>\n";
		
		$bool = 0;
		foreach($data2 as $stuple) {		
			if ($tuple['id_categ'] == $stuple['id_categ']) {	
				if ($bool == 0) {
					echo "					<td></td>\n";
					echo "				</tr>\n";	
				}
				
				echo "				<tr>\n";
				echo "					<td></td>\n";
				echo "					<td></td>\n";
				echo "					<td>\n";
				echo "						".$stuple['id_souscateg']."\n";
				echo "					</td>\n";
				echo "					<td>\n";
				echo "						".$stuple['nom_souscateg']."\n";		
				echo "					</td>\n";
				echo "					<td></td>\n";
				echo "				</tr>\n";
				
				
				$bool = 1;
			} 
		}

		if ($bool == 0) {	
			echo "					<td>\n"; 
			echo "						<a href=\"lepetitscientifique.php?delete=".$tuple['id_categ']."\"> Supprimer </a>\n";
			echo "					</td>\n";	
			echo "				</tr>\n";
		} 
	}
	
	echo "			</table>\n";				
	echo " 		</section>\n";
}

function tableauSousCategorie() {

}

function tableauArticle() {

}

?>
<?php
function tableauCategorie($data1, $data2) {
	echo " 		<section class=\"centre\">\n";
	echo "			<h1>Supprimer une catégorie</h1>\n";				
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique.php?delete=$_GET[delete]');\",1000);</script>\n";
	}
	
	for ($i = 0; $i < count($data1); $i++) {
		echo "			".$data1[$i][0]."\n";
		echo "			".$data1[$i][1]."<br />\n";
		for ($j = 0; $j < count($data1); $j++) {
			echo "	**		".$data2[$k][1]."\n";
			echo "			".$data2[$k][2]."<br />\n";
		}
	}
	
/*	if (count($lignes1) >= 1) {
		echo "			<p>Vous ne pouvez supprimer un menu que lorsque celui-ci ne possède aucun sous-menu.\n";
	}
	
	echo "			<table>\n";
	
	// Si il n'y a pas de catégorie, on n'affiche pas le tableau
	if (count($lignes1) >= 1) {		
		echo "				<tr>\n";	
		echo "					<th> ID CATEGORIE 			</th>\n";	
		echo "					<th> NOM CATEGORIE			</th>\n";	
		echo "					<th> ID SOUS-CATEGORIE + NOM	</th>\n";																		
		echo "				</tr>\n";
	}
	
	foreach($lignes1 as $tupleC) {
		// Si il n'y a aucune sous-catégorie associé à cette catégorie, alors l'utilisateur peut alors le supprimer
		if (count($lignes2['id_categ']) < 1 ) {
			echo "				<tr>\n";
			echo "					<td>\n";
			echo "						".$tupleC['id_categ']."\n";
			echo "					</td>\n";
			echo "					<td>\n";
			echo "						".$tupleC['nom_categ']."\n";
			echo "					</td>\n";
			echo "					<td>\n"; 
			echo "						<a href=\"supprimerCategorie.php?delete=".$tupleC['id_categ']."\"> Supprimer </a>\n";
			echo "					</td>\n";	
			echo "				</tr>\n";
		}
		
		foreach($lignes2 as $tupleSC) {
			if (count($lignes2) > 0) {
				echo "				<tr>\n";
				echo "					<td>\n";
				echo "						".$tupleC['id_categ']."\n";
				echo "					</td>\n";
				echo "					<td>\n";
				echo "						".$tupleC['nom_categ']."\n";
				echo "					</td>\n";
			/*	echo "					<td>\n"; 
				echo "						<a href=\"supprimerCategorie.php?delete=".$tupleC['id_categ']."\"> Supprimer </a>\n";
				echo "					</td>\n";	*/
//				echo "				</tr>\n";
			
			
			
				/*echo "				<tr>\n";
				echo "					<td>\n";
				echo "						".$tupleC['id_categ']."\n";
				echo "					</td>\n";
				echo "					<td>\n";
				echo "						".$tupleC['nom_categ']."\n";
				echo "					</td>\n";*/
/*			}						
			
			echo "					<td>\n";
			echo "						(".$tupleSC['id_souscateg'].") ".$tupleSC['nom_souscateg']."\n";		
			echo "					</td>\n";
			echo "				</tr>\n";
		
		}
	}	*/
					
	echo "			</table>\n";				
	echo " 		</section>\n";
}

function tableauSousCategorie() {

}

function tableauArticle() {

}

?>
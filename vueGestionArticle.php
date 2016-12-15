<?php
function ajouterArticle($dataCateg, $dataSousCateg, $dataArticle) {
	echo "			<div class=\"custyle\">\n";
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if ((isset($_GET['insert_id_article']) && isset($_GET['insert_nom_article'])) ||
			(isset($_POST['insert_id_article']) && isset($_POST['insert_nom_article']))) {	
		
				
		if (isset($_GET['insert_id_article']) && isset($_GET['insert_nom_article'])) {		
			// On vérifie si le nom_utilisateur n'est pas déjà utilisé par un autre utilisateur
			foreach($dataArticle as $atuple) {	
				if ($_GET['insert_nom_article'] == $atuple['nom_article']) {	
					// Si le nom de la page est déjà prit, on redirige l'utilisateur vers l'ajout d'un autre page avec un message d'erreur			
					echo "<script> window.setTimeout(\"location=('lepetitscientifique?ajouterArticle&erreurNomArticle');\");</script>\n";
				} 
			}	
		}
		echo "<script>alert(".$_POST['creerArticle'].");</script>\n";
		
		
				
			// Formulaire de création de la page
			echo " 					<h1> Formulaire de création de la page".$_GET['insert_nom_article']." </h1>\n";
							
			// Pour ajouter le contenu de la page
		
		?>
			<form method="post" action="creerArticle.php">				
				<h3>Créer une page</h3>
				<?php
				$id = $_GET['insert_id_article'];
				$nom = $_GET['insert_nom_article'];
				echo "<input type=\"hidden\" name=\"ajouterArticle\" />\n";
				echo "<input type=\"hidden\" name=\"insert_id_article\" value=\"$id\"/>\n";
				echo "<input type=\"hidden\" name=\"insert_nom_article\" value=\"$nom\"/>\n";
					?>
				<label>
					<textarea name="textarea" id="textarea"></textarea>

					<script type="text/javascript">
						CKEDITOR.replace( 'textarea' );
					</script>	
				</label>
				<br>
				<input type="submit" name="creerArticle" value="Créer la page"/>
			</form><?php
		
	} else {
	
		if (isset($_GET['erreurNomArticle'])) {
			echo "<p><strong>Erreur ! Ce nom est déjà utilisé pour une autre page. Veuillez choisir un autre nom pour votre page</strong><br>\n";					 
		}
	
		echo "				<table class=\"table table-striped custab\">\n";
		echo "					<thead>\n";	
		echo "						<tr>\n";	
		echo "							<th> ID + NOM CATEGORIE      </th>\n";	
		echo "							<th> ID + NOM SOUS-CATEGORIE </th>\n";									
		echo "							<th> NOM ARTICLE             </th>\n";									
		echo "						</tr>\n";
		echo "					</thead>\n";
		
		foreach($dataCateg as $tuple) {	
			echo "					<tr>\n";
			echo "						<td>\n";
			echo "							(".$tuple['id_categ'].") ".$tuple['nom_categ']."\n";
			echo "						</td>\n";
				
			$bool1 = false;
			foreach($dataSousCateg as $stuple) {		
				if ($tuple['id_categ'] == $stuple['id_categ']) {	
					if ($bool1) {
						echo "						<td></td>\n";
					}

					echo "						<td>\n";
					echo "							(".$stuple['id_souscateg'].") ".$stuple['nom_souscateg']."\n";
					echo "						</td>\n";
				
					$bool1 = true;
					$bool2 = false;
					foreach($dataArticle as $atuple) {	
						if ($stuple['id_souscateg'] == $atuple['id_souscateg']) {	
							if ($bool2) {
								echo "						<td></td>\n";
								echo "						<td></td>\n";
							}

							echo "						<td>\n";
							echo "							".$atuple['nom_article']."\n";
							echo "						</td>\n";
							echo "					</tr>\n";
							
							$bool2 = true;
						}
					}
					
					if (!$bool2) {	
						echo "						<td></td>\n";
						echo "					</tr>\n";
					} 
				}
			}
			
			if (!$bool1) {	
				echo "						<td></td>\n";
				echo "						<td></td>\n";
				echo "					</tr>\n";
			} 	
		}
			
		echo "				</table>\n";			
		echo "					<form action=\"lepetitscientifique\" method=\"get\">\n";	
		echo "					<table class=\"table table-striped custab\">\n";
		echo "					<thead>\n";	
		echo "						<tr>\n";	
		echo "							<th> NOM SOUS-CATEGORIE </th>\n";	
		echo "							<th> ID ARTICLE 	    </th>\n";	
		echo "							<th> NOM ARTICLE	    </th>\n";													
		echo "							<th> AJOUTER		    </th>\n";													
		echo "						</tr>\n";
		echo "					</thead>\n";
		echo "						<tr>\n";
		
		$nb = $stuple['id_souscateg'];
		$dernierId = $atuple['id_article'] + 1; 
		
		// Formulaire d'ajout d'un menu, l'utilisateur doit renseigner un id_menu unique et un nom_menu 
		echo "								<input type=\"hidden\" name=\"ajouterArticle\">\n";
		echo "								<td>\n";
		
		echo "			<select name=insert_id_souscateg>\n";
		foreach($dataSousCateg as $n) {	
			echo "			<option value=".$n['id_souscateg'].">".$n['nom_souscateg']."</option>\n";  
		}
		
		echo "								</td>\n";
		
		//<input type=\"number\" min=\"1\" max=\"$nb\" name=\"insert_id_categ\" required=required> 	</td>\n";
		echo "								<td> $dernierId <input type=\"hidden\" name=\"insert_id_article\" value=\"$dernierId\">	</td>\n";
		echo "								<td> <input type=\"text\" name=\"insert_nom_article\" required=required pattern=\"([\'-A-z0-9À-ž\s]){3,}\"></td>\n";
		echo "								<td><button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25px\" height=\"25px\" src=\"images/ajout.png\"/></button></td>\n";
		echo "							</tr>\n";
		echo "						</table>\n";
		echo "					</form>\n";
		echo "				</div>\n";
	}
}

function tabSupprimerArticle($dataArticle) {
	echo "		<div class=\"custyle\">\n";
									
	// On vérifie si l'utilisateur a cliqué sur un bouton pour supprimer une catégorie et on la supprime
	if (isset($_GET['delete_id_article']) && isset($_GET['delete_repertoire'])) {		
		echo "<script> window.setTimeout(\"location=('lepetitscientifique?supprimerArticle');\");</script>\n";
	}

	echo "			<table class=\"table table-striped custab\">\n";			
	echo "					<thead>\n";	
	echo "						<tr>\n";	
	echo "							<th> ID ARTICLE 		</th>\n";	
	echo "							<th> NOM ARTICLE		</th>\n";																	
	echo "							<th> SUPPRIMER			</th>\n";																	
	echo "						</tr>\n";
	echo "					</thead>\n";

	foreach($dataArticle as $tuple) {	
		if ($tuple['id_auteur'] == $_SESSION['id']) {
			echo "					<tr>\n";
			echo "						<td>\n";
			echo "							".$tuple['id_article']."\n";
			echo "						</td>\n";
			echo "						<td>\n";
			echo "							".$tuple['nom_article']."\n";
			echo "						</td>\n";
			echo "						<td>\n"; 
			echo "							<a href=\"lepetitscientifique.php?supprimerArticle&delete_id_article=".$tuple['id_article']."&delete_repertoire=".$tuple['repertoire']."\"><img width=\"25px\" height=\"25px\" src=\"images/supp.png\"/></a>\n";
			echo "						</td>\n";	
			echo "					</tr>\n";
		}
	}
	
	echo "				</table>\n";				
	echo " 			</div>\n";
}
?>


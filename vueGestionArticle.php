<?php
function ajouterArticle($dataCateg, $dataSousCateg, $dataArticle) {
	echo "			<div class=\"custyle\">\n";
									
	if ((isset($_GET['insert_id_article']) && isset($_GET['insert_nom_article'])) ||
			(isset($_POST['insert_id_article']) && isset($_POST['insert_nom_article']))) {	
				
		// Formulaire de création de la page
		echo " 					<h2> Formulaire de création de la page : ".$_GET['insert_nom_article']." </h2>\n";
						
		// Pour ajouter le contenu de la page
		
?>
		<form method="post" action="creerArticle.php">				
			<h2>Créer une page</h2>
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
			<button class="btn btn-primary btn-block btn-signin" type="submit" name="creerArticle" value="Créer la page">Créer la page</button>
		</form>
<?php		
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
		
		$dernierId = 0;
		
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
						
						$dernierId = $atuple['id_article'] + 1; 
					}
					
					if (!$bool2) {	
						echo "						<td></td>\n";
						echo "					</tr>\n";
					} 
				}
				
				$nb = $stuple['id_souscateg'];
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

function modifierArticle($dataArticle) {
	echo "		<div class=\"custyle\">\n";
									
	if (isset($_GET['update_id_article']) && isset($_GET['update_nom_article']) && isset($_GET['repertoire'])) {	
				
		echo " 					<h2> Formulaire de modification de l'article ".$_GET['update_nom_article']." </h2>\n";
						
		// Pour modifier le contenu de l'article
?>
		<form method="post" action="modifierContenu.php">				
<?php
			$id = $_GET['update_id_article'];
			$nom = $_GET['update_nom_article'];
			$repertoire = $_GET['repertoire'];
			echo "<input type=\"hidden\" name=\"modifierArticle\" />\n";
			echo "<input type=\"hidden\" name=\"update_id_article\" value=\"$id\"/>\n";
			echo "<input type=\"hidden\" name=\"update_nom_article\" value=\"$nom\"/>\n";
			echo "<input type=\"hidden\" name=\"repertoire\" value=\"$repertoire\"/>\n";
			
			// On récupère le texte stocké dans le fichier texte.txt
			$texte = file_get_contents( "articles/".$_GET['repertoire']."/texte.txt" );

			echo "<label>\n";
			echo "	<textarea name=\"textarea\" id=\"textarea\"> $texte </textarea>\n";
?>
				<script type="text/javascript">
					CKEDITOR.replace( 'textarea' );
				</script>	
			</label>
			<br>
			<button class="btn btn-primary btn-block btn-signin" type="submit" name="modifierArticle" value="Valider la modification">Valider la modification</button>
		</form>
<?php		
	} else {

		echo "			<table class=\"table table-striped custab\">\n";			
		echo "					<thead>\n";	
		echo "						<tr>\n";	
		echo "							<th> ID ARTICLE 		</th>\n";	
		echo "							<th> NOM ARTICLE		</th>\n";																	
		echo "							<th> MODIFIER			</th>\n";																	
		echo "						</tr>\n";
		echo "					</thead>\n";

		foreach($dataArticle as $tuple) {	
			if ($tuple['id_auteur'] == $_SESSION['id']) {
				echo "						<form action=\"lepetitscientifique.php\" method=\"get\">";	
				echo "							<input type=\"hidden\" name=\"modifierArticle\">\n";
				echo "							<input type=\"hidden\" name=\"repertoire\"  value=\"".$tuple['repertoire']."\">\n";
				echo "							<tr>\n";
				echo "								<td>\n";
				echo "									".$tuple['id_article']."\n";
				echo "									<input type=\"hidden\" name=\"update_id_article\" value=\"".$tuple['id_article']."\">\n";
				echo "								</td>\n";
				echo "								<td>\n";
				echo "									".$tuple['nom_article']."\n";
				echo "									<input type=\"hidden\" name=\"update_nom_article\" value=\"".$tuple['nom_article']."\">\n";
				echo "								</td>\n";						
				echo " 								<td>\n";
				echo "									<button class=\"btn btn-default btn-circle\" type=\"submit\"><img width=\"25px\" height=\"25px\" src=\"images/modif.png\"/></button>\n";
				echo "								</td>\n";				
				echo "							</tr>\n";
				echo "						</form>\n";
			}
		}
		
		echo "				</table>\n";				
		echo " 			</div>\n";
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


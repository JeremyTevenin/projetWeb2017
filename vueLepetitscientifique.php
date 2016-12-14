<?php
function entete() {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" type='text/css' href="style.css">
		<title>Le petit Scientifique</title>	
	</head>
	<body>
		<header>
			<fieldset>
				<h2>Le petit scientifique</h2>
			</fieldset>
		</header>
	<!--	<form method=\"post\" action=\"creerPage.php\">				
			<fieldset class="cadre">
				<h3>Créer une page</h3>
				<input type="hidden" name="id_page" value="$tuplePage->id_page"/>
				<label>
				<textarea name="textarea" id="textarea"></textarea>

					<script type="text/javascript">
						CKEDITOR.replace( 'textarea' );
					</script>	
				</label>
				<br>
				<center><input type="submit" name="insertPage" value="Créer la page"/></center>
			</fieldset>
		</form>-->
			
<?php
}

function pied() {
?>
		</section>
	</body>
</html>
<?php
}

function contenu() {
?>
		<section id="article">
<?php
}
?>
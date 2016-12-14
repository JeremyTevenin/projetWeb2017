<?php
function entete() {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Le petit Scientifique</title>
		
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<!-- CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />   
		
		<link href="test.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		<!--Scripts-->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
	
	</head>
	<body>
		<header>
			<fieldset>
				<h2>Le petit scientifique</h2>
			</fieldset>
		</header>
		<form method=\"post\" action=\"creerPage.php\">				
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
		</form>
			
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

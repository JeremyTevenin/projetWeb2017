<?php
function entete() {
	echo "<!DOCTYPE HTML>\n";
	echo "<html>\n";
	echo "	<head>\n";
	echo "		<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />\n";
	echo "		<script type=\"text/javascript\" src=\"ckeditor/ckeditor.js\"></script>\n";
	echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">\n";
	echo "		<title>Le petit Scientifique</title>\n";	
	echo "	</head>\n";
	echo "	<body>\n";
	echo "		<header>\n";
	echo "			<fieldset>\n";
	echo "				<h2>Le petit scientifique</h2>\n";
	echo "			</fieldset>\n";
	echo "		</header>\n";			
}

function pied() {
	echo "		</section>\n";
	echo "	</body>\n";
	echo "</html>\n";
}

function contenu() {
	echo "		<section id=\"article\">\n";
}
?>


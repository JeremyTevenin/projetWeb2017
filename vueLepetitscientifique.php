<?php
function entete() {
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Le Petit Scientifique</title>
		
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
		<div id="fond">
		<header>
				<h2>LE PETIT SCIENTIFIQUE</h2>
				<div class="headerDec">

				</div>
		</header>	
		</div>

<?php
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


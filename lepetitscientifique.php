<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="style.css">
	
	</head>
	<body>
        <?php
            include('header.php');
            include('menu.php');
			
			
			menu();
        ?>
		
		<section id="article">
<?php
			if (!isset($_SESSION['mail'])) {
				echo "Bonojur";
			} else {
				echo "Bonjour ".$_SESSION['mail'];
			}
?>		
		</section>
	</body>
</html>

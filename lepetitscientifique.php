<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type='text/css' href="style.css">
		<?php
			include('connect.php');
		?>
	</head>
	<body>
        <?php
            include('header.php');
            include('menu.php');
			
			if (!isset($_SESSION['mail'])) {
			menu();
        ?>
		
		<section id="article">
			bonjour
		</section>
<?php
			} else {
				echo "Bonjour ".$_SESSION['mail'];
			}
?>
	</body>
</html>

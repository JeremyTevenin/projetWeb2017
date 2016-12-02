<?php
	include "fonctionAux.php";
		
	entete();
	contenu();
	pied();
	
	function contenu() {
		if (isset($_SESSION['mail'])) {
			$mail = $_SESSION['mail'];
?>		
		<div id="opaBienv"></div>
		<section id="bienvenue">
			<h2> Bienvenue sur notre site de réservation d'hôtel ! </h2><br /><br />
			Sélectionnez la région de votre destination !<br /><br />
			Les régions ne contiennnent pas forcément un hôtel, mais si 
			une ville est attaché à la région, c'est qu'il y a un ou plusieurs hôtels dans la région.<br /><br />	
			Actuellement, vous pouvez réserver vos hôtels dans les régions suivantes :
			<ul>
				<li> Haute-Normandie
				<li> Corse
				<li> Bretagne
				<li> Provence-Alpes Côte d'Azur
			</ul>
			Vous pouvez aussi vous
			<a href="deconnexion.php"> déconnecter </a>		
			<br /><br /> 
<?php		
			if ($mail == "admin") {
				menu();
			} else {
				echo "<a href=\"client.php\"> Voir ses réservations </a>\n"; 
			}
?>			
			
		</section>

		<div id="carteConnex">
			<img src="images/carte.gif" alt="carte" usemap="#carte">    
			<map name="carte">
				<area shape="POLY" coords="375,100,410,100,390,170,370,170"         href="recherche.php?ville=Strasbourg"  alt="Alsace">
				<area shape="RECT" coords="312,78,363,130"                          href="recherche.php?ville=Metz"        alt="Lorraine">
				<area shape="RECT" coords="321,143,369,206"                         href="recherche.php?ville=Besançon"    alt="Franche Comte">
				<area shape="RECT" coords="265,82,308,149"                          href="recherche.php?ville=Chalons"     alt="Champagne Ardenne">
				<area shape="RECT" coords="200,5,276,47"                            href="recherche.php?ville=Lille"       alt="Nord pas de Calais">
				<area shape="RECT" coords="203,52,263,93"                           href="recherche.php?ville=Amiens"      alt="Picardie">
				<area shape="RECT" coords="160,40,199,90"                           href="recherche.php?ville=Rouen"       alt="Haute Normandie">
				<area shape="RECT" coords="100,85,153,122"                          href="recherche.php?ville=Caen"        alt="Basse Normandie">
				<area shape="POLY" coords="5,100,110,100,110,130,60,155,5,130"      href="recherche.php?ville=Rennes"      alt="Bretagne">
				<area shape="RECT" coords="107,133,150,188"                         href="recherche.php?ville=Nantes"      alt="Pays de la Loire">
				<area shape="RECT" coords="117,206,170,254"                         href="recherche.php?ville=Poitiers"    alt="Poitou Charentes">
				<area shape="RECT" coords="177,223,227,272"                         href="recherche.php?ville=Limoges"     alt="Limousin">
				<area shape="RECT" coords="177,132,223,210"                         href="recherche.php?ville=Orleans"     alt="Centre">
				<area shape="RECT" coords="204,96,257,132"                          href="recherche.php?ville=Paris"       alt="Ile de France">
				<area shape="RECT" coords="243,151,313,208"                         href="recherche.php?ville=Dijon"       alt="Bourgogne">
				<area shape="RECT" coords="285,231,372,282"                         href="recherche.php?ville=Lyon"        alt="Rhone Alpes">
				<area shape="RECT" coords="229,228,276,294"                         href="recherche.php?ville=Clermont"    alt="Auvergne">
				<area shape="POLY" coords="280,365,350,280,400,310,380,380"         href="recherche.php?ville=Marseille"   alt="Provence">
				<area shape="POLY" coords="170,300,230,300,228,340,170,400,105,400" href="recherche.php?ville=Toulouse"    alt="Midi Pyrenees">
				<area shape="RECT" coords="112,271,168,328"                         href="recherche.php?ville=Bordeaux"    alt="Aquitaine">
				<area shape="RECT" coords="231,337,293,387"                         href="recherche.php?ville=Montpellier" alt="Languedoc Rousillon">
				<area shape="RECT" coords="371,383,414,451"                         href="recherche.php?ville=Ajaccio"     alt="Corse">
			</map>
		</div>
<?php	
		} else {
			header('Location: accueil.php');
		}
	}
?>	
		
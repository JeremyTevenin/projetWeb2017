<?php
	include('connect.php');
    $pseudo = strtolower(htmlspecialchars($_GET[ 'pseudo' ]));
	$test = true;
	$request = $db->prepare('SELECT * FROM logs');
	$request->execute();
	while ($name = $request->fetch()) {
		if (strtolower($name['pseudo']) == $pseudo) {
			$test = false;
		}
	} 
	echo $test;
?>

<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include('connect.php');
		?>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	</head>
	<body>
        <?php
            if (isset($_POST['pseudo']) && isset($_POST['password'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = sha1(htmlspecialchars($_POST['password']));
                $request = $db->prepare("SELECT COUNT(*) AS exist FROM logs WHERE pseudo='$pseudo'");
                $request->execute();
                $name = $request->fetch();
                if ($name['exist'] != 0) {
                    $request1 = $db->prepare("SELECT password, id FROM logs WHERE pseudo='$pseudo'");
                    $request1->execute();
                    $name1 = $request1->fetch();
                    if ($password == $name1['password']) {
                        session_regenerate_id();
                        $_SESSION['pseudo'] = $pseudo;
                        
                        $req = $db->prepare('SELECT * FROM parametres WHERE idPlayer=' . $name1['id'] . ';');
                        $req->execute();
                        $param = $req->fetch();
						
                        $_SESSION['iaColor'] = $param['iaColor'];
                        $_SESSION['boardColor'] = $param['boardColor'];
                        $_SESSION['playerColor'] = $param['playerColor'];
                        $_SESSION['help'] = $param['help'];
						
                        header ("Location: reversi.php");
                    } else {
                        echo 'Vous n\'avez pas rentré les bons identifiants, vous allez etre redirige dans 5 secondes';
                        header ("Refresh: 5;URL=index.php");
                    }
                }
            }
		?>
	</body>
</html>

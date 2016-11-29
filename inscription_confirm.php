<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include('connect.php');
		?>
	</head>
	<body>
		<?php
			if (isset($_POST[ 'pseudo' ]) && isset($_POST[ 'password' ]) && isset($_POST[ 'password2' ])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $password = sha1(htmlspecialchars($_POST['password']));
                $password2 = sha1(htmlspecialchars($_POST['password2']));
                if ($password == $password2) {
                    $query = 'INSERT INTO logs (pseudo, password) VALUES ("' . $pseudo . '", "' . $password . '")';
                    $request = $db->prepare($query);
                    $request->execute();
                    session_regenerate_id();
                    $_SESSION['pseudo'] = $pseudo;
                    $query = 'SELECT id FROM logs where pseudo="' . $pseudo . '"';
                    $req = $db->prepare($query);
                    $req->execute();
                    $id = $req->fetch();
                    
                    $query = 'INSERT INTO parametres (idPlayer, playerColor, iaColor, boardColor, help) VALUES ("' . $id['id'] . '", "000", "FFF", "008000", "1")';
                    $request = $db->prepare($query);
                    $request->execute();
                    $_SESSION['iaColor'] = "FFF";
                    $_SESSION['boardColor'] = "008000";
                    $_SESSION['playerColor'] = "000";
                    $_SESSION['help'] = 1;
                }
			} else {
				echo 'mot de passe ou pseudo non renseigner';
			}
            header('Location: reversi.php');
		?>
	</body>
</html>

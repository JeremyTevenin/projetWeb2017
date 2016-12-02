<!DOCTYPE HTML>
<html>
	<head>
		<?php
			include('connect.php');
		?>
	</head>
	<body>
		<?php
		
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$ville = $_POST['ville'];
			$dateN = $_POST['dateN'];
			$mail = $_POST['mail'];
			
			$password = $_POST['password'];
			$password2 = $_POST['password2'];
			
			if (isset($_POST[ 'nom' ]) && isset($_POST[ 'prenom' ]) && isset($_POST[ 'ville' ]) && isset($_POST[ 'dateN' ]) &&
			isset($_POST[ 'mail' ]) && isset($_POST[ 'password' ]) && isset($_POST[ 'password2' ])) {
				echo 'bonjour' ;
                $nom = htmlspecialchars($nom);
                $prenom = htmlspecialchars($prenom);
                $ville = htmlspecialchars($ville);
                $dateN = htmlspecialchars($dateN);
                $mail = htmlspecialchars($mail);
                $password = sha1(htmlspecialchars($password));
                $password2 = sha1(htmlspecialchars($password2));
                if ($password == $password2) {
					echo 'salut';
                    $query = 'INSERT INTO auteur (nom, prenom, ville, dateN, mail, password) VALUES ("' . $nom . '", "' . $prenom . '", "'. $ville . '", "'. $dateN . '", "' . $mail . '", "' . $password . '")';
                    echo $query;
                    $request = $db->prepare($query);
                    $request->execute();
                    /*session_regenerate_id();
                    $_SESSION['mail'] = $mail;
                    $query = 'SELECT id FROM auteur where mail="' . $mail . '"';
                    $req = $db->prepare($query);
                    $req->execute();
                    $id = $req->fetch();*/
                }
			} else {
				echo 'mot de passe ou pseudo non renseigner';
			}
            //header('Location: accueil.php');
		?>
	</body>
</html>

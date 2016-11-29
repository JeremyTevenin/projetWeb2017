<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type='text/css' href="form.css">
        <link rel="stylesheet" type='text/css' href="common.css">
    </head>
    
    <body>
         <?php
            include('connect.php');
            include('header.php');
            include('menu.php');
        ?>
		<nav>
		<?php
			menu();
		?>
		</nav>
		<form method='post' action='login_confirm.php'>
			<fieldset>
				<legend>Connexion</legend>
                <p id='valid'></p>
				<table>
					<tr>
						<td>Nom : </td>
						<td><input type='text' name='nom' required='required' id='nom' pattern='[a-zA-Z\._]+'></td>
					</tr>
					<tr>
						<td>Prenom : </td>
						<td><input type='text' name='prenom' required='required' id='prenom' pattern='[a-zA-Z\._]+'></td>
					</tr>
					<tr>
						<td>Ville : </td>
						<td><input type='text' name='ville' required='required' id='ville' pattern='[a-zA-Z\._]+'></td>
					</tr>
					<tr>
						<td>Date de naissance : </td>
						<td><input type='date' name='dateN' required='required' id='dateN'></td>
					</tr>
					<tr>
						<td>Email : </td>
						<td><input type='email' name='mail' required='required' id='mail' pattern='[a-zA-Z0-9\._]+'></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type='password' name='mdp' id ='mdp' required='required'></td>
					</tr>
					<tr>
						<td></td>
						<td><input type='submit' name='submit' id='submit' value='Validez'></td>
					</tr>
				</table>
			</fieldset>
            <section>
                Pas encore inscrit ?
                <a href="inscription.php">Vous inscrire</a><br/>
                Vous pouvez aussi naviguer sans être inscrit
                <a href="reversi.php">Jouez</a>
                 (Attention vous ne pourrez pas écrire ou modifier des articles.)
            </section>
		</form>
    </body>
</html>


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
        ?>
		<form method='post' action='login_confirm.php'>
			<fieldset>
				<legend>Connexion</legend>
                <p id='valid'></p>
				<table>
					<tr>
						<td>Pseudo : </td>
						<td><input type='text' name='pseudo' required='required' id='pseudo' pattern='[a-zA-Z0-9\._]+'></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type='password' name='password' id ='password' required='required'></td>
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
                Vous pouvez aussi jouer sans être inscrit
                <a href="reversi.php">Jouez</a>
                 (Attention vous ne pourrez pas conserver vos scores.)
            </section>
		</form>
    </body>
</html>


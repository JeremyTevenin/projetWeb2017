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

			menu();
		?>

		<form method='post' action='login_confirm.php'>
			<fieldset>
				<legend>Connexion</legend>
                <p id='valid'></p>
				<table>
					<tr>
						<td>Email : </td>
						<td><input type='email' name='mail' required='required' id='mail' pattern='/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/'></td>
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
                Vous pouvez aussi naviguer sans être inscrit
                <a href="accueil.php">Naviguez</a>
                 (Attention vous ne pourrez pas écrire ou modifier des articles.)
            </section>
		</form>
		
		<form method='post' action='inscription_confirm.php'>
			<fieldset>
				<legend>Inscription</legend>
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
						<td><input type='email' name='mail' required='required' id='mail' pattern='/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/'></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type='password' name='password' id ='password' required='required'></td>
						<td id='tickPa1'></td>
					</tr>
					<tr>
						<td>Réentrez le mot de passe : </td>
						<td><input type='password' name='password2' id ='password2' required='required'></td>
						<td id='tickPa2'></td>
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
		<script>
			var xmlhttp = new XMLHttpRequest();
            var pass = true;
            var testNom = false;
			var testPrenom = false;
			
			var testVille = false;
			var testDate = false;
			
			var testMail = false;
			$('#submit').attr('disabled', 'true');
			$("#nom").keyup(function() {
				if ($("#nom").val() == "") {
					$("#nom").css("border-color", "#ff5b5b"); 
					$("#nom").next(".erreur").show().text("Veuillez entrer votre nom");
					testNom = false; 
				} else if (!$("#nom").val().match(/^[-a-zA-Zéèç]+$/)) {
					$("#nom").css("border-color", "#ff5b5b"); 
					$("#nom").next(".erreur").show().text("Veuillez entrer un nom valide");	
					testNom = false;
				} else {
					$("#nom").css("border-color", "#00ff00"); 
					$("#nom").next(".erreur").hide().text("");
					testNom = true;
				}
			});
			
			$("#prenom").keyup(function() {
				if ($("#prenom").val() == "") {
					$("#prenom").css("border-color", "#ff5b5b"); 
					$("#prenom").next(".erreur").show().text("Veuillez entrer votre prénom");
					testPrenom = false; 
				} else if (!$("#prenom").val().match(/^[-a-zA-Zéèç]+$/)) {
					$("#prenom").css("border-color", "#ff5b5b"); 
					$("#prenom").next(".erreur").show().text("Veuillez entrer un prénom valide");	
					testPrenom = false;
				} else {
					$("#prenom").css("border-color", "#00ff00"); 
					$("#prenom").next(".erreur").hide().text("");
					testPrenom = true;
				}
			});	
			
			$("#ville").keyup(function() {
				if ($("#ville").val() == "") {
					$("#ville").css("border-color", "#ff5b5b"); 
					$("#ville").next(".erreur").show().text("Veuillez entrer votre ville");
					testVille = false; 
				} else if (!$("#ville").val().match(/^[-a-zA-Zéèç]+$/)) {
					$("#ville").css("border-color", "#ff5b5b"); 
					$("#ville").next(".erreur").show().text("Veuillez entrer une ville valide");	
					testVille = false;
				} else {
					$("#ville").css("border-color", "#00ff00"); 
					$("#ville").next(".erreur").hide().text("");
					testVille = true;
				}
			});	
			
			$("#dateN").keyup(function() {
				if ($("#dateN").val() == "") {
					$("#dateN").css("border-color", "#ff5b5b"); 
					$("#dateN").next(".erreur").show().text("Veuillez renseigner votre date de naissance");
					testDate = false; 
				} else {
					$("#dateN").css("border-color", "#00ff00"); 
					$("#dateN").next(".erreur").hide().text("");
					testDate = true;
				}
			});	
				
			$("#mail").keyup(function() {
				if ($("#mail").val() == "") {
					$("#mail").css("border-color", "#ff5b5b"); 
					$("#mail").next(".erreur").show().text("Veuillez entrer votre mail");
					testmail = false; 
				} else if (!$("#mail").val().match(/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/)) {
					$("#mail").css("border-color", "#ff5b5b"); 
					$("#mail").next(".erreur").show().text("Veuillez entrer un mail valide");	
					testmail = false;
				} else {
					$("#mail").css("border-color", "#00ff00"); 
					$("#mail").next(".erreur").hide().text("");
					testMail = true;
				}
			});
            $( '#password' ).keyup(function() {
                if ($( '#password' ).val() == $( '#password2' ).val()) {
                    $( '#password' ).css("border-color", " green");
                    $( '#password2' ).css("border-color", "green");
					document.getElementById('tickPa1').innerHTML = '<img src="tick.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="tick.png">';
                    pass = true;
                    if (pass && mail && ville && nom && prenom && dateN) { 
                        $('#submit').removeAttr('disabled');
                    }
                } else {
                    $( '#password' ).css("border-color", "red");
                    $( '#password2' ).css("border-color", "red");
					document.getElementById('tickPa1').innerHTML = '<img src="cross.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="cross.png">';
                    $('#submit').attr('disabled', 'true');
                    pass = false;
                }
            });
            $( '#password2' ).keyup(function() {
                if ($( '#password' ).val() == $( '#password2' ).val()) {
                    $( '#password' ).css("border-color", " green");
                    $( '#password2' ).css("border-color", "green");
					document.getElementById('tickPa1').innerHTML = '<img src="tick.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="tick.png">';
                    pass = true;
                    if (pass && mail && ville && nom && prenom && dateN) { 
                        $('#submit').removeAttr('disabled');
                    }
                } else {
                    $( '#password' ).css("border-color", "red");
                    $( '#password2' ).css("border-color", "red");
					document.getElementById('tickPa1').innerHTML = '<img src="cross.png">';
					document.getElementById('tickPa2').innerHTML = '<img src="cross.png">';
                    $('#submit').attr('disabled', 'true');
                    pass = false;
                }
            });
		</script>
    </body>
</html>


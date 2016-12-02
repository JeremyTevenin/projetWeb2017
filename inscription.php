<!DOCTYPE HTML>
<html>
	<head>
		<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
		<script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" type='text/css' href="common.css">
        <link rel="stylesheet" type='text/css' href="form.css">
		
		<?php
			include('connect.php');
		?>
	</head>
	<body>
        <?php
            include('header.php');
        ?>
		<section id="inscription">
			<form method='post' action='inscription_confirm.php'>
				<fieldset>
					<legend>Inscription</legend>
					<label>Nom : </label>
					<input type='text' name='nom' required='required' id='nom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurNom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<label>Prenom : </label>
					<input type='text' name='prenom' required='required' id='prenom' pattern='[-a-zA-Zéèàôöîïç]{3,15}'>
					<img class="erreurPrenom" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Ville : </label>
					<input type='text' name='ville' required='required' id='ville' pattern='[-a-zA-Zéèàôöîïç\s]{2,25}'>
					<img class="erreurVille" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Date de naissance : </label>
					<input type='date' name='dateN' required='required' id='dateN'>
					<img class="erreurDN" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Email : </label>
					<input type='email' name='mail' required='required' id='mail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'>
					<img class="erreurEmail" style="display:none" />
					<span class="erreur"></span>
					<br /><br />
					
					<label>Mot de passe : </label>
					<input type='password' name='password' id ='password' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP1" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<label>Confirmer le mot de passe : </label>
					<input type='password' name='password2' id ='password2' required='required' pattern='(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z0-9]).{5,}'>
					<img class="erreurMDP2" style="display:none" />
					<span class="erreur"></span>
					<br /><br />

					<input type='submit' name='submit' id='submit' value='Envoyer'>
				</fieldset>
			</form>
		</section>
		<script>	var xmlhttp = new XMLHttpRequest();
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
			$("#nom").next(".erreurNom").show().attr('src', 'images/cross.png');
			$(".erreurNom").next(".erreur").show().text("Veuillez entrer votre nom");
			testNom = false; 
		} else if (!$("#nom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#nom").css("border-color", "#ff5b5b"); 
			$("#nom").next(".erreurNom").show().attr('src', 'images/cross.png');
			$(".erreurNom").next(".erreur").show().text("Veuillez entrer un nom valide");
			testNom = false;
		} else {
			$("#nom").css("border-color", "#00ff00"); 
			$("#nom").next(".erreurNom").show().attr('src', 'images/tick.png');
			$(".erreurNom").next(".erreur").hide().text("");
			testNom = true;
		}
	});

	$("#prenom").keyup(function() {
		if ($("#prenom").val() == "") {
			$("#prenom").css("border-color", "#ff5b5b"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Veuillez entrer votre prénom");
			testPrenom = false; 
		} else if (!$("#prenom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#prenom").css("border-color", "#ff5b5b");
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Veuillez entrer un prénom valide");				
			testPrenom = false;
		} else {
			$("#prenom").css("border-color", "#00ff00"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/tick.png');
			$(".erreurPrenom").next(".erreur").hide().text("");
			testPrenom = true;
		}
	});	

	$("#ville").keyup(function() {
		if ($("#ville").val() == "") {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/cross.png');
			$(".erreurVille").next(".erreur").show().text("Veuillez entrer votre ville");
			testVille = false; 
		} else if (!$("#ville").val().match(/^[-a-zA-Zéèç\s]+$/)) {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/cross.png');
			$(".erreurVille").next(".erreur").show().text("Veuillez entrer une ville valide");	
			testVille = false;
		} else {
			$("#ville").css("border-color", "#00ff00"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/tick.png');
			$(".erreurVille").next(".erreur").hide().text("");
			testVille = true;
		}
	});	

	$("#dateN").keyup(function() {
		if ($("#dateN").val() == "") {
			$("#dateN").css("border-color", "#ff5b5b"); 
			$("#dateN").next(".erreurDN").show().attr('src', 'images/cross.png');
			$(".erreurDN").next(".erreur").show().text("Veuillez renseigner votre date de naissance");
			testDate = false; 
		} else {
			$("#dateN").css("border-color", "#00ff00"); 
			$("#dateN").next(".erreurDN").show().attr('src', 'images/tick.png');
			$(".erreurDN").next(".erreur").hide().text("");
			testDate = true;
		}
	});	
		
	$("#mail").keyup(function() {
		if ($("#mail").val() == "") {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/cross.png');
			$(".erreurEmail").next(".erreur").show().text("Veuillez entrer votre mail");
			testmail = false; 
		} else if (!$("#mail").val().match(/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/)) {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/cross.png');
			$(".erreurEmail").next(".erreur").show().text("Veuillez entrer un mail valide");
			testmail = false;
		} else {
			$("#mail").css("border-color", "#00ff00"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/tick.png');
			$(".erreurEmail").next(".erreur").hide().text("");
			testMail = true;
		}
	});

	$('#password').keyup(function() {
		if (!$("#password").val().match(/^[a-zA-Z0-9].{5,}$/)) {
			$("#password").css("border-color", "#ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Mot de passe trop petit");
		} else if ($('#password').val() == $('#password2').val()) {
			$('#password').css("border-color", "#00ff00");
			$('#password2').css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom && dateN) { 
				$('#submit').removeAttr('disabled');
			}
		} else {
			$('#password').css("border-color", "#ff5b5b");
			$('#password2').css("border-color", "#ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/cross.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$(".erreurMDP2").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$('#submit').attr('disabled', 'true');
			pass = false;
		}
	});

	$( '#password2' ).keyup(function() {
		if (!$("#password2").val().match(/^[a-zA-Z0-9].{5,}$/)) {
			$("#password2").css("border-color", "#ff5b5b"); 
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/cross.png');
			$(".erreurMDP2").next(".erreur").show().text("Mot de passe trop petit");
		} else if ($('#password').val() == $('#password2').val()) {
			$( '#password' ).css("border-color", "#00ff00");
			$( '#password2' ).css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom && dateN) { 
				$('#submit').removeAttr('disabled');
			}
		} else {
			$('#password').css("border-color", "ff5b5b");
			$('#password2').css("border-color", "ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/cross.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/cross.png');
			$(".erreurMDP2").next(".erreur").hide().text("Le mot de passe n'est pas identique");
			$('#submit').attr('disabled', 'true');
			pass = false;
		}
	});</script>
	</body>
</html>

$(function() {	
	var xmlhttp = new XMLHttpRequest();
	var pass = true;
	var testNom = false;
	var testPrenom = false;
	var testVille = false;
	var testMail = false;

	$('#submit').attr('disabled', 'true');
	$("#nom").keyup(function() {
		if ($("#nom").val() == "") {
			$("#nom").css("border-color", "#ff5b5b");
			$("#nom").next(".erreurNom").show().attr('src', 'images/cross.png');
			$(".erreurNom").next(".erreur").show().text("Veuillez saisir votre nom");
			testNom = false;
			$('#submit').attr('disabled', 'true');
		} else if (!$("#nom").val().match(/^([-A-zÀ-ž\s]){1,20}$/)) {
			$("#nom").css("border-color", "#ff5b5b"); 
			$("#nom").next(".erreurNom").show().attr('src', 'images/cross.png');
			$(".erreurNom").next(".erreur").show().text("Caractère non valide");
			testNom = false;
			$('#submit').attr('disabled', 'true');
		} else {
			$("#nom").css("border-color", "#00ff00"); 
			$("#nom").next(".erreurNom").show().attr('src', 'images/tick.png');
			$(".erreurNom").next(".erreur").hide().text("");
			testNom = true;
			if (pass && mail && ville && nom && prenom) { 
				$('#submit').removeAttr('disabled');
			}
		}
	});

	$("#prenom").keyup(function() {
		if ($("#prenom").val() == "") {
			$("#prenom").css("border-color", "#ff5b5b"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Veuillez saisir votre prénom");
			testPrenom = false; 
			$('#submit').attr('disabled', 'true');
		} else if (!$("#prenom").val().match(/^([-A-zÀ-ž\s]){1,20}$/)) {
			$("#prenom").css("border-color", "#ff5b5b");
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Caractère non valide");				
			testPrenom = false;
			$('#submit').attr('disabled', 'true');
		} else {
			$("#prenom").css("border-color", "#00ff00"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'images/tick.png');
			$(".erreurPrenom").next(".erreur").hide().text("");
			testPrenom = true;
			if (pass && mail && ville && nom && prenom) { 
				$('#submit').removeAttr('disabled');
			}
		}
	});	

	$("#ville").keyup(function() {
		if ($("#ville").val() == "") {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/cross.png');
			$(".erreurVille").next(".erreur").show().text("Veuillez saisir votre ville");
			testVille = false; 
			$('#submit').attr('disabled', 'true');
		} else if (!$("#ville").val().match(/^([-A-zÀ-ž\s]){1,20}$/)) {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/cross.png');
			$(".erreurVille").next(".erreur").show().text("Caractère non valide");	
			testVille = false;
			$('#submit').attr('disabled', 'true');
		} else {
			$("#ville").css("border-color", "#00ff00"); 
			$("#ville").next(".erreurVille").show().attr('src', 'images/tick.png');
			$(".erreurVille").next(".erreur").hide().text("");
			testVille = true;
			if (pass && mail && ville && nom && prenom) { 
				$('#submit').removeAttr('disabled');
			}
		}
	});	

	$("#mail").keyup(function() {
		if ($("#mail").val() == "") {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/cross.png');
			$(".erreurEmail").next(".erreur").show().text("Veuillez saisir votre mail");
			testmail = false; 
			$('#submit').attr('disabled', 'true');
		} else if (!$("#mail").val().match(/^[-a-z_.]+\@[a-z]+\.[a-z]{2,3}$/)) {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/cross.png');
			$(".erreurEmail").next(".erreur").show().text("Adresse non valide");
			testmail = false;
			$('#submit').attr('disabled', 'true');
		} else {
			$("#mail").css("border-color", "#00ff00"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'images/tick.png');
			$(".erreurEmail").next(".erreur").hide().text("");
			testMail = true;
			if (pass && mail && ville && nom && prenom) { 
				$('#submit').removeAttr('disabled');
			}
		}
	});

	$('#password').keyup(function() {
		if (!$("#password").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/)) {
			$("#password").css("border-color", "#ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Mot de passe incorrect (6 caractères avec au moins une majuscule et un chiffre)");
		} else if ($('#password').val() == $('#password2').val()) {
			$('#password').css("border-color", "#00ff00");
			$('#password2').css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom) { 
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
			$('#submit').attr('disabled', 'true');
		}
	});

	$( '#password2' ).keyup(function() {
		if (!$("#password2").val().match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/)) {
			$("#password2").css("border-color", "#ff5b5b"); 
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/cross.png');
			$(".erreurMDP2").next(".erreur").show().text("Mot de passe incorrect (6 caractères avec au moins une majuscule et un chiffre)");
		} else if ($('#password').val() == $('#password2').val()) {
			$( '#password' ).css("border-color", "#00ff00");
			$( '#password2' ).css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom) { 
				$('#submit').removeAttr('disabled');
			}
		} else {
			$('#password').css("border-color", "ff5b5b");
			$('#password2').css("border-color", "ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'images/cross.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'images/cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$(".erreurMDP2").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$('#submit').attr('disabled', 'true');
			pass = false;
			$('#submit').attr('disabled', 'true');
		}
	});
});

$(function() {	
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
			$("#nom").next(".erreurNom").show().attr('src', 'cross.png');
			$(".erreurNom").next(".erreur").show().text("Veuillez entrer votre nom");
			testNom = false; 
		} else if (!$("#nom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#nom").css("border-color", "#ff5b5b"); 
			$("#nom").next(".erreurNom").show().attr('src', 'cross.png');
			$(".erreurNom").next(".erreur").show().text("Veuillez entrer un nom valide");
			testNom = false;
		} else {
			$("#nom").css("border-color", "#00ff00"); 
			$("#nom").next(".erreurNom").show().attr('src', 'tick.png');
			$(".erreurNom").next(".erreur").hide().text("");
			testNom = true;
		}
	});

	$("#prenom").keyup(function() {
		if ($("#prenom").val() == "") {
			$("#prenom").css("border-color", "#ff5b5b"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Veuillez entrer votre prénom");
			testPrenom = false; 
		} else if (!$("#prenom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#prenom").css("border-color", "#ff5b5b");
			$("#prenom").next(".erreurPrenom").show().attr('src', 'cross.png');
			$(".erreurPrenom").next(".erreur").show().text("Veuillez entrer un prénom valide");				
			testPrenom = false;
		} else {
			$("#prenom").css("border-color", "#00ff00"); 
			$("#prenom").next(".erreurPrenom").show().attr('src', 'tick.png');
			$(".erreurPrenom").next(".erreur").hide().text("");
			testPrenom = true;
		}
	});	

	$("#ville").keyup(function() {
		if ($("#ville").val() == "") {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'cross.png');
			$(".erreurVille").next(".erreur").show().text("Veuillez entrer votre ville");
			testVille = false; 
		} else if (!$("#ville").val().match(/^[-a-zA-Zéèç\s]+$/)) {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreurVille").show().attr('src', 'cross.png');
			$(".erreurVille").next(".erreur").show().text("Veuillez entrer une ville valide");	
			testVille = false;
		} else {
			$("#ville").css("border-color", "#00ff00"); 
			$("#ville").next(".erreurVille").show().attr('src', 'tick.png');
			$(".erreurVille").next(".erreur").hide().text("");
			testVille = true;
		}
	});	

	$("#dateN").keyup(function() {
		if ($("#dateN").val() == "") {
			$("#dateN").css("border-color", "#ff5b5b"); 
			$("#dateN").next(".erreurDN").show().attr('src', 'cross.png');
			$(".erreurDN").next(".erreur").show().text("Veuillez renseigner votre date de naissance");
			testDate = false; 
		} else {
			$("#dateN").css("border-color", "#00ff00"); 
			$("#dateN").next(".erreurDN").show().attr('src', 'tick.png');
			$(".erreurDN").next(".erreur").hide().text("");
			testDate = true;
		}
	});	
		
	$("#mail").keyup(function() {
		if ($("#mail").val() == "") {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'cross.png');
			$(".erreurEmail").next(".erreur").show().text("Veuillez entrer votre mail");
			testmail = false; 
		} else if (!$("#mail").val().match(/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/)) {
			$("#mail").css("border-color", "#ff5b5b"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'cross.png');
			$(".erreurEmail").next(".erreur").show().text("Veuillez entrer un mail valide");
			testmail = false;
		} else {
			$("#mail").css("border-color", "#00ff00"); 
			$("#mail").next(".erreurEmail").show().attr('src', 'tick.png');
			$(".erreurEmail").next(".erreur").hide().text("");
			testMail = true;
		}
	});

	$('#password').keyup(function() {
		if (!$("#password").val().match(/^[a-zA-Z0-9].{5,}$/)) {
			$("#password").css("border-color", "#ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Mot de passe trop petit");
		} else if ($('#password').val() == $('#password2').val()) {
			$('#password').css("border-color", "#00ff00");
			$('#password2').css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom && dateN) { 
				$('#submit').removeAttr('disabled');
			}
		} else {
			$('#password').css("border-color", "#ff5b5b");
			$('#password2').css("border-color", "#ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'cross.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'cross.png');
			$(".erreurMDP1").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$(".erreurMDP2").next(".erreur").show().text("Le mot de passe n'est pas identique");
			$('#submit').attr('disabled', 'true');
			pass = false;
		}
	});

	$( '#password2' ).keyup(function() {
		if (!$("#password2").val().match(/^[a-zA-Z0-9].{5,}$/)) {
			$("#password2").css("border-color", "#ff5b5b"); 
			$("#password2").next(".erreurMDP2").show().attr('src', 'cross.png');
			$(".erreurMDP2").next(".erreur").show().text("Mot de passe trop petit");
		} else if ($('#password').val() == $('#password2').val()) {
			$( '#password' ).css("border-color", "#00ff00");
			$( '#password2' ).css("border-color", "#00ff00");
			$("#password").next(".erreurMDP1").show().attr('src', 'tick.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'tick.png');
			$(".erreurMDP1").next(".erreur").hide().text("");
			$(".erreurMDP2").next(".erreur").hide().text("");
			pass = true;
			if (pass && mail && ville && nom && prenom && dateN) { 
				$('#submit').removeAttr('disabled');
			}
		} else {
			$('#password').css("border-color", "ff5b5b");
			$('#password2').css("border-color", "ff5b5b");
			$("#password").next(".erreurMDP1").show().attr('src', 'cross.png');
			$("#password2").next(".erreurMDP2").show().attr('src', 'cross.png');
			$(".erreurMDP2").next(".erreur").hide().text("Le mot de passe n'est pas identique");
			$('#submit').attr('disabled', 'true');
			pass = false;
		}
	});
});
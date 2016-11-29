$(function() {	
	var testNom = false;
	var testPrenom = false;
	
	var testVille = false;
	var testDate = false;
	
	var testMail = false;
	
	var testMdp1 = false;
	var testMdp2 = false;
	
	function valider() {
		if (testNom && testPrenom && testMail && testVille
				&& testDate && testMdp1 && testMdp2) {
			$("#envoyer").fadeIn(); 
		} else {
			$("#envoyer").fadeOut(); 
		}
	}
	
	$("#envoyer").fadeOut(); 

	$("#nom").keyup(function() {
		if ($("#nom").val() == "") {
			$("#nom").css("border-color", "#ff5b5b"); 
			$("#nom").next(".erreur").show().text("Veuillez entrer votre nom");
			testNom = false; 
			valider();
		} else if (!$("#nom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#nom").css("border-color", "#ff5b5b"); 
			$("#nom").next(".erreur").show().text("Veuillez entrer un nom valide");	
			testNom = false;
		} else {
			$("#nom").css("border-color", "#00ff00"); 
			$("#nom").next(".erreur").hide().text("");
			testNom = true;
			valider();
		}
	});
	
	$("#prenom").keyup(function() {
		if ($("#prenom").val() == "") {
			$("#prenom").css("border-color", "#ff5b5b"); 
			$("#prenom").next(".erreur").show().text("Veuillez entrer votre prénom");
			testPrenom = false; 
			valider();
		} else if (!$("#prenom").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#prenom").css("border-color", "#ff5b5b"); 
			$("#prenom").next(".erreur").show().text("Veuillez entrer un prénom valide");	
			testPrenom = false;
		} else {
			$("#prenom").css("border-color", "#00ff00"); 
			$("#prenom").next(".erreur").hide().text("");
			testPrenom = true;
			valider();
		}
	});	
	
	$("#ville").keyup(function() {
		if ($("#ville").val() == "") {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreur").show().text("Veuillez entrer votre ville");
			testVille = false; 
			valider();
		} else if (!$("#ville").val().match(/^[-a-zA-Zéèç]+$/)) {
			$("#ville").css("border-color", "#ff5b5b"); 
			$("#ville").next(".erreur").show().text("Veuillez entrer une ville valide");	
			testVille = false;
		} else {
			$("#ville").css("border-color", "#00ff00"); 
			$("#ville").next(".erreur").hide().text("");
			testVille = true;
			valider();
		}
	});	
	
	$("#dateNaissance").keyup(function() {
		if ($("#dateNaissance").val() == "") {
			$("#dateNaissance").css("border-color", "#ff5b5b"); 
			$("#dateNaissance").next(".erreur").show().text("Veuillez renseigner votre date de naissance");
			testDate = false; 
			valider();
		} else {
			$("#dateNaissance").css("border-color", "#00ff00"); 
			$("#dateNaissance").next(".erreur").hide().text("");
			testDate = true;
			valider();
		}
	});	
		
	$("#mailI").keyup(function() {
		if ($("#mailI").val() == "") {
			$("#mailI").css("border-color", "#ff5b5b"); 
			$("#mailI").next(".erreur").show().text("Veuillez entrer votre mail");
			testmail = false; 
			valider();
		} else if (!$("#mailI").val().match(/^[-a-zA-Z_.]+\@[a-z]+(.)(fr|com)$/)) {
			$("#mailI").css("border-color", "#ff5b5b"); 
			$("#mailI").next(".erreur").show().text("Veuillez entrer un mail valide");	
			testmail = false;
		} else {
			$("#mailI").css("border-color", "#00ff00"); 
			$("#mailI").next(".erreur").hide().text("");
			testMail = true;
			valider();
		}
	});
	
	$("#mdp1").keyup(function() {	
		if ($("#mdp1").val() == "") {
			$("#mdp1").css("border-color", "#ff5b5b"); 
			$("#mdp1").next(".erreur").show().text("Veuillez entrer un mot de passe");
			testMdp1 = false;
			$("#mdp2").css("border-color", "#ff5b5b"); 
			$("#mdp2").next(".erreur").show().text("Mot de passe non identique au premier");
			testMdp2 = false;
			valider();
		} else if (!$("#mdp1").val().match(/^[a-zA-Z0-9].{5,12}$/)) {
			$("#mdp1").css("border-color", "#ff5b5b"); 
			$("#mdp1").next(".erreur").show().text("Mot de passe trop petit");	
			testMdp1 = false;
			$("#mdp2").css("border-color", "#ff5b5b"); 
			$("#mdp2").next(".erreur").show().text("Mot de passe non identique au premier");
			testMdp2 = false;
			valider();
		} else {
			$("#mdp1").css("border-color", "#00ff00"); 
			$("#mdp1").next(".erreur").hide().text("");
			testMdp1 = true;
			if ($("#mdp2").val() == $("#mdp1").val()) {
				$("#mdp2").css("border-color", "#00ff00"); 
				$("#mdp2").next(".erreur").hide().text("");
				testMdp2 = true;
			}	
			valider();
		}
	});
	
	$("#mdp2").keyup(function() {	
		if ($("#mdp2").val() != $("#mdp1").val() || $("#mdp2").val() == "") {
			$("#mdp2").css("border-color", "#ff5b5b"); 
			$("#mdp2").next(".erreur").show().text("Mot de passe non identique au premier");
			testMdp2 = false;
			valider();
		} else if ($("#mdp2").val() != "") {
			$("#mdp2").css("border-color", "#00ff00"); 
			$("#mdp2").next(".erreur").hide().text("");
			testMdp2 = true;
			valider();
		}
	});		
});

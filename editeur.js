function commande(nom, argument){
    if (typeof argument === 'undefined') {
        argument = '';
    }

	switch(nom){
		case "createLink":
			argument = prompt("Quelle est l'adresse du lien ?");
		break;
		case "insertImage":
			argument = prompt("Quelle est l'adresse de l'image ?");
		break;
	}
	
	if(document.queryCommandValue("bold")){
		document.getElementById("bouton_bold").className = "actif";
	}
	else{
		document.getElementById("bouton_bold").className = "";
	}
	
	document.execCommand(nom, false, argument);
}

function resultat(){
	document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
}


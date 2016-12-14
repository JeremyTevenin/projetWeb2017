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
		case "form":
			argument = prompt("Quelle est la formule ?");
		break;
	}
	
	if(document.queryCommandValue("bold")){
		document.getElementById("bouton_bold").className = "actif";
	}
	else{
		document.getElementById("bouton_bold").className = "noactif";
	}
	
	document.execCommand(nom, false, argument);
}

function resultat(){
	document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
}

function insertForm(){
  
	var argument = prompt("Quelle est la formule ?");

	var oContent;
	
	var oPre = document.createElement("test");
	oDoc.contentEditable = false;
	oPre.id = "sourceText";
	oPre.contentEditable = true;
	oPre.appendChild(oContent);
	oDoc.appendChild(oPre);

	oDoc.focus();
	
}

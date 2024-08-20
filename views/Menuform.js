let NomMenu = document.getElementById("NomMenu");
let Description = document.getElementById("Description");
let Prix = document.getElementById("Prix");
let Promotion = document.getElementById("Promotion");
let MenuEvent = document.getElementById("MenuEvent");
let type = document.getElementById("type");


var letters = /^[A-Za-z]+$/;


var img=document.forms["inscription"]["PhotoMenu"];
var validExt=["jpeg","jpg","png"];


function validateFileType(){
if (img.value!=""){
    var img_ext=img.value.substring(img.value.lastIndexOf('.')+1);
    var result=validExt.includes(img_ext);
    if(result==false){
        document.getElementById("fileEr").innerHTML =
        "Only jpg/jpeg and png files are allowed!";
        return false;
    }
    else{
        document.getElementById("fileEr").innerHTML =
    "<p style='color:green'> Correct </p>";
    return true;
    }
}
}













function nameValidation() {
    if (NomMenu.value.length < 3) {
      NomMenuError = " Le nom doit compter au minimum 3 caractères.";
        document.getElementById("nomEr").innerHTML = NomMenuError;

        return false;
    }
    if (!NomMenu.value.match(letters)) {
      NomMenuError2 = "Veuillez entrer un nom valid ! (seulement des lettres)";
      NomMenuValid2 = false;
        document.getElementById("nomEr").innerHTML = NomMenuError2;
        return false;
    }
    document.getElementById("nomEr").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}



function DescriptionValidation() {
  if (Description.value.length < 5) {
    DescriptionError = " La Description doit compter au minimum 5 caractères.";
      document.getElementById("DescriptionEr").innerHTML = DescriptionError;

      return false;
  }
  
  document.getElementById("DescriptionEr").innerHTML =
      "<p style='color:green'> Correct </p>";

  return true;
}

function PrixValidation() {
  if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PrixEr").innerHTML =
            "Le Prix ne doit pas contenir des lettres";

            return flase;
   
    }
  document.getElementById("PrixEr").innerHTML =
      "<p style='color:green'> Correct </p>";

  return true;
}


function PromotionValidation() {
  if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PromotionEr").innerHTML =
            "Le Promotion ne doit pas contenir des lettres";

            return flase;
   
    }
  document.getElementById("PromotionEr").innerHTML =
      "<p style='color:green'> Correct </p>";

  return true;
}


/*
function typeValidation() {
  if (type.value==0) {
    typeError = " select a type plz.";
      document.getElementById("typeEr").innerHTML = typeError;

      return false;
  }

  document.getElementById("typeEr").innerHTML =
      "<p style='color:green'> Correct </p>";

  return true;
 
}*/



document.forms["inscription"].addEventListener("submit", function (e) {
    var inputs = document.forms["inscription"];
    let ids = [
        "erreur",
        "nomEr",
        "DescriptionEr",
        "typeEr",
        "PrixEr",
        "MenuEventEr",
        "PromotionEr",
        "fileEr",
        "erreur",
    ];

    ids.map((id) => (document.getElementById(id).innerHTML = "")); // reinitialiser l'affichage des erreurs

    let errors = false;

    //Traitement cas par cas
    if (  NomMenu.value.length < 3) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Le nom doit compter au minimum 3 caractères.";
    } else if (!NomMenu.value.match(letters)) {
        errors = false;
        document.getElementById("nomEr").innerHTML =
            "Veuillez entrer un nom valid ! (seulement des lettres)";
    } else {
        errors = true;
    }
     //Traitement cas par cas
    if (Description.value.length < 5) {
        errors = false;
        document.getElementById("DescriptionEr").innerHTML =
            "La Description doit compter au minimum 5 caractères";
    } else {
        errors = true;
    }
 //Traitement cas par cas
    if (isNaN(Prix.value)) {
        errors = false;
        document.getElementById("PrixEr").innerHTML =
            "Le Prix ne doit pas contenir des lettres";
    } else {
        errors = true;
    }

/*
  
    if (type.value== 0) {
      errors = false;
      document.getElementById("typeEr").innerHTML =
          "La type select one";
  } else {
      errors = true;
  }*/



    //Traitement générique
    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errors = false;
            document.getElementById("erreur").innerHTML =
            "<p style='color:red'> Veuillez renseigner tous les champs </p>";
                
        }
    }

    if (errors === false) {
        e.preventDefault();
    } else {
        alert("formulaire envoyé");
    }
});

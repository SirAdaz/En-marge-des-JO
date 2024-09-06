const formUserNameEl = document.getElementById("registration_form_userName");
const formUserlastNameEl = document.getElementById("registration_form_userLastname");
const formUseremailEl = document.getElementById("registration_form_email");
const formUserTelEl = document.getElementById("registration_form_userTel");
const formUserAdressEl = document.getElementById("registration_form_userAdress");
const formUserAssoTelEl = document.getElementById("registration_form_userAssoTel");
const formUserAssoNameEl = document.getElementById("registration_form_userAssoName");
const formUserAssoAdressEl = document.getElementById("registration_form_userAssoAdress");
const formUserAssoSportEl = document.getElementById("registration_form_userAssoSport");
const formUserAssoTresorierEl = document.getElementById("registration_form_userTresorier");
const formUserAssoPresidentEl = document.getElementById("registration_form_userPresident");
const formUserpasswordEl = document.getElementById("registration_form_plainPassword");
const formUserconfirmPasswordEl = document.getElementById("confirmPassword");
const form = document.getElementById("signupForm");


// constante pour vérifier si le champ est vide ou non
const isRequired = value => value === '' ? false : true;

const isBetween =(length,min,max)=>length<min || length>max ? false : true;

const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isTelValid = (Tel) => {
    const re = new RegExp("^(0|(\\+33)|(0033))[1-9][0-9]{8}");
    return re.test(Tel);
};

const showError = (input, message) => {
    // reprendre le form-field element
    const formField = input.parentElement;
    // ajouter la class error et supprimer la class success
    formField.classList.remove('success');
    formField.classList.add('error');
   
    // afficher le message d'erreur
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // reprendre le form-field element
    const formField = input.parentElement;
   
    // ajouter la class success et supprimer la class error
    formField.classList.remove('error');
    formField.classList.add('success');
   
    // cacher le message d'erreur
    const error = formField.querySelector('small');
    error.textContent = '';
}

 //validation du nom
 const checkFormUserName = () => {
    let valid = false;
    const min = 3,
    max = 25;
    const formUserName = formUserNameEl.value.trim();
   
    if (!isRequired(formUserName)) {
        showError(formUserNameEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserName.length, min, max)) {
        showError(formUserNameEl, `le nom doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(formUserNameEl);
        valid = true;
    }
    return valid;
}

const checkFormUseremail = () => {
    let valid = false;
    const formUseremail = formUseremailEl.value.trim();
    if (!isRequired(formUseremail)) {
        showError(formUseremailEl, 'le champ ne peut être vide');
    } else if (!isEmailValid(formUseremail)) {
        showError(formUseremailEl, "L'adresse mail ne peut être valide")
    } else {
        showSuccess(formUseremailEl);
        valid = true;
    }
    return valid;
}

const checkFormUserlastName = () => {
    let valid = false;
    const min = 3,
    max = 25;
    const formUserlastName = formUserlastNameEl.value.trim();
   
    if (!isRequired(formUserlastName)) {
        showError(formUserlastNameEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserlastName.length, min, max)) {
        showError(formUserlastNameEl, `le nom doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(formUserlastNameEl);
        valid = true;
    }
    return valid;
}

//validation du mot de passe
const checkFormUserpassword= () => {
    let valid = false;
   
    const formUserpassword = formUserpasswordEl.value.trim();
   
    if (!isRequired(formUserpassword)) {
        showError(formUserpasswordEl, 'le mot de passe ne peut être vide');
    } else if (!isPasswordSecure(formUserpassword)) {
        showError(formUserpasswordEl, 'Le mot de passe doit avoir au moins 8 caractères, il doit comporter une minuscule,une majuscule, un chiffre et un caractère spécial parmi les suivants (!@#$%^&*)');
    } else {
        showSuccess(formUserpasswordEl);
        valid = true;
    }
   
    return valid;
};

 //validation de la confirmation du mot de passe
 const checkFormUserconfirmPassword = () => {
    let valid = false;
   
    const formUserconfirmPassword = formUserconfirmPasswordEl.value.trim();
    const formUserpassword = formUserpasswordEl.value.trim();
   
    if (!isRequired(formUserconfirmPassword)) {
        showError(formUserconfirmPasswordEl, 'Entrez votre mot de passe');
    } else if (formUserpassword !== formUserconfirmPassword) {
        showError(formUserconfirmPasswordEl, "Votre mot de passe et la confirmation n'est pas bonne");
    } else {
        showSuccess(formUserconfirmPasswordEl);
        valid = true;
    }
   
    return valid;
};

const checkFormUsertel = () => {
    let valid = false;
    const formUserTel = formUserTelEl.value.trim();
    if (!isRequired(formUserTel)) {
        showError(formUserTelEl, 'le champ ne peut être vide');
    } else if (!isTelValid(formUserTel)) {
        showError(formUserTelEl, "le numéro ne peut être valide")
    } else {
        showSuccess(formUserTelEl);
        valid = true;
    }
    return valid;
}

const checkFormUserAdress = () => {
    let valid = false;
    const min = 10;
    const formUserAdress = formUserAdressEl.value.trim();
   
    if (!isRequired(formUserAdress)) {
        showError(formUserAdressEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAdress.length, min)) {
        showError(formUserAdressEl, `l'adresse doit avoir au moins ${min} caractères.`)
    } else {
        showSuccess(formUserAdressEl);
        valid = true;
    }
}


const checkFormUserAssoTel = () => {
    let valid = false;
    const formUserAssoTel = formUserAssoTelEl.value.trim();
    if (!isRequired(formUserAssoTel)) {
        showError(formUserAssoTelEl, 'le champ ne peut être vide');
    } else if (!isTelValid(formUserAssoTel)) {
        showError(formUserAssoTelEl, "le numéro ne peut être valide")
    } else {
        showSuccess(formUserAssoTelEl);
        valid = true;
    }
    return valid;
}

const checkFormUserAssoName = () => {
    let valid = false;
    const min = 3,
    max = 25;
    const formUserAssoName = formUserAssoNameEl.value.trim();
   
    if (!isRequired(formUserAssoName)) {
        showError(formUserAssoNameEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAssoName.length, min, max)) {
        showError(formUserAssoNameEl, `le nom doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(formUserAssoNameEl);
        valid = true;
    }
}

const checkFormUserAssoAdress = () => {
    let valid = false;
    const min = 10;
    const formUserAssoAdress = formUserAssoAdressEl.value.trim();
   
    if (!isRequired(formUserAssoAdress)) {
        showError(formUserAssoAdressEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAssoAdress.length, min)) {
        showError(formUserAssoAdressEl, `l'adresse doit avoir au moins ${min} caractères.`)
    } else {
        showSuccess(formUserAssoAdressEl);
        valid = true;
    }
}

const checkFormUserAssoSport = () => {
    let valid = false;
    const min = 10;
    const formUserAssoSport = formUserAssoSportEl.value.trim();
   
    if (!isRequired(formUserAssoSport)) {
        showError(formUserAssoSportEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAssoSport.length, min)) {
        showError(formUserAssoSportEl, `l'adresse doit avoir au moins ${min} caractères.`)
    } else {
        showSuccess(formUserAssoSportEl);
        valid = true;
    }
}

const checkFormUserAssoTresorier = () => {
    let valid = false;
    const min = 3,
    max = 25;
    const formUserAssoTresorier = formUserAssoTresorierEl.value.trim();
   
    if (!isRequired(formUserAssoTresorier)) {
        showError(formUserAssoTresorierEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAssoTresorier.length, min, max)) {
        showError(formUserAssoTresorierEl, `le nom doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(formUserAssoTresorierEl);
        valid = true;
    }
}

const checkFormUserAssoPresident = () => {
    let valid = false;
    const min = 3,
    max = 25;
    const formUserAssoPresident = formUserAssoPresidentEl.value.trim();
   
    if (!isRequired(formUserAssoPresident)) {
        showError(formUserAssoPresidentEl, 'Le champ ne peut être vide');
    } else if (!isBetween(formUserAssoPresident.length, min, max)) {
        showError(formUserAssoPresidentEl, `Le nom doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(formUserAssoPresidentEl);
        valid = true;
    }
}

form.addEventListener('submit', function(e){ 
    e.preventDefault();
    
    let isformUserNameEl = checkFormUserName();
    let isFormUserlastNameEl = checkFormUserlastName();
    let isFormUseremailEl = checkFormUseremail();
    let isFormUserTelEl = checkFormUsertel();
    let isFormUserAdressEl = checkFormUserAdress();
    let isFormUserAssoTelEl  = checkFormUserAssoTel();
    let isFormUserAssoNameEl = checkFormUserAssoName();
    let isFormUserAssoAdressEl = checkFormUserAssoAdress();
    let isFormUserAssoSportEl = checkFormUserAssoSport();
    let isFormUserAssoTresorierEl = checkFormUserAssoTresorier();
    let isFormUserAssoPresidentEl = checkFormUserAssoPresident();
    let isFormUserpasswordEl= checkFormUserpassword();
    let isFormUserconfirmPasswordEl = checkFormUserconfirmPassword();

    let isFormValid = isformUserNameEl && 
                      isFormUserlastNameEl && 
                      isFormUseremailEl && 
                      isFormUserTelEl && 
                      isFormUserAdressEl && 
                      isFormUserAssoTelEl && 
                      isFormUserAssoNameEl && 
                      isFormUserAssoAdressEl && 
                      isFormUserAssoSportEl && 
                      isFormUserAssoTresorierEl && 
                      isFormUserAssoPresidentEl && 
                      isFormUserpasswordEl && 
                      isFormUserconfirmPasswordEl;
                      
    console.log(isFormValid);
    if (!isFormValid) {
        console.log("Le formulaire contient des erreurs et ne sera pas soumis.");
    } else {
        // Si toutes les validations passent, le formulaire peut être soumis
        console.log("Le formulaire est valide et sera soumis.");
        form.submit();
    }
});


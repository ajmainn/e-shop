function validateupdate_profileForm(upform) {
    let isValid = true;

   
  
   
    if (!upform.address.value) {
        displayError('addressError', "*Address is required");
        isValid = false;
    }

   
    if (!upform.contact.value) {
        displayError('contactError', "*Contact Number is required");
        isValid = false;
    }

   
    

   
    if (!upform.email.value) {
        displayError('emailError', "*Email is required");
        isValid = false;
    }

   
   

    
    if (!upform.password.value) {
        displayError('passwordError', "*Password is required");
        isValid = false;
    }

   
   
    return isValid;
}

function displayError(errorElementId, message) {
    const errorElement = document.getElementById(errorElementId);
    if (errorElement) {
        errorElement.innerHTML = message;
        errorElement.style.color="red"
    }
}
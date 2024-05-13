function validateSignupForm(form) {
    let isValid = true;


   
    if (!form.address.value) {
        displayError('addressError', "*Address is required");
        isValid = false;
    }

   
    if (!form.contact.value) {
        displayError('contactError', "*Contact Number is required");
        isValid = false;
    }

    if (!form.email.value) {
        displayError('emailError', "*Email is required");
        isValid = false;
    }

   
    if (!form.username.value) {
        displayError('usernameError', "*Username is required");
        isValid = false;
    }

    
    if (!form.password.value) {
        displayError('passwordError', "*Password is required");
        isValid = false;
    }

   
    if ( !form.confirmPassword.value||form.password.value !== form.confirmPassword.value) {
        displayError('confirmPasswordError', "*Passwords do not match");
        isValid = false;
    }

    
    if (!form.securityCode.value) {
        displayError('securityCodeError', "*Security Code is required");
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


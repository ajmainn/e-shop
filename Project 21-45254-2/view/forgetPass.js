function validateforgetPassForm(fpform) {
    let isValid = true;

    if (!fpform.username.value) {
        displayError('usernameError', "*Username is required");
        isValid = false;
    }

    
    if (!fpform.newPassword.value) {
        displayError('newPasswordError', "*Password is required");
        isValid = false;
    }

    
    if (!fpform.securityCode.value) {
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
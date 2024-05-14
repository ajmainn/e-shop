function validateLoginForm(lform) {
    let isValid = true;

   

    // Validate Username
    if (!lform.username.value) {
        displayError('usernameError', "*Username is required");
        isValid = false;
    }

    // Validate Password
    if (!lform.password.value) {
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



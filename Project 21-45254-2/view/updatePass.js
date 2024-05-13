function  validateupdatePassForm(npform) {
    let isValid = true;

    
    if (!npform.currentPassword.value) {
        displayError('currentPasswordError', "*Old Password is required");
        isValid = false;
    }
      
    if (!npform.newPassword.value) {
        displayError('newPasswordError', "*New Password is required");
        isValid = false;
    }
   
    if ( !npform.confirmNewPassword.value||npform.newPasswordassword.value !== npform.confirmNewPassword.value) {
        displayError('confirmNewPasswordError', "*Passwords do not match");
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
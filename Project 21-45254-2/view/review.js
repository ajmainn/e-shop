function validateFeedbackForm(form) {
    let isValid = true;

    // Clear previous error message
    clearErrorMessage('feedbackError');

    // Validate Feedback Message
    if (!form.message.value.trim()) {
        displayError('feedbackError', "*Feedback is required");
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

function clearErrorMessage(errorElementId) {
    const errorElement = document.getElementById(errorElementId);
    if (errorElement) {
        errorElement.innerHTML = '';
    }
}

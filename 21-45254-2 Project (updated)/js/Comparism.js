function validateComparisonForm() {
    // Reset any previous error messages
    var errorMessages = document.getElementById("errorMessages");
    errorMessages.innerHTML = '';

    // Validate product names
    var product1 = document.getElementById("product1").value.trim();
    var product2 = document.getElementById("product2").value.trim();

    if (product1 === '' || product2 === '') {
        // Display error message
        errorMessages.innerHTML = 'Please fill up the form properly.';
        return false; // Prevent form submission
    }

    return true; // Form is valid, allow submission
}

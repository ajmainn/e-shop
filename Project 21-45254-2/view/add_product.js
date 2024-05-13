function validatemenuForm(mform) {
    let isValid = true;

    // Clear previous error messages
    clearErrorMessage('brandError');
    clearErrorMessage('nameError');
    clearErrorMessage('descriptionError');
    clearErrorMessage('priceError');

    if (!mform.brand.value.trim()) {
        displayError('brandError', "*Brand is required");
        isValid = false;
    }

    // Validate Name
    if (!mform.name.value.trim()) {
        displayError('nameError', "*Name is required");
        isValid = false;
    }

    // Validate Description
    if (!mform.description.value.trim()) {
        displayError('descriptionError', "*Description is required");
        isValid = false;
    }

    // Validate Price
    if (!mform.price.value || isNaN(mform.price.value) || parseFloat(mform.price.value) <= 0) {
        displayError('priceError', "*Valid price is required");
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

function postMenuData() {
    
    var brand = document.getElementById('brand').value;
    var name = document.getElementById('name').value;
    var description = document.getElementById('description').value;
    var price = document.getElementById('price').value;

   
    var formData = new FormData();
    formData.append('brand', brand);
    formData.append('name', name);
    formData.append('description', description);
    formData.append('price', price);

    var xhttp = new XMLHttpRequest();

   
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            console.log(this.responseText);
        }
    };

   
    xhttp.onerror = function() {
        
        console.error('Request failed');
    };

    xhttp.open('POST', 'process_add_menu.php', true);
    xhttp.send(formData);
}

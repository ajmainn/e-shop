
function fetch() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            const data = JSON.parse(this.responseText);

           
            if (data.error) {
                document.getElementById("data").innerHTML = data.error;
            } else {
                
                let profileHtml = '<ul>' +
                                  '<li><strong>Username:</strong> ' + data.username + '</li>' +
                                  '<li><strong>Email:</strong> ' + data.email + '</li>' +
                                  '<li><strong>Address:</strong> ' + data.address + '</li>' +
                                  '<li><strong>Contact Number:</strong> ' + data.phone + '</li>' +
                                  '</ul>';
                document.getElementById("data").innerHTML = profileHtml;
            }
        }
    };
    xhttp.open("GET", "getProfileData.php");
    xhttp.send();
}

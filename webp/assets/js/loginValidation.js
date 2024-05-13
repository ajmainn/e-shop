function loginValidation(){
    var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
 

  console.log({username, password})
  // Reset previous error messages

  document.getElementById("password-error").textContent = "";
  document.getElementById("username-error").textContent = "";
  


  var isValid = true;

  // Validate email
  if (username.trim() === "") {
    document.getElementById("username-error").textContent =
      "Username must be filled out!";
    isValid = false;
  }

  // Validate password
  if (password.trim() === "") {
    document.getElementById("password-error").textContent =
      "Password must be filled out";
    isValid = false;
  }
    return isValid;
}
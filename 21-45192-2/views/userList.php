

<!DOCTYPE html>

<head>

    <style>
        div {
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Profile Information</title>
</head>

<body>

    <div class="dashboard-container">
        <?php include('./LeftNav.php') ?>

        <div class="main-content">
            <h2 align="center">User List</h2>
            <table id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Table body will be filled dynamically using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <div id="resetPasswordModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.5);">
        <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 600px;">
            <!-- <span onclick="closeModal()" style="color: #888; float: right; font-size: 28px; font-weight: bold; cursor: pointer;">&times;</span> -->
            <h2 style="margin-bottom: 20px;">Reset Password</h2>
            <!-- Input field for new password -->
            <form onsubmit="submitResetPasswordForm(event)" id="modal-form">
                <div style="margin-bottom: 20px;">
                    <label for="newPassword" style="display: block; margin-bottom: 5px;">New Password:</label>
                    <input type="password" id="newPassword" style="padding: 5px; width: 100%;">
                </div>
                <input type="hidden" id="userId" name="userId">

                <!-- Button to reset password -->
                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">Reset</button>
            </form>
        </div>
    </div>


    <script>
        function fetchuserList() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/userController.php/get-alluser", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var userList = JSON.parse(xhr.responseText);
                    renderuserList(userList);
                }
            };
            xhr.send();
        }


        function renderuserList(userList) {
            var tableBody = document.querySelector('#userTable tbody');
            userList.forEach(function(user) {
                var row = tableBody.insertRow();
                row.insertCell().textContent = user.uid;
                row.insertCell().textContent = user.name;
                row.insertCell().textContent = user.username;
                row.insertCell().textContent = user.email;
                row.insertCell().textContent = user.address;
                row.insertCell().textContent = user.phone;
                var statusCell = row.insertCell();


        


                var deleteUserBtn = document.createElement("button");
                deleteUserBtn.textContent = "Delete";
                deleteUserBtn.addEventListener("click", function() {
                    deleteUser(user.uid);
                });

                // Create a button to reset password
                var resetPasswordButton = document.createElement("button");
                resetPasswordButton.textContent = "Reset Password";
                resetPasswordButton.addEventListener("click", function() {
                    openResetPasswordModal(user.uid);
                });

                
                statusCell.appendChild(deleteUserBtn);
                statusCell.appendChild(resetPasswordButton);


            });
        }




        //delete user
        function deleteUser(userId) {
            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open('POST', '../controllers/userController.php/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {

                    window.location.reload();
                    alert("Deleted Successfully ");
                } else {
                    // If the request failed
                    alert("Failed to Delete");
                }
            };

            // Define the error handling function
            xhr.onerror = function() {
                console.error("Error:", xhr.statusText);
            };

            // Send the request with the JSON payload
            xhr.send(JSON.stringify({
                userId: userId
            }));
        }

        function openModal() {
            document.getElementById('resetPasswordModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('resetPasswordModal').style.display = 'none';
        }

        function openResetPasswordModal(userId) {
            openModal()

            document.getElementById('userId').value = userId;

        }

        function submitResetPasswordForm(e) {
            e.preventDefault(); // Prevent form submission

            // Get the user ID and new password from the form
            var userId = document.getElementById('userId').value;
            var newPassword = document.getElementById('newPassword').value;


            var xhr = new XMLHttpRequest();

            // Configure the request
            xhr.open('POST', '../controllers/userController.php/change-password', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            // Define the callback function to handle the response
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {

                    closeModal();
                    alert("Password changed successfully");
                } else {
                    // If the request failed
                    alert("Failed to change approval status");
                }
            };

            // Define the error handling function
            xhr.onerror = function() {
                console.error("Error:", xhr.statusText);
            };

            // Send the request with the JSON payload
            xhr.send(JSON.stringify({
                userId: parseInt(userId),
                password: newPassword
            }));
        }



        window.onload = function() {
            fetchuserList();
        };
    </script>

</body>

</html>
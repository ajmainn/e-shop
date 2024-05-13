<?php
// session_start();
// require "../model/db_connect.php";

// if (!isset($_SESSION['user_id'])) {
//     header('Location: ../view/login.php');
//     exit;    
// }

// $sql = "SELECT id, fullName, address, phone, email, gender FROM employee";
// $result = $conn->query($sql);


?>

<!DOCTYPE html>

<head>
    <style>
        .form-control {
            display: flex;
            flex-direction: column;
            gap: 10px 0;
        }

        .task-form {
            width: 500px;
            margin: 0 auto;
        }
    </style>
    <title>Profile Information</title>
</head>

<body>

    <div class="dashboard-container">
        <?php include('./LeftNav.php') ?>

        <div class="main-content">
            <form onsubmit="addTask(event)" class="task-form">
                <div class="form-control" style="margin-bottom: 20px;">
                    <label for="desc">Task Description</label>
                    <textarea rows="4" cols="50" name="desc" id="desc"></textarea>
                    <p class="error" id="derror"></p>
                </div>

                <div class="form-control" style="margin-bottom: 25px;">
                    <label for="empId">Employee Id</label>
                    <input type="number" name="empId" id="employeeId">
                    <p class="error" id="piderror"></p>
                </div>

                <button type="submit" class="btn">Assign Task</button>
            </form>
        </div>
    </div>




    <script>
        function addTask(e) {
            e.preventDefault(); // Prevent form submission

            // Get the user ID and new password from the form
            var desc = document.getElementById('desc').value;
            var empId = document.getElementById('employeeId').value;



            let isValid = true;

            if (desc.length < 5 || desc.length == 0) {
                isValid = false;
                displayError("derror", "Description is require!")
            }

            if (!empId) {
                isValid = false;
                displayError("piderror", "Employee Id is required!");
            }

            if (isValid) {
                var xhr = new XMLHttpRequest();

                // Configure the request
                xhr.open('POST', '../controllers/TaskController.php/add-task', true);
                xhr.setRequestHeader('Content-Type', 'application/json');

                // Define the callback function to handle the response
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        document.getElementById('desc').value = "";
                        document.getElementById('employeeId').value = "";
                        alert("Task added successfully");
                    } else {
                        // If the request failed
                        alert("Failed to add task");
                    }
                };

                // Define the error handling function
                xhr.onerror = function() {
                    console.error("Error:", xhr.statusText);
                };

                // Send the request with the JSON payload
                xhr.send(JSON.stringify({
                    description: desc,
                    employeeId: empId
                }));
            } else {
                return false;
            }




        }

        function displayError(errorElementId, message) {
            const errorElement = document.getElementById(errorElementId);
            errorElement.style.display = "block"
            if (errorElement) {
                errorElement.innerHTML = message;
            }
        }
    </script>

</body>

</html>
<?php
// session_start();
// require "../model/db_connect.php";

// if (!isset($_SESSION['user_id'])) {
//     header('Location: ../view/login.php');
//     exit;    
// }



?>

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
            <h2>Employee List</h2>
            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Salary</th>
                        <th>Approval Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <div id="resetPasswordModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.5);">
        <div style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 600px;">
            <h2 style="margin-bottom: 20px;">Reset Password</h2>
            <form onsubmit="submitResetPasswordForm(event)" id="modal-form">
                <div style="margin-bottom: 20px;">
                    <label for="newPassword" style="display: block; margin-bottom: 5px;">New Password:</label>
                    <input type="password" id="newPassword" style="padding: 5px; width: 100%;">
                </div>
                <input type="hidden" id="userId" name="userId">
                <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">Reset</button>
            </form>
        </div>
    </div>


    <script>
        function fetchEmployeeList() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/EmployeeController.php/get-allemp", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var employeeList = JSON.parse(xhr.responseText);
                    renderEmployeeList(employeeList);
                }
            };
            xhr.send();
        }


        function renderEmployeeList(employeeList) {
            var tableBody = document.querySelector('#employeeTable tbody');
            employeeList.forEach(function(employee) {
                var row = tableBody.insertRow();
                row.insertCell().textContent = employee.id;
                row.insertCell().textContent = employee.fullName;
                row.insertCell().textContent = employee.email;
                row.insertCell().textContent = employee.phone;
                row.insertCell().textContent = employee.address;
                row.insertCell().textContent = employee.gender;
                row.insertCell().textContent = employee.salary;
                row.insertCell().textContent = employee.approval_status === "1" ? "Approved" : "Not Approved";
                var statusCell = row.insertCell();


                var changeStatusButton = document.createElement("button");
                changeStatusButton.textContent = "Change Status";
                changeStatusButton.addEventListener("click", function() {
                    changeApprovalStatus(employee.id, employee.approval_status);
                });


                var deleteUserBtn = document.createElement("button");
                deleteUserBtn.textContent = "Delete";
                deleteUserBtn.addEventListener("click", function() {
                    deleteUser(employee.id);
                });

                var resetPasswordButton = document.createElement("button");
                resetPasswordButton.textContent = "Reset Password";
                resetPasswordButton.addEventListener("click", function() {
                    openResetPasswordModal(employee.id);
                });

                statusCell.appendChild(changeStatusButton);
                statusCell.appendChild(deleteUserBtn);
                statusCell.appendChild(resetPasswordButton);


            });
        }



        function changeApprovalStatus(employeeId, approval_status) {
            var xhr = new XMLHttpRequest();

            xhr.open('POST', '../controllers/EmployeeController.php/change-status', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {

                    window.location.reload();
                    alert("Approval status changed successfully");
                } else {
                    alert("Failed to change approval status");
                }
            };

            xhr.onerror = function() {
                console.error("Error:", xhr.statusText);
            };

            xhr.send(JSON.stringify({
                employeeId: employeeId,
                approval_status: approval_status
            }));
        }

        function deleteUser(employeeId) {
            var xhr = new XMLHttpRequest();

            xhr.open('POST', '../controllers/EmployeeController.php/delete', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {

                    window.location.reload();
                    alert("Deleted Successfully ");
                } else {
                    alert("Failed to Delete");
                }
            };

            xhr.onerror = function() {
                console.error("Error:", xhr.statusText);
            };

            xhr.send(JSON.stringify({
                employeeId: employeeId
            }));
        }

        function openModal() {
            document.getElementById('resetPasswordModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('resetPasswordModal').style.display = 'none';
        }

        function openResetPasswordModal(employeeId) {
            openModal()

            document.getElementById('userId').value = employeeId;

        }

        function submitResetPasswordForm(e) {
            e.preventDefault(); 

            var userId = document.getElementById('userId').value;
            var newPassword = document.getElementById('newPassword').value;


            var xhr = new XMLHttpRequest();

            xhr.open('POST', '../controllers/EmployeeController.php/change-password', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {

                    closeModal();
                    alert("Password changed successfully");
                } else {
                    alert("Failed to change Password");
                }
            };

            xhr.onerror = function() {
                console.error("Error:", xhr.statusText);
            };

            xhr.send(JSON.stringify({
                employeeId: parseInt(userId),
                password: newPassword
            }));
        }



        window.onload = function() {
            fetchEmployeeList();
        };
    </script>

</body>

</html>
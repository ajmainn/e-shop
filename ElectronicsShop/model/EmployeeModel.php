<?php
function getAllEmployeeList()
{
    include 'db_connection.php';
    $sql = "SELECT * FROM employee;";
    $result = $conn->query($sql);


    if (!$result) {

        return mysqli_error($conn);
    } else {
        $employeeList = array();
        while ($row = $result->fetch_assoc()) {
            $employeeList[] = $row;
        }
        $result->close();

        return $employeeList;
    }
};

// function changeApprovalStatus($empId, $currentStatus)
// {
//     include 'db_connection.php';
//     $newStatus = $currentStatus == 1 ? 0 : 1;
//     $sql = "UPDATE employee SET approval_status = ? WHERE id = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ii", $newStatus, $empId);
//     $stmt->execute();
//     if (!$success) {
//         die("Query failed: " . mysqli_error($conn));
//     } else {
//         return 1;
//     }
// }

function deleteEmployee($empId)
{
    include 'db_connection.php';
    $sql = "DELETE FROM employee WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $empId);
    $stmt->execute();
    if (!$success) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        return 1;
    }
}

function changePassword($empId, $pass)
{
    include 'db_connection.php';
    $sql = "UPDATE employee SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $pass, $empId);
    $stmt->execute();
    if (!$success) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        return 1;
    }
}

function totalEmployeeWage(){
    
    

    include 'db_connection.php';

    $sql = "SELECT SUM(salary) as total_wage from employee";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $totalRevenue = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        return $totalRevenue;
    } else {

        mysqli_stmt_close($stmt);
        return 0;
    }

}

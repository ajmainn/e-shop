<?php

function addTask($taskDescription, $empId)
{
    include 'db_connection.php';

    $sql = "INSERT INTO task(description, empId) VALUES(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $taskDescription, $empId);
    $stmt->execute();
    if (!$stmt) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        return 1;
    }
}
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

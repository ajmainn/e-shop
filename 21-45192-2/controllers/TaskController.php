<?php
include "../model/TaskModel.php";

$currentUrl = $_SERVER['REQUEST_URI'];

// Split the URL by "/"
$urlParts = explode('/', $currentUrl);

// Get the last part of the URL
$lastPart = end($urlParts);



if ($_SERVER['REQUEST_METHOD'] === 'GET' && $lastPart == "get-allemp") {
    $result = getAllEmployeeList();
    if ($result) {

        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'User not found']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $lastPart == "add-task") {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['employeeId']) && isset($data['description'])) {
        // Get the employee ID from the JSON data
        $employeeId = $data['employeeId'];
        $description = $data["description"];
        $success = addTask($description, $employeeId);


        if ($success) {
            // If the update was successful, send a success response
            http_response_code(200);
            echo json_encode(['message' => 'Task successfully']);
        } else {
            // If the update failed, send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to add task']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Task description and employee id required']);
    }
}

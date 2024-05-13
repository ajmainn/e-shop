<?php
include "../model/userModel.php";

$currentUrl = $_SERVER['REQUEST_URI'];

// Split the URL by "/"
$urlParts = explode('/', $currentUrl);

// Get the last part of the URL
$lastPart = end($urlParts);



if ($_SERVER['REQUEST_METHOD'] === 'GET' && $lastPart == "get-alluser") {
    $result = getAlluserList();
    if($result){

    header('Content-Type: application/json');
    echo json_encode($result);
    }else{
        http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'User not found']);
    }
}



elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $lastPart == "delete"){
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['uid'])) {
        // Get the user ID from the JSON data
        $userId = $data['uid'];
        $success = deleteuser($userId);
        

        if ($success) {
            // If the update was successful, send a success response
            http_response_code(200);
            echo json_encode(['message' => 'User Delete successfully']);
        } else {
            // If the update failed, send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to delete user']);
        }
    }
}

elseif($_SERVER['REQUEST_METHOD'] === 'POST' && $lastPart == "change-password"){
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['uid'])) {
        // Get the user ID from the JSON data
        $userId = $data['uid'];
        $password = $data["password"];
        $success = changePassword($userId, $password);
        

        if ($success) {
            // If the update was successful, send a success response
            http_response_code(200);
            echo json_encode(['message' => 'Password changed successfully']);
        } else {
            // If the update failed, send an error response
            http_response_code(500); // Internal Server Error
            echo json_encode(['error' => 'Failed to change password']);
        }
    }
}
// Similar logic for PUT and DELETE requests
?>

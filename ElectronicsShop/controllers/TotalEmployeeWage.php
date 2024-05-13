<?php
include "../model/EmployeeModel.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = totalEmployeeWage();
    if($result){

    header('Content-Type: application/json');
    echo json_encode($result);
    }else{
        http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Something went wrong!']);
    }
}
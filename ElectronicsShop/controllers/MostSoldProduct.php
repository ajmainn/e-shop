<?php
include "../model/ProductModel.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = mostSoldProduct();
    if($result){

    header('Content-Type: application/json');
    echo json_encode($result);
    }else{
        http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'User not found']);
    }
}
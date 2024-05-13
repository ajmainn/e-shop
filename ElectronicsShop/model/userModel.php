<?php
function getAlluserList()
{
    include 'db_connection.php';
    $sql = "SELECT * FROM user;";
    $result = $conn->query($sql);


    if (!$result) {

        return mysqli_error($conn);
    } else {
        $userList = array();
        while ($row = $result->fetch_assoc()) {
            $userList[] = $row;
        }
        $result->close();

        return $userList;
    }
};

function deleteuser($userId)
{
    include 'db_connection.php';
    $sql = "DELETE FROM user WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    if (!$success) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        return 1;
    }
}

function changePassword($userId, $pass)
{
    include 'db_connection.php';
    $sql = "UPDATE user SET password = ? WHERE uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $pass, $userId);
    $stmt->execute();
    if (!$success) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        return 1;
    }
}


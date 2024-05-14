<?php
function getTopCustomer()
{
    include 'db_connection.php';
    $sql = "SELECT u.uid, u.name AS customer_name, SUM(s.quantitySold * (p.sellprice - p.price)) AS total_revenue FROM
    sell s JOIN
    product p ON s.productId = p.pid JOIN
    user u ON s.userId = u.uid GROUP BY
    u.uid, u.name ORDER BY
    total_revenue DESC LIMIT 3;";

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

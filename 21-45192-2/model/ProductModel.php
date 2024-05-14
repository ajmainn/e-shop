
<?php


function getTotalRevenue(){
    

    include 'db_connection.php';

    $sql = "SELECT SUM(revenue) AS total_revenue FROM ( SELECT (s.quantitySold * p.sellPrice) AS revenue FROM product p JOIN sell s ON p.pid = s.productId ) AS revenue_table;";
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


function mostSoldProduct(){
include 'db_connection.php';
    $sql = "SELECT
    p.pid,
    p.name AS product_name,
    sum(s.quantitySold) AS total_sold,
    SUM(s.quantitySold * (p.sellprice - p.price)) AS total_revenue
FROM
    product p
JOIN
    sell s ON p.pid = s.productId
GROUP BY
    p.pid, p.name
ORDER BY
    total_sold DESC;";
    $result = $conn->query($sql);


    if (!$result) {

        return mysqli_error($conn);
    } else {
        $mostSoldProduct = array();
        while ($row = $result->fetch_assoc()) {
            $mostSoldProduct[] = $row;
        }
        $result->close();

        return $mostSoldProduct;
    }
}
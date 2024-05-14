<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Dashboard - Home</title>
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
</head>

<body>
    <div class="dashboard-container">
        <?php include('./LeftNav.php') ?>
        <div class="main-content">
            <h1>Product Sales and Revenue</h1>
    <table id="product-sales-table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Total Sold</th>
                <th>Total Revenue</th>
            </tr>
        </thead>
        <tbody id="product-sales-table-body"></tbody>
    </table>

        </div>
    </div>
     

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchProductSales();
        });

        function fetchProductSales() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../controllers/MostSoldProduct.php', true); // Replace 'your_api_endpoint_here' with your actual API endpoint
            xhr.responseType = 'json';

            xhr.onload = function() {
                if (xhr.status === 200) {
                    renderProductSales(xhr.response);
                } else {
                    console.error('Error fetching product sales:', xhr.statusText);
                }
            };

            xhr.onerror = function() {
                console.error('Network error while fetching product sales:', xhr.statusText);
            };

            xhr.send();
        }

        function renderProductSales(data) {
            var productSalesTableBody = document.getElementById('product-sales-table-body');
            productSalesTableBody.innerHTML = '';

            data.forEach(function(row) {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td>' + row.pid + '</td>' +
                               '<td>' + row.product_name + '</td>' +
                               '<td>' + row.total_sold + '</td>' +
                               '<td>$' + row.total_revenue + '</td>';
                productSalesTableBody.appendChild(tr);
            });
        }
    </script>
</body>

</html>
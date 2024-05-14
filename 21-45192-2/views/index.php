<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Dashboard - Home</title>
    
</head>

<body>
    <div class="dashboard-container">
        <?php include('./LeftNav.php') ?>
        <div class="main-content">
            <div class="dashboard-content-top">
                <div>
                <h3>Total Revenue</h3>
                <h4 id="total_revenue">88888888</h4>
            </div>
            <div>
                <h3>Total Employee Wage</h3>
                <h4 id="emp-wage">88888888</h4>
            </div>

            <div>
                <h3>Top Three Customer</h3>
                <ul id="top-customers-list"></ul>


            </div>
            </div>


        </div>
    </div>

    <script>
 function fetchTotalRevenue() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/TotalRevenue.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var totalRevenue = JSON.parse(xhr.responseText);
                    var revContainer = document.getElementById("total_revenue");
                    revContainer.innerText = totalRevenue.total_revenue + " TK"
                }
            };
            xhr.send();
        }

        function fetchTotalEmpWage() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/TotalEmployeeWage.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var emp_wage = JSON.parse(xhr.responseText);
                    var revContainer = document.getElementById("emp-wage");
                    revContainer.innerText = emp_wage.total_wage + " BDT"
                }
            };
            xhr.send();
        }
        function topThreeCustomer() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "../controllers/TopCustomer.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var topCustomer = JSON.parse(xhr.responseText);
                                        renderTopCustomers(topCustomer);

                }
            };
            xhr.send();
        }
        function renderTopCustomers(customers) {
            var topCustomersList = document.getElementById('top-customers-list');
            topCustomersList.innerHTML = ''; // Clear previous content
            customers.forEach(function(customer) {
                var listItem = document.createElement('li');
                listItem.textContent = customer.customer_name + ' - Total Revenue: $' + customer.total_revenue;
                topCustomersList.appendChild(listItem);
            });
        }
        window.onload = function() {
            fetchTotalRevenue();
            fetchTotalEmpWage();
            topThreeCustomer();
        };
    </script>
</body>

</html>
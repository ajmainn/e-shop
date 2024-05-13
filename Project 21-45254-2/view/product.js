function fetchMenu() {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const menuItems = JSON.parse(this.responseText);

            if (menuItems.error) {
                document.getElementById("menuData").innerHTML = menuItems.error;
            } else {
                let menuHtml = '<table border="1"><thead><tr>' +
                               '<th>ID</th><th>Brand</th><th>Name</th><th>Description</th><th>Price</th><th>Action</th>' +
                               '</tr></thead><tbody>';

                menuItems.forEach(function(item) {
                    menuHtml += '<tr>' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.brand + '</td>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.description + '</td>' +
                                '<td>' + parseFloat(item.price).toFixed(2) + '</td>' +
                                '<td><a href="delete_menu.php?id=' + item.id + '" onclick="return confirm(\'Are you sure you want to delete this menu item?\')">Delete</a></td>' +
                                '</tr>';
                });

                menuHtml += '</tbody></table>';
                document.getElementById("menuData").innerHTML = menuHtml;
            }
        }
    };
    xhttp.open("GET", "getMenuData.php", true);
    xhttp.send();
}

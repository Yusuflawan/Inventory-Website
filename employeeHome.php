<?php

include_once 'dbConnection.php';

session_start();

// echo $_SESSION['employeeId'];
// echo $_SESSION['employeeName'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="employeeHome.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/solid.css">
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/brands.css">
</head>
<body>
    <div class="nav-bar">
        <div class="bar">
            <i class="fa fa-bars" id="barIcon"></i>
        </div>
        <div class="menu">
            <div class="arrow">
                <i class="fa fa-arrow-right" id="barIcon"></i>
            </div>
            <ul>
                <li><a href="employeeHome.php">home</a></li>
                <li><a href="">clear order</a></li>
                <li><a href="">home</a></li>
                <li><a href="">home</a></li>
                <li><a href="index.php">logout</a></li>
            </ul>
        </div>
    </div>
    <div class="product">
        <!-- <form method="post"> -->
        <form>
        <div class="item">
                <label for="product">Product</label>
                <input type="text" id="product" required>
            </div>
            <div class="quantity">
                <label for="qty">Qty</label>
                <input type="number" min="1" id="qty" required>
            </div>
            <div class="price">
                <label for="price">Price per each</label>
                <input type="text" id="price" required>
            </div>
            <div class="total-price">
                <label for="totalPrice">Total price</label>
                <input type="text" id="totalPrice" required>
            </div>
            <button id="addProductBtn">Add to invoice</button>
        </form>
    </div>
    <div class="table">
        <table>
            <thead>
                <td id="sn">S/N</td>
                <td>Product</td>
                <td>Qty</td>
                <td>Total price</td>
            </thead>
            <tbody id="tableBody">
                <?php //echo $getCont; ?>
            </tbody>
        </table>
    </div>
    <div class="bottomContainer">
        <div class="payment">
            <form class="paymentType">
                <label for="" class="paymentLabel">payment method</label>
                <br>
                <input type="radio" name="" id="cash">
                <label for="cash">cash</label>

                <input type="radio" name="" id="pos">
                <label for="pos">POS</label>

                <input type="radio" name="" id="transfer">
                <label for="transfer">transfer</label>
            </form>
        </div>
        <div class="invoiceContainer">
            <button>generate invoice</button>
        </div>
    </div>



    <script>
        const barIcon = document.querySelector("#barIcon");
        barIcon.addEventListener("click", function () {
        document.querySelector(".menu").style.visibility = "visible";
        });

        const menu = document.querySelector(".arrow i");
        menu.addEventListener("click", function () {
        document.querySelector(".menu").style.visibility = "hidden";
        });



        let addProductBtn = document.querySelector("#addProductBtn");
        let tableBody = document.querySelector("#tableBody");
        let rowNum = 1;

        addProductBtn.addEventListener("click", (e) => {
            e.preventDefault();
            let product = document.querySelector("#product").value;
            let qty = document.querySelector("#qty").value;
            let price = document.querySelector("#price").value;
            let totalPrice = document.querySelector("#totalPrice").value;

            let newRow = tableBody.insertRow();
            let cell1 = newRow.insertCell(0);
            let cell2 = newRow.insertCell(1);
            let cell3 = newRow.insertCell(2);
            let cell4 = newRow.insertCell(3);

            cell1.innerHTML = rowNum++;
            cell2.innerHTML = product;
            cell3.innerHTML = qty;
            cell4.innerHTML = totalPrice;

            product.value = "";
            qty.value = "";
            price.value = "";
            totalPrice.value = "";
        });


    </script>
</body>
</html>
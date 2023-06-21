<?php

session_start();
?>
<html>
    <head>
        <title>Jojoe Food</title>
        <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
        <link rel="stylesheet" href='darren-css/cart.css'/>
    </head>

    <body>
    
    <?php
    include("header.php");
    ?>

    <div class = "body-container">
    <div>
        <div class="grid-container1">
            <div class="top">
                <h2><u>CART</u></h2>
            </div>

            <div class="date">
                <div><img src="image/calendarlogo.png" style="height: 30px; width: 30px; margin-right: 10px"></div>
                <div><text style="font-size: 1.1rem; " id="currentDate">dd/mm/yyyy</text></div>
            </div>
        
            <div class="addOrder">
                <button type=button class="add" style="font-size: 18px;" onclick="location.href='servicespage.php'">ADD ORDER</button>
            </div>
        </div>
    
            
        <div class="grid-container">
            <div class="orderDetailsTable">
                <div class="table order">ORDER</div>
                <div class="price">PRICE</div>
                <div class="foodList">
                    <?php
                    $total_price = 0;
                    $sqlz = "SELECT * FROM orders WHERE user_id = '{$_SESSION['ID']}' ";
                    $resz = mysqli_query($conn, $sqlz);
                    if (mysqli_num_rows($resz) > 0) {
                        while ($rowz = mysqli_fetch_assoc($resz)) { 
                    $sql = "SELECT * FROM orderdetail where order_id = '{$rowz['order_id']}'";
                    $res = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($res) > 0) {while ($row = mysqli_fetch_assoc($res)) { 
                            if($row['order_id']==$_SESSION['COUNTER']){
                        $menu_name = "SELECT * FROM menu WHERE menu_code = '$row[menu_code]'";
                        $query_menu_name = mysqli_query($conn, $menu_name);
                        $res_menu_name = mysqli_fetch_assoc($query_menu_name);
                        $total_order_price = $row['order_quantity'] * $row['order_price'];
                        $total_price += $row['order_price'] * $row['order_quantity'];
                        echo "<div class='food'>
                        <div class='delete'> <a href='operation.php?pass=$row[item_id]'>Delete</a></div>
                        <div class='foodNum'> $row[order_quantity] </div>
                        <div class='foodNameChinese'> $row[menu_code] $res_menu_name[menu_name] </div>
                        <div class='foodNameEnglish'> $res_menu_name[menu_description] </div>
                        </div>
                        ";
                } }}}}
                    ?>
                    
                </div>
                
                <div class="table foodPriceList">
                    <div class="foodPrice">RM6.00</div>
                    <div class="foodPrice">RM6.00</div>
                    <div class="foodPrice">RM6.00</div>    
                </div>
                
                <div class="table total">Total Price</div>
                <div class="table totalPrice">RM6.00</div>
            </div>

            <div class="checkoutButton">
                <button class="btn checkout" onclick="location.href='orderDetails.html'">CHECKOUT</button>
            </div>
        </div>
    </div>
    </div>

        <div class="position">
            <a data-active="customer" href="#">Customer</a>
            /
            <a data-active="seller" href="serviceSellerPage.html">Seller</a>
        </div>

        <script>
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = dd + '/' + mm + '/' + yyyy;
            document.getElementById('currentDate').innerHTML = today;
        </script>

    </body>

</html>
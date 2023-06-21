<html>
    <head>
        <title>Jojoe Food</title>
        <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
        <link rel="stylesheet" href="darren-css/cart.css">
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
                <button type=button class="add" style="font-size: 18px;" onclick="location.href='serviceCustomerPage.html'">ADD ORDER</button>
            </div>
        </div>
    
            
        <div class="grid-container">
            <div class="orderDetailsTable">
                <div class="table no">NO</div>
                <div class="table order">ORDER</div>
                <div class="table price">PRICE</div>
                <div class="table foodList">
                    <div class=" food">
                        <div class="foodNum">
                            1 x 
                        </div>
                        <div class="foodNameChinese">
                            A2 + 白饭
                        </div>
                        <div class="foodNameEnglish">
                            A2 + White Rice
                        </div>
                    </div>
                    <div class=" food">
                        <div class="foodNum">
                            1 x 
                        </div>
                        <div class="foodNameChinese">
                            A2 + 白饭
                        </div>
                        <div class="foodNameEnglish">
                            A2 + White Rice
                        </div>
                    </div>
                    <div class=" food">
                        <div class="foodNum">
                            1 x 
                        </div>
                        <div class="foodNameChinese">
                            A2 + 白饭
                        </div>
                        <div class="foodNameEnglish">
                            A2 + White Rice
                        </div>
                    </div>
                    
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
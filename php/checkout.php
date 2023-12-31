<?php

if(isset($_POST["address"])){
    $address = $_POST["address"];
    $sql = "UPDATE user SET user_address = '$address' WHERE user_id = '$_SESSION['ID']";
    mysqli_query($conn, $sql);
}


?>
<html>
    <head>
        <title>Jojoe Food</title>
        <link rel='stylesheet' href='yam-css/navigationbar&body.css'/>
        <link rel="stylesheet" href="darren-css/orderDetails.css">
    </head>

    <body>
        <div class='menu-container'>
            <div class='menu'>
                <div class="logo">
                  <img src="headerImage/IMG_4380 1.png" style="height: 50px; width: 50px; text-align: center">
                </div>  
                <div class="header1"> 
                  <div class="header"><a data-active="home" href="home.html">HOME</a></div> 
                  <div class="header"><a data-active="service" href="serviceCustomerPage.html">SERVICE</a></div> 
                  <div class="header"><a data-active="order" href="orderhistory.html">ORDER</a></div> 
                  <div class="header"><a data-active="about" href="about.html">ABOUT</a></div> 
                </div> 
                <div class="login">
                    <img src="headerImage/login (1) 1.png" style="text-align: center; padding: 10px 0;">
                    <button id="logoutButton" onclick="document.getElementById('id03').style.display='block'" style="background-color: white; width:auto; cursor: pointer">LOGOUT</button>
                    <div id="id03" class="modal">
            
                      <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                          <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                        
                        <div class = "logoutText">
                          <p>Are you sure you want to logout?</p>
                        </div>
                    
                        <div class="logoutContainer">
                            <div class="logoutButton">
                              <button type="button" id="logoutButton" onclick="location.href='mainPage.html'">Logout</button>
                              <button type="button"	id="cancelButton" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
                          </div>
                        </div>
                    
                        <div class="logoutContainer" style="background-color:#f1f1f1"></div>
                    
                      </form>
                    </div>
                  </div>                    
            </div>
        </div>

    <div class="body-container">
    <div>
        <div class="grid-container1">
            <div class="top">
                <h2><u>ORDER DETAILS</u></h2>
            </div>
        </div>

        <div class="grid-container">
            <div class="orderDetailsTable">
                <div class="table dateLeft">
                    DATE
                </div>
                <div class="table dateRight">
                    <span id="dateValue"></span>
                    <a href="#">
                        <img src="image/editlogo.png" class="editLogo"
                        onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                    </a>
                </div>
                <div class="table addressLeft">
                    ADDRESS
                </div>
                <div class="table addressRight">
                    <span id="addressValue"></span>
                    <a href="#">
                        <img src="image/editlogo.png" class="editLogo"
                        onclick="document.getElementById('id02').style.display='block'" style="width:auto;">
                    </a>
                </div>
                <div class="table map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1389.8706306946474!2d103.63352261788638!3d1.5660763655532963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da76b30a24667f%3A0xd9410914e6b13a9d!2sMA1%2C%20Kolej%20Tun%20Dr%20Ismail!5e0!3m2!1sen!2smy!4v1687129735390!5m2!1sen!2smy" 
                    width="840" height="270.67" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                </div>
            </div>

            <div class="payButton">
                <button class="btn pay" onclick="location.href='orderhistory.html'">PAY</button>
            </div>
        </div>
    </div>
    </div>

        <div class="position">
            <a data-active="customer" href="#">Customer</a>
            /
            <a data-active="seller" href="serviceSellerPage.html">Seller</a>
        </div>


        <div id="id01" class="modal">
            <form class="modal-content animate">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
            
                <div class="container">
                    <label for="date"><b>Date</b></label>
                    <input type="text" placeholder="Enter Date" name="date" required id="dateInput">
                    
                    <button type="button" class="modalButton" id="modalButton1">Change</button>
                </div>
            </form>
        </div>

        <div id="id02" class="modal">
            <form class="modal-content animate" action="checkout.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
            
                <div class="container">
                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="address" required id="addressInput">
                    
                    <button type="button" class="modalButton" id="modalButton2">Change</button>
                </div>
            </form>
        </div>

        <script>
            var modal1 = document.getElementById('id01');
            var modal2 = document.getElementById('id02');
            
            window.onclick = function(event) {
                if (event.target == modal1) {
                    modal1.style.display = "none";
                }
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }

                if (event.target == button1) {
                    modal1.style.display = "none";
                }
                if (event.target == button2) {
                    modal2.style.display = "none";
                }
            }

            const var1 = document.getElementById("dateValue");
            var oldDate = "19.01.2023";
            var1.innerHTML = oldDate;

            var button1 = document.getElementById("modalButton1");
            var OnButtonClick = function(){
                let newDate = document.getElementById("dateInput").value;
                var1.innerHTML = newDate;
            }
            button1.addEventListener("click",OnButtonClick);

            const var2 = document.getElementById("addressValue");
            var oldAddress = "MA1 Wing C, Kolej Tun Dr Ismail";
            var2.innerHTML = oldAddress;

            var button2 = document.getElementById("modalButton2");
            var OnButtonClick = function(){
                let newAddress = document.getElementById("addressInput").value;
                var2.innerHTML = newAddress;
            }
            button2.addEventListener("click",OnButtonClick);
        </script>

    </body>

</html>
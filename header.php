<html>
<head></head>
<body>
<div class='menu-container'>
            <div class='menu'>
              <div class ='left_menu'>
                  <div class="logo">
                    <img src="headerImage/image (1).png" style="height: 50px; width: 50px; text-align: center">
                  </div>  
                  <div class="header1"> 
                    <div class="header"><a data-active="home" href="homeSeller.html">HOME</a></div> 
                    <div class="header"><a data-active="service" href="serviceSellerPage.html">SERVICE</a></div> 
                    <div class="header"><a data-active="order" href="orderhistorySeller.html">ORDER</a></div> 
                  </div> 
              </div>
                <div class="login">
                    <img src="headerImage/image.png" style="text-align: center; padding: 15px 0;">
                  <a href="login.php">LOGIN</a>
                </div>          
            </div>
        </div>
        <button id="logoutButton" onclick="document.getElementById('id03').style.display='block'" style="background-color: white; width:auto; cursor: pointer">LOGOUT</button>
        <div id="id03" class="modal">

          <form class="modal-content animate" action="check_login.php" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            
            <div class = "logoutText">
              <p>Are you sure you want to logout?</p>
            </div>
        
            <div class="logoutContainer">
                <div class="logoutButton">
                  <button type="submit" id="logoutButton" name="logout">Logout</button>
                  <button type="button"	id="cancelButton" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
              </div>
            </div>
        
          </form>
        </div>
      </div>
  </div>
</div>
</body>
</html>
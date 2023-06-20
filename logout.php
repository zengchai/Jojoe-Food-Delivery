<html>
<head></head>
<body>
<div class='menu-container'>
  <div class='menu'>
      <div class="logo">
        <img src="headerImage/IMG_4380 1.png" style="height: 50px; width: 50px; text-align: center">
      </div>  
      <div class="header1"> 
        <div class="header"><a data-active="Home" href="home.html">HOME</a></div> 
        <div class="header"><a data-active="Service" href="service.html">SERVICE</a></div> 
        <div class="header"><a data-active="Order" href="order.html">ORDER</a></div> 
        <div class="header"><a data-active="About" href="about.html">ABOUT</a></div> 
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
                  <button type="button" id="logoutButton" onclick="location.href='login.php'">Logout</button>
                  <button type="button"	id="cancelButton" onclick="document.getElementById('id03').style.display='none'">Cancel</button>
              </div>
            </div>
        
            <div class="logoutContainer" style="background-color:#f1f1f1"></div>
        
          </form>
        </div>
      </div>
  </div>
</div>
</body>
</html>
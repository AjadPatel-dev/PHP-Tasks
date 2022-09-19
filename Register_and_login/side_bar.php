<?php  
session_start();
?>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <h2>User Dashbord</h2>
    <div class="w3-col s4">
      <!-- <img src="images/A13.jpg" class="w3-circle w3-margin-right" style="width:60px; height:60px"> -->
      <img src="default_image/A13.jpg" class="w3-circle w3-margin-right" style="width:60px; height:60px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome,to<strong><?php echo $_SESSION["name"];?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
    <a href="profile.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-user fa-fw"></i>&nbsp; Profile</a>

    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Logout</a>

  </div>
</nav>


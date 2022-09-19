<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">
<?php  
session_start();
?> 
<!-- Top container -->
    <?php
    include_once("header.php");
    ?>
<!-- Sidebar/menu -->
<?php
     include_once("side_bar.php");
    ?>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <!-- Header -->
  <?php
    include_once("dash_bord_content.php");

?>
<hr>
  <div class='row' >
    <table border="2" style="margin-left: 100px; width:75%">
    <tr style="color:red;">
      <th>Name</th>
      <th>Contact Number</th>
      <th>Address</th>
      <th>Email</th>
      <th>Profile Pic</th>

    </tr>
      <?php
      include_once ('config.php');
      $username = $_SESSION["email"];
      $select = "SELECT * FROM user_details where email='$username' "; 
      $result=mysqli_query($conn,$select);
      $data=($result);
      while ($row=$result->fetch_assoc()) {
      ?>
      <tr>
      <td><?php echo $row["name"];?></td>
      <td><?php echo $row["number"];?></td>
      <td><?php echo $row["address"];?></td>
      <td><?php echo $row["email"];?></td>
      <td><div class="col-sm-5"><img src="<?php echo $row['image'];?>" alt="ok" height="100px" width="100px"></div></td>
        
      

      </tr>
     
    </table>
    <h3 style="margin-left: 300px;color:blue">Hello.........<?php echo $row['name'];?><br>How are You ?</h3>
    <?php
    }
    ?>
  </div>
<!-- Header -->

  <!-- End page content -->
    <!-- Footer -->
    <?php
    include_once("footer.php");
    ?>
</div>

<script>


var mySidebar = document.getElementById("mySidebar");
var overlayBg = document.getElementById("myOverlay");
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
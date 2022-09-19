<!DOCTYPE html>
<html>
  <head>
    <title>W3.CSS Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
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


    <center><h2>Update Details</h2></center>
    <p id="success_message" ></p>
    <form id="update_details"  method="post" enctype="multipart/form-data">

    <!-- < ?php echo $_SESSION["id"];?>" -->

    <?php

include_once('config.php');
    $id=$_GET['id'];
    $select="select * from user_details where id='$id'";
    $result=mysqli_query($conn,$select);
    $data=$result->fetch_assoc();


    ?>

    <div class="container">
    <div class="row">
    <div class="col-sm-6">
    <label> Name :</label>
    <input type="hidden" value="<?php echo $id;?>" id="id" name="">
    <input type="text" class="form-control" minlength="8" id="name" value="<?php echo $data['name'];?>" name="name"  required="" >
    <span  id="name_error"></span>
    </div>
    <div class="col-sm-6" >
    <lable>Number :</lable>
    <input type="text" class="form-control" name="number" value="<?php echo $data["number"];?>" id="number" required="" >
    <span  id="number_error"></span>
    </div>
    </div><br>
    <div class="row" >
    <div class="col-sm-6" >
    <lable>Profile Picture :</lable>
    <input type="file" class="form-control" name="image" id="image" required="" value="<?php $data['image'];?>">
    </div>
    <div class="col-sm-6" >
    <lable>Address</lable>
    <textarea class="form-control" name="address" id="address"  required="" rows="1" ><?php echo $data["address"];?></textarea>
    <span  id="address_error"></span>
    </div>
    </div><br>
    <input type="submit" value="update" name="update">
    </div>
    </form>

    <!-- Footer -->
    <?php
    include_once("footer.php");
    ?>
    <!-- Footer -->
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



<?php
  include_once("config.php");
  if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $pic = $_FILES['image'];
    $file_tmp= $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $address = $_POST['address'];
    $img="images/";
    if($_FILES['image']){
      $file_destination = 'images/'.'ajad'. $file_name;
      move_uploaded_file($file_tmp, $file_destination);
      $sql = " UPDATE user_details SET name='$name',number='$number', image='$file_destination', address='$address' WHERE id=$id";

      $all_files = glob("images/*.*");
      for ($i=1; $i<count($all_files); $i++){
        $image_name = $all_files[$i];
        if (file_exists($img)) {
          unlink($image_name);
          echo 'File '.$image_name.' has been deleted';
        }
      } 
      $result = mysqli_query($conn, $sql);
      if($result){
        ?>
      <script> window.location.href='updated_profile.php'</script>
      <?php
      }
    }
  }
?>





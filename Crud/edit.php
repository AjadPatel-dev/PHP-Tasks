<?php 
include_once("connection.php");
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $age = $_POST['age'];
    $experience = $_POST['experience'];
    $department = $_POST['department'];
    $jdate = $_POST['jdate'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $new_image = $_FILES['pic']['name'];
    $old_image = $_POST['image'];
    if(isset($new_image) && !empty($new_image) && isset($old_image) && !empty($old_image) && $new_image != $old_image){
        unlink("Uploads/".$old_image);
        move_uploaded_file($_FILES['pic']['tmp_name'], "Uploads/".$_FILES['pic']['name']);
        $img="Uploads/".$_FILES['pic']['name'];
    }
    $sql = "UPDATE employee SET  name='$name',age='$age',experience='$experience',department='$department',joindate='$jdate',location='$address',country='$country',image='$new_image' WHERE id='$id' "; 
    $result = $conn->query($sql);
    //  echo "<pre>";
    // print_r($_POST);
    //  exit
    if ($result == TRUE) {
    echo "Record updated successfully.";
    header("Location: show.php");
    }else{
    echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
if (isset($_GET['id'])) {
    $emp_id = $_GET['id']; 
    $sql = "SELECT * FROM `employee` WHERE `id`='$emp_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $age= $row['age'];
            $pic=$row['image'];
            $experience = $row['experience'];
            $department = $row['department'];
            $jdate = $row['joindate'];
            $address = $row['location'];
            $country = $row['country'];
            $id = $row['id'];
        } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Click to Open Edit Page</h2>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Update Page</h2>
        </div>
        <div class="container-fluid">
                <form action="" id="simpleform" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                        Name :<br>
                        <input type="text" name="name" minlength="8"  value="<?php echo $name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="image" value="<?php echo $old_image; ?>">
                        </div>
                        <div class="col-sm-6">
                        Age :<br>
                        <input type="number" name="age" min="18" value="<?php echo $age; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            Profile Pic : <br>
                            <input type="file" name="pic" value="<?php echo $pic; ?>">
                        </div>
                        <div class="col-sm-6">
                            Experience :<br>
                            <input type="number" name="experience" min="1" value="<?php echo $experience; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="lang">Department</label>
                            <select name="department"  id="lang" value="<?php echo $department; ?>">
                                <option value="COFOUNDER">COFOUNDER</option>
                                <option value="HR">HR</option>
                                <option value="DEVELOPER">DEVELOPER</option>
                                <option value="TESTER">TESTER</option>
                                <option value="DESINER">DESINER</option>
                                <option value="PHP DEVELOPER">PHP DEVELOPER</option>
                                <option value="WEB DEVELOPER">WEB DEVELOPER</option>
                            </select><br><br>
                        </div>
                        <div class="col-sm-6">
                            Joining Date : <br>
                            <input type="date" name="jdate" value="<?php echo $jdate; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            Address : <br>
                            <textarea name="address" id="add" rows="3" value="<?php echo $address; ?>" ></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="lang">Country</label>
                            <select name="country" id="lang" value="<?php echo $country; ?>">
                                <option value="INDIA">INDIA</option>
                                <option value="NEPAL">NEPAL</option>
                                <option value="WESTINDES">WESINDIES</option>
                                <option value="PAKISTAN">PAKISTAN</option>
                                <option value="CHINA">CHINA</option>
                                <option value="BHUTAN">BHUTAN</option>
                                <option value="THAILAND">THAILAND</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" value="Update" name="update">
                        </div>
                    </div>
                </form> 
                <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
</div>
</body>
<script>
    $( "#simpleform" ).validate({
        rules: {
            name: {
                required: true,
                maxlength: 23
            }
        }
    });
</script>
</html>
<?php
    } else{ 
    header('Location: view.php');
    } 
}
?>


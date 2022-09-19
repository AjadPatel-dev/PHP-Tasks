<?php
    include_once("connection.php");
    if(isset($_POST['submit'])){ 
        echo "<pre>";
        print_r($_POST);
        // print_r($_FILES);
        // exit;
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $experience = $_POST['experience'];
        $department = $_POST['department'];
        $joindate = $_POST['joindate'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['update_image']['name'];
        if(isset($new_image) && !empty($new_image)){
            unlink("Uploads/".$old_image);
            move_uploaded_file($_FILES['update_image']['tmp_name'], "Uploads/".$_FILES['update_image']['name']);
        echo    $sql = " UPDATE department SET name='$name',age=$age ,experience='$experience' ,department='$department', joindate='$joindate',location='$address', image='$new_image', country='$country' WHERE id=$id";
        exit;
        }else{
            $sql = " UPDATE department SET name='$name',age=$age ,experience='$experience' ,department='$department' ,joindate='$joindate',location='$address', country='$country' WHERE id=$id";
        }
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('Data Update successfully')</script>";
            header("Location: show.php");
        }else{
            echo "<script> alert('Data Update successfully')</script>";
        }
    }
?>
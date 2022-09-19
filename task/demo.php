<?php
    include_once("connection.php");
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $age = $_POST['age'];
        $experience = $_POST['experience'];
        $department = $_POST['department'];
        $joindate = $_POST['joindate'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $update=$_FILES['update_image']['name'];
        $target_dir = "Uploads/";
        $target_file = $target_dir . basename($_FILES["update_image"]["name"]);
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["update_image"]["tmp_name"], $target_file)){
            $sql = " UPDATE department SET name='$name',age=$age ,experience='$experience' ,department='$department' ,joindate='$joindate',location='$address', image='$update', country='$country' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "data updated";
                header("Location:show.php");
            }else{
                echo "data not updated";
            }
        }
    }
?>



















<?php
include_once("connection.php");
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $age = $_POST['age'];
        $experience = $_POST['experience'];
        $department = $_POST['department'];
        $joindate = $_POST['joindate'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $update=$_FILES['update_image']['name'];
        $target_dir = "Uploads/";
        $target_file = $target_dir . basename($_FILES["update_image"]["name"]);
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (move_uploaded_file($_FILES["update_image"]["tmp_name"], $target_file)){
            $sql = " UPDATE department SET name='$name',age=$age ,experience='$experience' ,department='$department' ,joindate='$joindate',location='$address', image='$update', country='$country' WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "data updated";
                header("Location:show.php");
            }else{
                echo "data not updated";
            }
        }
    }
?>
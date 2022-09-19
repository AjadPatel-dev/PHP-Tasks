<?php
include_once("connection.php");
    if(isset($_POST['submit'])){
        // echo "<pre>";
        // print_r($_FILES);
        // print_r($_POST);
        // exit;
        $id=$_POST['id'];
        $name=$_POST['name'];
        $old_image = $_POST['old_image'];
        $new_image = $_FILES['update_image']['name'];
        if(isset($new_image) && !empty($new_image)){

            unlink("Imgfolders/".$old_image);
            move_uploaded_file($_FILES['update_image']['tmp_name'], "Imgfolders/".$_FILES['update_image']['name']);
            $sql = " UPDATE images SET name='$name', image='$new_image' WHERE id=$id";
        // exit;
        }else{
            $sql = " UPDATE images SET name='$name' WHERE id=$id";
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
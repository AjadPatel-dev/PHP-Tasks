<?php

include_once("connection.php");
// echo "<pre>";
// print_r($_POST);
// die;

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$number = $_POST['number'];

$sql = "UPDATE student_data SET fname = '$fname', lname = '$lname', email = '$email', number = '$number' WHERE id = $id;";
$result = mysqli_query($conn, $sql);
        if($result){
            echo "<script> alert('Data Update successfully')</script>";
            header("Location: show.php");
        }else{
            echo "<script> alert('Data Update notsuccessfully')</script>";
        }
?>
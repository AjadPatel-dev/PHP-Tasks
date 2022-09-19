<?php
    include_once("config.php");
    $message=array();
    $name = !empty($_POST['name']) ? $_POST['name'] : "";
    $email =!empty($_POST['email']) ? $_POST['email'] : "";
    $number =!empty($_POST['number']) ? $_POST['number'] : "";
    $address =!empty($_POST['address']) ? $_POST['address'] : "";
    $password =!empty(md5($_POST['password'])) ? md5($_POST['password']) : "";
    $action=$_POST['action'];

    if($action =="insert") {
    
        $match_data =mysqli_query($conn, "SELECT * FROM user_details WHERE  email='$email' or number='$number' or password='$password'");
        $num_result = mysqli_num_rows($match_data);
        if(!empty( $num_result) &&  $num_result>0){
           $message=array('message' =>'User already register','status' =>1);
        } else{
           $message=array('message'=>' User Register Successfully.','status'=>2);
           $query = "INSERT INTO user_details (name,email,number,address,password) VALUES('$name','$email','$number','$address','$password')";
           $result = mysqli_query($conn,$query);
        }
    }
    echo json_encode($message);
?>
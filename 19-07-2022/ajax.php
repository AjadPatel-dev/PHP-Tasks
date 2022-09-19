<?php
   include_once("connection.php");
   $msg=array();
   $id= !empty($_POST['id']) ? $_POST['id'] : "";
   $fname = !empty($_POST['firstname']) ? $_POST['firstname'] : "";
   $lname = !empty($_POST['lastname']) ? $_POST['lastname'] : "";
   $email = !empty($_POST['emailid']) ? $_POST['emailid'] : "";
   $number = !empty($_POST['contactnumber']) ? $_POST['contactnumber'] : "";
   $action=$_POST['action'];
   if($action =="edit") {
      $update_data = "UPDATE student_data SET fname='$fname' ,lname='$lname', email='$email', number='$number' WHERE id=$id";
      $result = mysqli_query($conn, $update_data);
      if($result){
         $msg=array('msg'=>'user update','status' =>1);
      } else {
         $msg=array('msg'=>'user not update','status' =>2);
      }
   } else if($action =="save") {
      $same_data =mysqli_query($conn, "SELECT * FROM student_data WHERE email='$email' or number='$number'");
      $num_result = mysqli_num_rows($same_data);
      if(!empty( $num_result) &&  $num_result>0){
         $msg=array('msg' =>'User already register','status' =>3);
      } else{
         $msg=array('msg'=>' You are Register Successfully.','status'=>4);
         $query = "INSERT INTO student_data(fname,lname,email,number) VALUES('$fname','$lname','$email','$number')";
         $register_data = mysqli_query($conn,$query);
      }
   } else {
      $sql = "DELETE FROM student_data WHERE id='$id'";
      $result = $conn->query($sql);
      if ($result == TRUE) {
         $msg=array('msg'=>'Record deleted successfully','status'=>5);
      }
   }
   echo json_encode($msg);
   die;  
   
   
   
   
?>
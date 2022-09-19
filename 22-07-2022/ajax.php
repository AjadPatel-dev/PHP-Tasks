<?php
   include_once("connection.php");

   if(!empty($_POST["action"]) && $_POST["action"] == 'save_form'){
      $fname = !empty($_POST['firstname']) ? $_POST['firstname'] : "";
      $lname = !empty($_POST['lastname']) ? $_POST['lastname'] : "";
      $email = !empty($_POST['emailid']) ? $_POST['emailid'] : "";
      $number = !empty($_POST['contactnumber']) ? $_POST['contactnumber'] : "";

      $same_data =mysqli_query($conn, "SELECT * FROM student_data WHERE email='$email' or number='$number'");
      $num_result = mysqli_num_rows($same_data);
      if(!empty( $num_result) &&  $num_result>0){
         //<!-----Update----->
         // $update = mysqli_query();
            echo "Email or Contact number is match <br> Please try again";
            
          //<!-----Update----->
      }
      else{
         $query = "INSERT INTO student_data(fname,lname,email,number) VALUES('$fname','$lname','$email','$number')";
         $register_data = mysqli_query($conn,$query);
         if(!empty($register_data)){
            echo '<span style="color:#03f215;">User is register Successfully</span>';
         }
         else{
            echo "user is not register Successfully"; 
         }
      }
   }
   die;  
?>



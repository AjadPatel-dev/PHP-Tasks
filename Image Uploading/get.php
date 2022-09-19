<?php
include_once("connection.php");
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $sql = "SELECT * from images WHERE id = $id";
//   exit;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
   $row_return = json_encode($row); 
    print_r($row_return);
   die;
  }
  }else {
    echo "0 results";
  }
  $conn->close();
}


?>
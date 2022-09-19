<?php
include_once("connection.php");
if(isset($_GET['$id'])){
    $emp_id = $_GET['id'];
    $sql = "DELETE FROM employee WHERE id = '$emp_id'";
    $result = $conn->query($sql);

    if($result == TRUE){
        header("Location: show.php");
        echo "Record deleted successfully.";
    }else{
        header("Location: show.php");
        echo "Record not deleted.";
    }
}
?>
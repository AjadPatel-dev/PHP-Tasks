<?php 
    include_once("connection.php");
    if (isset($_GET['id'])) {
        $emp_id = $_GET['id'];
        $sql = "DELETE FROM images WHERE id='$emp_id'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            header("Location: show.php");
            echo "Record deleted successfully.";
        }else{
            echo "Record Not Deleted";
        }
    } 
?>
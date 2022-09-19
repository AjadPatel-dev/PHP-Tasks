<html>  
<head>  
<head>  
<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>  
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" /> 
<script>  
$(document).ready(function (){
$('#datatable').dataTable(  
{
});  
});  
</script>  
</head>  
    <body> 
        <center><h2><i>Employee Details</i></h2></center>
        <?php
            include_once("connection.php");
            $result = mysqli_query($conn,"SELECT * FROM student_data ORDER BY id DESC");
        ?>
        <?php
            if (mysqli_num_rows($result) > 0) {
        ?> 
        <table border="2" id="datatable"> 
            <thead>  
                <tr style="color:red;">  
                    <th >Sr. No.</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Update</th>
                    <th>Delet</th>
                </tr>  
            </thead>
            <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["fname"]; ?></td>
                    <td><?php echo $row["lname"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["number"]; ?></td>
                    <td><a href='get_data.php?id=<?php echo $row['id']; ?>'>update</a></td>
                    <td><a href='delete.php?id=<?php echo $row['id']; ?>' >delete</a></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <?php
            }
            else{
                echo "No result found";
            }
        ?> 
    </body>  
</html>  


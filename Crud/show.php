<html>  
  
<head>
    <head>  
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>  
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" /> 
        <script type="text/javascript">  
$(document).ready(function ()  
{  
    $('#datatable').dataTable(  
    {});  
});  
        </script>  
        </script>  
    </head>  
  
    <body> 
    <?php
        include_once("connection.php");
        $result = mysqli_query($conn,"SELECT * FROM employee ORDER BY id DESC");
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
        ?> 
        <table border=2 id="datatable"> 
            <thead>  
                <tr style="color:red;">  
                    <th >Sr. No.</th>
                    <!-- <th>Emp. Id.</th> -->
                    <th>Name</th>
                    <th>Age</th>
                    <th>Experience</th>
                    <th>Department</th>
                    <th>Joining Date</th>
                    <th>Profile Pic</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>  
            </thead>
        <?php
        $i = 1;
        while($row = mysqli_fetch_array($result)) {
            
        ?>
        <tr>
        <td><?php echo $i; ?></td>
        <!-- <td>?php echo $row["id"]; ?></td> -->
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["age"]; ?></td>
        <td><?php echo $row["experience"]; ?></td>
        <td><?php echo $row["department"]; ?></td>
        <td><?php echo $row["joindate"]; ?></td>
        <td><?php echo $row["image"]; ?></td>
        <!-- <td><img src="Uploads/?php  echo $row['image'];?>" width="80" height="80"></td> -->
        <td><?php echo $row["location"]; ?></td>
        <td><?php echo $row["country"]; ?></td>
        <td ><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a></td>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalxzvbxc">Edit</button> -->
        <th><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn">Delete</a></th>

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
        </table>  
    </body>  
  
</html>
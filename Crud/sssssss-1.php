  




<html>  
  
<head>
    <head>  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>  
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" /> 
        <script type="text/javascript">  
$(document).ready(function (){  
    $('#datatable').dataTable(  
    {});  
});  
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
        <!-- <td><button data-toggle="modal" data-target="#myModal">Edit</button> -->
        <td ><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a></td>
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalxzvbxc">Edit</button> -->
        <th><a href="delete.php?id=<?php echo $row['id']; ?>" >Delete</a></th>

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
            <!----start modol--->
<div class="container">
  <h2>Click to Open Edit Page</h2>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
        <h2>Update Page</h2>
        </div>
        <div class="container-fluid">
                <form action="" id="simpleform" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                        Name :<br>
                        <input type="text" name="name" minlength="8"  value="<?php echo $name; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="image" value="<?php echo $old_image; ?>">
                        </div>
                        <div class="col-sm-6">
                        Age :<br>
                        <input type="number" name="age" min="18" value="<?php echo $age; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            Profile Pic : <br>
                            <input type="file" name="pic" value="<?php echo $pic; ?>">
                        </div>
                        <div class="col-sm-6">
                            Experience :<br>
                            <input type="number" name="experience" min="1" value="<?php echo $experience; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="lang">Department</label>
                            <select name="department"  id="lang" value="<?php echo $department; ?>">
                                <option value="COFOUNDER">COFOUNDER</option>
                                <option value="HR">HR</option>
                                <option value="DEVELOPER">DEVELOPER</option>
                                <option value="TESTER">TESTER</option>
                                <option value="DESINER">DESINER</option>
                                <option value="PHP DEVELOPER">PHP DEVELOPER</option>
                                <option value="WEB DEVELOPER">WEB DEVELOPER</option>
                            </select><br><br>
                        </div>
                        <div class="col-sm-6">
                            Joining Date : <br>
                            <input type="date" name="jdate" value="<?php echo $jdate; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            Address : <br>
                            <textarea name="address" id="add" rows="3" value="<?php echo $address; ?>" ></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label for="lang">Country</label>
                            <select name="country" id="lang" value="<?php echo $country; ?>">
                                <option value="INDIA">INDIA</option>
                                <option value="NEPAL">NEPAL</option>
                                <option value="WESTINDES">WESINDIES</option>
                                <option value="PAKISTAN">PAKISTAN</option>
                                <option value="CHINA">CHINA</option>
                                <option value="BHUTAN">BHUTAN</option>
                                <option value="THAILAND">THAILAND</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="submit" value="Update" name="update">
                        </div>
                    </div>
                </form> 
                <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
</div>
        <!---- end modol---->  
    </body>  
  
</html>  
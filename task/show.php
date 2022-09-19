<html>  
    <head>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script> 
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>  
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> 
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
            $result = mysqli_query($conn,"SELECT * FROM department ORDER BY id DESC");
        ?>
        <?php
            if (mysqli_num_rows($result) > 0) {
        ?> 
        <table border="2" id="datatable"> 
            <thead>  
                <tr style="color:red;">  
                    <th >Sr. No.</th>
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
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["experience"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["joindate"]; ?></td>
                <td><?php echo $row["image"]; ?></td>
                <td><?php echo $row["location"]; ?></td>
                <td><?php echo $row["country"]; ?></td>
                <th>
                    <button id="<?php echo $row["id"]; ?>" type="button" data-bs-toggle="modal" class="editbtn" data-bs-target="#Modal" onclick="getdata(this.id);"data-bs-whatever="<?php echo $row["id"]; ?>">Edit</button>
                </th>
                <th><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn" >Delete</a></th>
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
        <!----------------Start Modal--------->    
            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Edit Employee Data </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="update.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id"  id="id">
                                    <input type="hidden" name="old_image" id="old_image" value="">
                                    <label> Name </label>
                                    <input type="text" name="name" id="name" minlength="8" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Age </label>
                                    <input type="number" name="age" min="18" id="age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Experience </label>
                                    <input type="number" name="experience" min="1" id="experience" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lang">Department</label>
                                    <select name="department"  id="department" class="form-control">
                                        <option value="COFOUNDER">COFOUNDER</option>
                                        <option value="HR">HR</option>
                                        <option value="DEVELOPER">DEVELOPER</option>
                                        <option value="TESTER">TESTER</option>
                                        <option value="DESINER">DESINER</option>
                                        <option value="PHP DEVELOPER">PHP DEVELOPER</option>
                                        <option value="WEB DEVELOPER">WEB DEVELOPER</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Joindate </label>
                                    <input type="date" name="joindate" id="joindate" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Profile Pic </label><br>
                                    <img id="old_image2" src="" width="150" height="150"><br>
                                    <input type="file"  name="update_image" id="update_image" value="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address </label>
                                    <textarea class="form-control" name="address"   id="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lang">Country</label>
                                    <select name="country" id="country" class="form-control">
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" value="submit" name="submit" id="update_data" class="btn btn-primary">Update</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        <!------------End Modal-------->    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function getdata(recipient){
            // console.log(recipient);
                $.ajax({
                    type: "post",
                    url: "edit.php",
                    data: {'id': recipient},
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data); return false;
                        var oldImg = "Uploads/" + data.image;
                         $('#id').val(data.id);
                         $('#name').val(data.name);
                         $('#age').val(data.age);
                         $('#experience').val(data.experience);
                         $('#department').val(data.department);
                         $('#joindate').val(data.joindate);
                         $('#old_image').val(data.image);
                         $('#old_image2').attr("src", oldImg);
                         $('#address').val(data.location);
                         $('#country').val(data.country);
                    }
                });
            }
        </script>
    </body>  
</html>























Project: Wordpress( Floor Venue Dev)
Profile: Anjali Hooda
Client Name: Victor
Working with : without tracker
Time Estimate: 4
Task done today :- I have  updated  linkking in the website. 


Login and Registration Task Practice-
Time - 4 
Update Profile 
RND





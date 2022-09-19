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
                {});  
            });  
        </script>  
    </head>  
<body> 
    <center><h2><i>Image</i></h2></center>
    <?php
        include_once("connection.php");
        $result = mysqli_query($conn,"SELECT * FROM images ORDER BY id DESC");
    ?>
    <?php
        if (mysqli_num_rows($result) > 0) {
    ?> 
<table border="2" id="datatable"> 
    <thead>  
        <tr style="color:red;">  
            <th >Sr. No.</th>
            <th>Name</th>
            <th>Image</th>
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
            <td><img src="Imgfolders/<?php  echo $row['image']; ?>" width="150" height="100" ></td>
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
</script>

<!----------------Start Modal----------------->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Image </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id"  id="id">
                        <input type="hidden" name="old_image" id="old_image" value="">
                        <label> Name </label>
                        <input type="text" name="name" id="name" value=""/> <br><br>
                    </div>
                    <div class="form-group">
                        <label>Profile Pic </label>
                        <img id="old_image2" src="" width="50" height="50">
                        <input type="file"  name="update_image" accept="Imgfolders/png,Imgfolders/gif,Imgfolders/jpeg,Imgfolders/jpg" id="update_image" value="" class="form-control">
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
<!--------------End Modal----------------->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!------------Js---------------->
<script>
        function getdata(recipient){
            $.ajax({
                type: "post",
                url: "get.php",
                data: {'id': recipient},
                dataType: 'json',
                success: function(data) {
                     var oldImg = "Imgfolders/" + data.image;
                     $('#id').val(data.id);
                     $('#name').val(data.name);
                     $('#old_image').val(data.image);
                     $('#old_image2').attr("src", oldImg);
                    //console.log(data);
                }
            });
        }
</script>
<!------------Js---------------->
</body>  
</html>
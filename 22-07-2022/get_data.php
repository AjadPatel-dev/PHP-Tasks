<html>
    <head>
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <!-- <script src =  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> 
    </head>
    <body>
        <form action="update.php" method="post">
            <?php
                include_once("connection.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM student_data WHERE id = {$id};";
                $result = mysqli_query($conn, $sql) or die("Query unsuccessful...");
                if(mysqli_num_rows($result) > 0){
                foreach($result as $row){
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <label>First Name :</label>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" id="">
                        <input type="text" class="form-control"  name="fname" value="<?php echo $row['fname']; ?>" id="" required="">
                    </div>
                    <div class="col-sm-6">
                        <label>Last Name :</label>
                        <input type="text" class="form-control"  name="lname" value="<?php echo $row['lname']; ?>" id=""  required="" >
                    </div>
                </div><br>
                <div class="row" >
                    <div class="col-sm-6" >
                        <label>Email :</label>
                        <input type="text" class="form-control"  name="email" value="<?php echo $row['email']; ?>" id=""  required="">
                    </div>
                    <div class="col-sm-6" >
                        <lable>Number :</lable>
                        <input type="text" class="form-control" name="number" value="<?php echo $row['number']; ?>" id=""  required="" >
                    </div>
                </div><br>
                <input type="submit" value="Upadte" name="">
            </div>
            <?php
                }
                }
            ?>
        </form>
        <script>

        </script>
    </body>
</html>


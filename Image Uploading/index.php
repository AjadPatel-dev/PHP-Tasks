<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
</head>
<body>
    <center><h2><i>Image Uploading</i></h2></center>
    <form action="index.php" method="post" id="simpleform" enctype="multipart/form-data">
        Name : <br><br>
        <input type="text" name="user_name" id="user_name" value=""/> <br><br>
        Image : <br><br>
        <input type="file" name="image" accept="Imgfolders/png,Imgfolders/gif,Imgfolders/jpeg,Imgfolders/jpg" id="image" value=""/><br><br>
        <input type="submit" name="submit" value="submit">
        <br>
    </form>
    <script>
       // alert('dsdsd');
        $( "#simpleform" ).validate({
	        rules: {
		        image: {
		            required: true,
		        }
	        }
	    });
	</script>

</body>
</html>
<?php
include_once ("connection.php");
if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $image = $_FILES['image']['name'];
    if($_FILES['image']['name']){
        move_uploaded_file($_FILES['image']['tmp_name'], "Imgfolders/".$_FILES['image']['name']);
        $img="Imgfolders/".$_FILES['image']['name'];
        }
        $query = "INSERT INTO images(name,image) VALUES('$user_name','$image')";
    if(mysqli_query($conn,$query)){
       /// echo "<script> alert('Image Upload successfully')</script>";
        header("Location: show.php");
    
    }else{
        echo "<script> alert('Image Not Uploaded ')</script>";
        //header("Location: index.php");
    }

}
?>
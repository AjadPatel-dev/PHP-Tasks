<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
</head>
<body>
	<h2>Employee Details</h2>
	<form action="index.php" method="post" id="simpleform" enctype="multipart/form-data">
	<fieldset style="width:50%;">
	<legend>Please Submit Your Data</legend>

	Name : <br>
	<input type="text"  minlength="8"  name="name" id="name">
	<p class="nameerror" style="color:red;"></p>
	Age : <br>
	<input type="text" min="18" max="55" name="age" id="age" require >
	<p class="ageerror" style="color:red;"></p>
	Experience : <br>
	<input type="number" min="1" name="experience" id="exp" require>
	<p class="experror" style="color:red;"></p>
<label for="lang">Department</label>
    <select name="department"  id="lang" required>
    <option value="COFOUNDER">COFOUNDER</option>
    <option value="HR">HR</option>
    <option value="DEVELOPER">DEVELOPER</option>
    <option value="TESTER">TESTER</option>
    <option value="DESINER">DESINER</option>
    <option value="PHP DEVELOPER">PHP DEVELOPER</option>
    <option value="WEB DEVELOPER">WEB DEVELOPER</option>
    </select><br><br>
	Joining Date : <br>
	<input type="date" name="jdate" id="jdate" require><br>
	<p class="jderror" style="color:red;"></p>
	Profile Pic : <br>
	<input type="file" name="pic" id="pic" >
	<p class="picerror" style="color:red;"></p>
	Address : <br>
	<textarea name="address" id="add" require rows="3"></textarea>
	<!-- <input type="text" name="address" id="add" require> -->
	<p class="aderror" style="color:red;"></p>
<label for="lang">Country</label>
    <select name="country" id="lang" required>
    <option value="INDIA">INDIA</option>
    <option value="NEPAL">NEPAL</option>
    <option value="WESTINDES">WESINDIES</option>
    <option value="PAKISTAN">PAKISTAN</option>
    <option value="CHINA">CHINA</option>
    <option value="BHUTAN">BHUTAN</option>
    <option value="THAILAND">THAILAND</option>
	</select><br><br>
	<input type="submit" name="submit" value="submit"><br>
	</fieldset>
	</form>

</body>
<script>
	// jQuery.validator.setDefaults({
	// debug: true,
	// success: "valid"
	// });
	$( "#simpleform" ).validate({
	rules: {
		name: {
		required: true,
		maxlength: 23
		}
	}
	});
	</script>
</html>

<?php
include_once("connection.php");
if(isset($_POST['submit'])){
$name = $_POST['name'];
$age = $_POST['age'];
$experience = $_POST['experience'];
$department = $_POST['department'];
$jdate = $_POST['jdate'];
$pic = $_FILES['pic']['name'];
$address = $_POST['address'];
$country = $_POST['country'];

if($_FILES['pic']['name']){
	move_uploaded_file($_FILES['pic']['tmp_name'], "Uploads/".$_FILES['pic']['name']);
	$img="Uploads/".$_FILES['pic']['name'];
	}
$query = "INSERT INTO employee(name,age,experience,department,joindate,image,location,country) VALUES('$name','$age','$experience','$department','$jdate','$pic','$address','$country')";
if(mysqli_query($conn,$query)){
	echo "record inserted";
    header("Location: show.php");

}else{
    echo "Record not inserted";
	header("Location: index.php");
}
}
?>
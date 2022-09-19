<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
	</head>
	<body>
		<center><h2>Employee Details</h2></center>
		<form action="index.php" method="post" id="simpleform" enctype="multipart/form-data">
			<fieldset style="width:50%;">
				<legend>Please Submit Your Data</legend>
				Name : <br>
				<input type="text"  minlength="8"  name="name" id="name"><br><br>
				Age : <br>
				<input type="number" min="18" name="age" id="age" require ><br><br>
				Experience : <br>
				<input type="number" min="1" name="experience" id="exp" require><br><br>
				<label for="lang">Department</label><br>
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
				<input type="date" name="jdate" id="jdate" require><br><br>
				Profile Pic : <br>
				<input type="file" name="pic" id="pic" ><br><br>
				Address : <br>
				<textarea name="address" id="add" require rows="3"></textarea><br><br>
				<label for="lang">Country</label><br>
			    <select name="country" id="lang" required>
				    <option value="INDIA">INDIA</option>
				    <option value="NEPAL">NEPAL</option>
				    <option value="WESTINDES">WESINDIES</option>
				    <option value="PAKISTAN">PAKISTAN</option>
				    <option value="CHINA">CHINA</option>
				    <option value="BHUTAN">BHUTAN</option>
				    <option value="THAILAND">THAILAND</option>
				</select><br><br>
				<center><input type="submit" name="submit" value="submit"><br></center>
			</fieldset>
		</form>
	</body>
	<script>
		$( "#simpleform" ).validate({
			rules: {
				name: {
					required: true,
					maxlength: 26
				}
			}
		});
	</script>
</html>
<?php
	include_once("connection.php");
	if(isset($_POST['submit'])){
		echo "<pre>";
		print_r($_POST);
		exit;
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
		$query = "INSERT INTO department(name,age,experience,department,joindate,image,location,country) VALUES('$name','$age','$experience','$department','$jdate','$pic','$address','$country')";
		if(mysqli_query($conn,$query)){
			echo "record inserted";
		    header("Location: show.php");
		}else{
		    echo "Record not inserted";
			header("Location: index.php");
		}
	}
?>
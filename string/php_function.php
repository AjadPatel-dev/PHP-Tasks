<html>
<head>
<title>PHP Program To find Square root of a number</title>
</head>
<body>
<form method="post">
<table border="0">
<tr>
<td><input type="text" name="num1" value="" placeholder="Enter a value"/></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Submit"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{
$a = $_POST['num1'];
$SquareRoot = sqrt($a);
$precision = 4;
echo "SquareRoot of a number " .$a." is "." = ".number_format( $SquareRoot, $precision);
return 0;
}
?>
</body>
</html>
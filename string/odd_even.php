<html>  
<body>  
<form method="post">  
    Enter a number :  
    <input type="text" name="number">  
    <input type="submit" value="Submit">  
</form>  
</body>  
</html>  
<?php   
    if($_POST){  
        $number = $_POST['number'];    
        if(($number % 2) == 0){  
            echo "$number Is even number";  
        }else{  
            echo "$number Is Odd number";  
        }  
    }  
?>  
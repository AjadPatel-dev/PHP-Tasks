<?php  
    function add($x,$y){  
        $sum=$x+$y;  
        echo "Sum = $sum <br><br>";  
    }  
    function sub($x,$y){  
        $sub=$x-$y;  
        echo "Diff = $sub <br><br>";  
    }
    function mul($x,$y){  
        $mul=$x*$y;  
        echo "Diff = $mul <br><br>";  
    }
    function div($x,$y){  
        $div=$x/$y;  
        echo "Diff = $div <br><br>";  
    }
    if(isset($_POST['add'])){  
        add($_POST['first'],$_POST['second']);  
    }     
    if(isset($_POST['sub'])){  
        sub($_POST['first'],$_POST['second']);  
    }
    if(isset($_POST['mul'])){  
        mul($_POST['first'],$_POST['second']);  
    } 
    if(isset($_POST['div'])){  
        div($_POST['first'],$_POST['second']);  
    }
?>  
<form method="post">  
Enter first number: <input type="number" name="first"/><br><br>  
Enter second number: <input type="number" name="second"/><br><br>  
<input type="submit" name="add" value="ADDITION"/>  
<input type="submit" name="sub" value="SUBTRACTION"/>  
<input type="submit" name="mul" value="MULTIPLICATION"/>  
<input type="submit" name="div" value="DIVISON"/>  
</form> 
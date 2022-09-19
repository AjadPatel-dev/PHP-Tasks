<html>
    <head></head>
    <body>
        <form Method="post"><br><br>
            Enter number:<br>
            <input type="text" name="value"/>
            <input type="submit" name="btn" value="print table" />
        </form>
    </body>
</html>
<?php
if(isset($_POST['btn'])){
    $n = $_POST['value'];
    $res = 0;
    for($i=1; $i<=10; $i++){
        $res = $n*$i;
        echo $res;
        echo "<br />";
    }
}
?>
<?php

// write a rogram to print the sum of array items
$arr = array(23,33,45,6,7,236);
//$sum = 0;
//echo "This array element is: count($arr)";
// echo "Sum of array elements is: ";
// $sum = array_sum ($arr);
// echo array_sum($arr);
// echo "<br>";
// print_r ($sum);

$sum = 0;
$count = count($arr);
for($i=0; $i<$count; $i++){
    $sum = $sum + $arr[$i];
}
echo $sum;
?>
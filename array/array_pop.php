<?php
// Array Pop = Array element remove the one element of array end side
// Array push = Array element add the element of the array end side

//$arr = array("orange", "banana", "apple", "raspberry");
//$arr = array(12,13,15,16,18);
//$arr = array("orange"=>1, "banana"=>2, "apple"=>3, "raspberry"=>4);
$arr = array(0=>"orange", 1=>"banana", 2=>"apple", 3=>"raspberry");
$pop = array_pop($arr);
print_r($arr);

echo "<br>";
$arrr = array(12,13,15,16,18);
array_push($arrr,  "raspberry");
print_r($arrr);




?>
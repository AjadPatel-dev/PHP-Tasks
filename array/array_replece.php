<?php
//Array_Replace = Array replace  to the change the array element
$arr = array("orange", "banana", "apple", "Mango","Guavava");
$rearr = array(0 => "pineapple", 4 => "Papaya",5 => "grapes");
$rearr2 = array();

$boul = array_replace($arr, $rearr, $rearr2);
print_r($boul);
?>
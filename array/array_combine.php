<?php
//Array combine => Array combine is change the First array key and second array value .
$arr = array("green", "red", "yellow");
$sarr = array("avocado", "apple", "banana");
$res = array_combine($arr, $sarr);

print_r($res);
?>
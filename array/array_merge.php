<?php
//array merge function
$arr = array(
    "0"=>"aman",
    "1"=>"anil",
    "2"=>"anchal sir",
    "3"=>"surender sir",
    "4"=>"santoh sir",
);

$mer = array("santoshsir","arushi","Ajad","vikashsir");
$friends = array_merge($arr,$mer);
print_r($friends);
?>
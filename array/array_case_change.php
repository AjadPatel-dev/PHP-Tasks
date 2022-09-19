<?php
//Array case change
$arr = array("ajad"=>1, "roshni"=>2, "abhisek maurya"=>3 , "manish"=>4, "ved prakash"=>5, "ritesh sharma"=>6, "sahil"=>7);
print_r(array_change_key_case($arr, CASE_UPPER));
echo "<br>";
$arrr = array("MANISH"=>1 ,"ANIL"=>2 ,"VIKASH"=> 3,"SANTOSH"=>4 ,"SURAJ"=>5 ,"SANDEEP CHAURASIYA"=> 6,"MAHESH"=> 7,"RAVI"=> 8);
print_r(array_change_key_case($arrr,  CASE_LOWER));
?>
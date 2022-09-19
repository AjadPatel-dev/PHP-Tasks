<?php
$arr = array(12,23,34,45,56,67,78,89,90);
$count = count($arr);
echo "<br />";
$sum = 0;
for($i=0;$i<$count;$i++){
    $sum += $arr[$i];
   }
   echo $sum ;
?>
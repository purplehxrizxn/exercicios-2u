<?php

$array1 = explode(', ',$_POST['array1']);
$array2 = explode(', ',$_POST['array2']);
$arrayNovo = [];


for($i = 0; $i < sizeof($array1); $i++){
    $arrayNovo[$i] = $array1[$i];
}
for($j = 0; $j < sizeof($array2); $j++){
    array_push($arrayNovo, $array2[$j]);
}


print_r($array1);
echo "<br>";
print_r($array2);
echo "<br>";
print_r($arrayNovo);
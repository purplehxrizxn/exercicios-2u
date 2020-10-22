<?php

$data1 = $_POST['data1'];
$data2 = $_POST['data2'];

function convertData($data){

    $data = strtotime($data);

    $data = date('d/m/Y', $data);

    return $data;
}   

function daysDifference($d1, $d2){

    if ($d1 < $d2){

        $difference = strtotime($d2) - strtotime($d1);

    } else {

        $difference = strtotime($d1) - strtotime($d2);

    }

    $days = floor($difference / (60 * 60 * 24));

    echo "A diferença é de: " . $days . " dias";

}

echo "Data convertida: " . convertData($data1);
echo "<br>";
echo "Data convertida: " . convertData($data2);
echo "<br>";
daysDifference($data1, $data2);



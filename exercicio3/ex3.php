<?php

$arr1 = [];

$arr1[0] = $_POST['num1'];
$arr1[1] = $_POST['num2'];
$arr1[2] = $_POST['num3'];
$arr1[3] = $_POST['num4'];
$arr1[4] = $_POST['num5'];
$arr1[5] = $_POST['num6'];

sort($arr1);

foreach ($arr1 as $key => $value) {
    echo $value . "<br>";
}
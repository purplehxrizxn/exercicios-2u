<?php

$num = $_POST['number'];

if (is_numeric($num)){
    operations($num);
} else {
    echo "Error!";
}

function operations($num){

    $numero = floatval($num);
    $a = ($numero * 50) / 100;
    $b = ($numero * 10) / 100;
    $c = ($numero * 20) / 100;
    $d = ($numero * 5.5) / 100;
    $e = ($numero * 0.1) / 100;
    $f = $a + $b + $c + $d + $e;
    
    echo "A) " ."50% do valor = " . number_format($a, 2) . "<br>";
    echo "B) " ."10% do valor = " . number_format($b, 2) . "<br>";
    echo "C) " ."20% do valor = " . number_format($c, 2) . "<br>";
    echo "D) " ."5.5% do valor = " . number_format($d, 2) . "<br>";
    echo "E) " ."1% do valor = " . number_format($e, 2) . "<br>";
    echo "F) " ."Somatória = " . number_format($f, 2) . "<br>";

}
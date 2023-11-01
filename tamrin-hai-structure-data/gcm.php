<?php

$number1 = 20;
$number2 = 12;

function gcm($n1, $n2)
{
    $max = max($n1, $n2);
    $min = min($n1, $n2);

    $baghimande = ($max % $min);
    if($baghimande == 0){
        return $min;
    }

    return gcm($min, $baghimande);
}

echo gcm($number1, $number2);


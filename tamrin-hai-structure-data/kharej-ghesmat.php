<?php
$number = 5;
$den = 2;

function division($number, $den,$i=0)
{
    if($den == 0) return ['k' => 0, 'b' => 0];
    if($den == 1) return ['k' => 10, 'b' => 0];
    if($number< $den) return ['k' => 0, 'b' => $number];

    $result = division($number-$den, $den, $i+1);
    echo $i;
    return ['k' => $i, 'b' => $result['b']];
}

print_r(division($number, $den));


<?php
$number = 3;
$count = 3;

function exponent($number, $count, $mul=null)
{
    if($count == 0) return 1;
    if($count == 1) return $number;

    return $number*exponent($number, $count-1);
}

echo exponent($number, $count);

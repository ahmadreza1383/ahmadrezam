<?php
$number = 3;
$count = 3;

function multiplication($number, $count)
{
    if($count == 0) return 0;
    if($count == 1) return $number;

    return $number+multiplication($number, $count-1);
}

echo multiplication($number, $count);

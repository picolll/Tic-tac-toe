<?php

// Binary Gap
function solution($N)
{
    $a         = decbin($N);
    $start     = false;
    $count     = 0;
    $tempCount = 0;
    $length    = strlen($a);

    if ($length <= 1) {
        return 0;
    }

    for ($i = 0; $i < $length; $i++) {

        if ($start && $a[$i]) {
            if ($tempCount > $count) {
                $count = $tempCount;
            }
            $tempCount = 0;
            continue;
        }

        if (!$start && $a[$i]) {
            $start = true;
        }

        if ($start && $a[$i] == 0) {
            $tempCount++;
        }

    }

    return $count;
}


$c = getrandmax();
for ($b = getrandmax(); $b > $c - 100; $b--) {
    solution($b);
}

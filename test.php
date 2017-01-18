<?php
/**
 * N and K are integers within the range [0..100];
 * each element of array A is an integer within the range [−1,000..1,000].
 * @param $A
 * @param $K
 * @return array
 */
function cyclicRotation($A, $K)
{

    $count = count($A);

    if ($K == 0 || $count <= 1) {
        return $A;
    }

    if ($K > $count) {
        $K = $K % $count;
    }
    $B = [];
    for ($i = 0; $i < $count; $i++) {

        $nK = ($i + $K) % $count;
        $B[$nK] = $A[$i];
    }
    return $B;

}

//var_dump(cyclicRotation([2,4,7,11], 1));

/**
 * @param $A
 * @return int|string
 */
function oddOccurrencesInArray($A)
{
    if (count($A) == 1) {
        return $A[0];
    }
    $count = count($A);
    $B     = [];

    for ($i = 0; $i < $count; $i++) {
        if (isset($B[$A[$i]])) {
            unset($B[$A[$i]]);
        } else {
            $B[$A[$i]] = true;
        }
    }
    $C = array_diff($B, [false]);
    foreach ($C as $key => $value) {
        return $key;
    }

    return 'Not found';
}


//echo oddOccurrencesInArray([4, 11, 23, 23, 11]);//11, 23, 23, 11

/**
 * binaryGap
 *
 * @param $N
 * @return int
 */
function binaryGap($N)
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


//$c = getrandmax();
//for ($b = getrandmax(); $b > $c - 100; $b--) {
//    solution($b);
//}

<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

function diagonalDifference($arr) {
    // Write your code here
    $leftRight = [];
    $rightLeft = [];
    foreach($arr as $i => $sub){
        $subLength = count($sub);
        $leftRight[] = $sub[$i];
        $rightLeft[] = $sub[$subLength - ++$i];
    }
    $sumLeftRight = array_sum($leftRight);
    $sumRightLeft = array_sum($rightLeft);
    return abs($sumLeftRight - $sumRightLeft);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);

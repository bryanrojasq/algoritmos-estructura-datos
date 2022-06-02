<?php

/*
 * Complete the 'miniMaxSum' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function miniMaxSum($arr) {
    // Write your code here
    $minVal = $arr[0];
    $maxVal = $arr[0];
    foreach($arr as $val) {
        if($val <= $minVal) {
            $minVal = $val;
        } elseif($val >= $maxVal) {
            $maxVal = $val;
        }
    }
    // echo $minVal ." ". $maxVal;
    if($minVal === $maxVal) {
        array_splice($arr, 0, 1);
        $minSum = $arr;
        $maxSum = $arr;
    } else {
        $minSum = array_diff($arr, [$maxVal]);
        $maxSum = array_diff($arr, [$minVal]);        
    }

    print array_sum($minSum) ." ".array_sum($maxSum);
}

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

miniMaxSum($arr);

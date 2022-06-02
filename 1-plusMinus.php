<?php

/*
 * Complete the 'plusMinus' function below.
 *
 * The function accepts INTEGER_ARRAY arr as parameter.
 */

function plusMinus($arr) {
    // Write your code here
    $length = count($arr);
    $positive = 0;
    $negative = 0;
    $zero = 0;
    foreach($arr as $el) {
        if($el > 0) {
            $positive++;
        } elseif($el < 0) {
            $negative++;
        } else {
            $zero++;
        }
    }
    print_r(round($positive/$length, 6));
    print_r("\n");
    print_r(round($negative/$length, 6));
    print_r("\n");
    print_r(round($zero/$length, 6));
}

$n = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

plusMinus($arr);

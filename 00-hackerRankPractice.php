<?php



/*
 * Complete the 'findNumber' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY arr
 *  2. INTEGER k
 */

function findNumber($arr, $k) {
    // Write your code here
    for($i=0; $i < count($arr); $i++) {
        if($arr[$i] == $k) return "YES";
    }
    return "NO";
}

/*
 * Complete the 'oddNumbers' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER l
 *  2. INTEGER r
 */

function oddNumbers($l, $r) {
    // Write your code here
    $odds = [];
    for($i = $l; $i <= $r; $i++) {
        if($i%2 != 0) $odds[] = $i;
    }
    return $odds;
}
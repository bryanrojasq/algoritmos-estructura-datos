<?php

function countingSort($arr) {
    $countArray = array_fill(0 , 100 , 0);
    foreach($arr as $number){
        $countArray[$number]++;
    }
    return $countArray;
}


function countingSort($arr) {
    // Write your code here
    $n = count($arr);
    $result = [];
    
    for($i = 0; $i < 100; $i++) {
        array_push($result,0);
    }
    for($i = 0; $i < $n; $i++) {
        $result[$arr[$i]] += 1;
    }
    return $result;
}
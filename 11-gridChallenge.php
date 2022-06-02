<?php

/*
 * Complete the 'gridChallenge' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING_ARRAY grid as parameter.
 */

function gridChallenge($grid) {
    $sortedGrid = [];
    for($i=0; $i < count($grid); $i++){
        $strSplit = str_split($grid[$i]);
        sort($strSplit);
        $sortedGrid[] = implode('', $strSplit);
    }
    for($i=0; $i < count($sortedGrid); $i++){
        for($j=0; $j < count($sortedGrid); $j++){
            if($j+1 < count($sortedGrid)){
                if($sortedGrid[$j][$i] > $sortedGrid[$j+1][$i]){
                    return "NO";
                }
            }
        }
    }
    return "YES";
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));

    $grid = array();

    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }

    $result = gridChallenge($grid);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);

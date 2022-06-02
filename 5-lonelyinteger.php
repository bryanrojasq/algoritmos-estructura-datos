<?php

/*
 * Complete the 'lonelyinteger' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function lonelyinteger($a) {
    // Write your code here    
    $unique = array_diff($a, 
                array_diff_assoc($a, 
                    array_unique($a)
                )
            );
    return reset($unique);
}

function lonelyinteger($a) {
    // Write your code here
    $lonely = 0;
    for($i = 0; $i < count($a); $i++){
        $counter = 0;
        for($j = 0; $j < count($a); $j++){
            if($a[$i] == $a[$j]){
                $counter = $counter + 1;
            }
        }
        if($counter < 2){
            $lonely = $i;
            return $a[$lonely];
        }
    }
}

function lonelyinteger($a) {
    // Write your code here
    foreach(array_count_values($a) as $key => $val) {
        if($val == 1) {
            return $key;
        }
    }
}

function lonelyinteger($array) {
   $valueCount = array();
   foreach ($array as $value) {
      $valueCount[$value]++;
   }

   $return = array();
   foreach ($valueCount as $value => $count) {
      if ( $count == 1 ) {
         $return[] = $value;
      }
   }

   return reset($return);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$a_temp = rtrim(fgets(STDIN));

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = lonelyinteger($a);

fwrite($fptr, $result . "\n");

fclose($fptr);

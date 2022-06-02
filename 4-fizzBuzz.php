<?php



/*
 * Complete the 'fizzBuzz' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function fizzBuzz($n) {
    // Write your code here
    for($i = 1; $i <= $n; $i++) {
        // print $i;
        if($i%3 == 0){
            print "Fizz";

            if($i%5 == 0) {
                print "Buzz";
            }
        } elseif($i%5 == 0) {
            print "Buzz";

            if($i%3 == 0) {
                // print "Buzz";
            }
        } else {
            print $i;
        }
        print "\n";
    }

}

$n = intval(trim(fgets(STDIN)));

fizzBuzz($n);

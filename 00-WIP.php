<?php
/*
 * El coste es O(n) == func(n)
 * f(n) = O(g(n))
 * tasa de crecimiento
 */


function esta_elemento($x, $v) {
	for($i = 0; $i < $n; ++$i) {
		if($x == $v[$i]) return true;
	}
	return false;
}

// Big notation

<?php #Binary search

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        for($i=0; $i < count($nums); $i++) {
            if($nums[$i] == $target){
                return $i;
            }
        }
        return -1;
    }
}


?>

<script>
// Recursive
function maxNumber(list) {
	var max;
	var maxNum = list[0];
	if(list.length == 1) {
		return maxNum;
	} else {
		var listSlice = list.slice(1, list.length);
		var maxListSlice = maxNumber(listSlice);
		if(maxNum > maxListSlice) {
			maxNum = maxNum;
		} else {
			maxNum = maxListSlice;
		}

	}
	return maxNum;
}
document.write(maxNumber([7, 4, 1]));

function maxNumberIterative(list) {
	var max = list[0];
	for(var n = 1; n < list.length; n++) {
		var item = list[n];
		if(max < item) {
			max = item;
		}
	}
	return max;
}
document.write(maxNumberIterative([7, 4, 1]));
</script>
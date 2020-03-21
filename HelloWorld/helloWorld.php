<?php
$a = [
    [1,10,3 ,8],
    [12,2,9,6],
    [5,7,4,11],
    [3,7,16,5]
];

function getMax($a) {
    if (empty($a)) {
        return null;
    }

    $maxMatrix = [];
    $rows = count($a);
    $cols = count($a[0]);

    for ($i=0; $i<$rows; $i++) {
        for ($j=0; $j<$cols; $j++) {
            $maxMatrix[$i][$j] = 0;
        }
    }

    for ($i=0; $i<$rows; $i++) {
        for ($j=0; $j<$cols; $j++) {
            $left = $maxMatrix[$i-1][$j] ?? 0;
            $up = $maxMatrix[$i][$j-1] ?? 0;
            $maxMatrix[$i][$j] = max($left, $up) + $a[$i][$j];
        }
    }

    return $maxMatrix[$rows-1][$cols-1];
}

$result = getMax($a);
echo $result;

<?php

$graph = [];

/*
 *      1->F
 *     /\  ^
 *    5  2 |
 *    \ /  |
 *     3-> 4
 */
$graph['5'] = ['1', '3'];
$graph['1'] = ['2', 'F'];
$graph['3'] = ['2', '4'];
$graph['2'] = [];
$graph['4'] = ['F'];


$start = $graph['5'];

while (count($start) > 0) {
    echo $start[0] . '<br \>';
    if ($start[0] === 'F') {
        echo "END!!!!";
        break;
    }
    if (isset($graph[$start[0]])) {
        $start = array_merge($start, $graph[$start[0]]);
        array_shift($start);
    }
}



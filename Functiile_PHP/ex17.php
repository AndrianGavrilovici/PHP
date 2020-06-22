<?php
    $arr = range(1, 5);
    array_splice($arr, 1, 0, range('a', 'b'));
    array_splice($arr, count($arr)-1, 0, ['c']);
    array_splice($arr, count($arr), 0, 'e');
    print_r($arr);
    print("<br>");
    for ($i=0; $i < count($arr); $i++) { 
        print($arr[$i] . " ");
    }
?>
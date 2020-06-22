<?php
    $arr = range(1, 5);
    $newArr = array_splice($arr, 1, count($arr)-2);
    print_r($newArr);
?>
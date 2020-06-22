<?php
    $arr1 = [1, 2, 3, 4, 5];
    $arr2 = array_splice($arr1, 0,1);
    array_splice($arr1, 0, 2, $arr2);
    print_r($arr1);
?>
<?php
    $arr1 = range('a', 'c');
    $arr2 = range(1, 3);
    $arr3 = array_combine($arr1, $arr2);
    print_r($arr3);
?>
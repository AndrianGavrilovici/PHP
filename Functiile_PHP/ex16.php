<?php
    $arr = range(1, 5);
    array_splice($arr, 3, 0, range('a', 'c'));
    print_r($arr);
?>
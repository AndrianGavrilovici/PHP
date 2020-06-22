<?php
    $arr = ['a', 'b', 'c'];
    $arr = array_pad ($arr, sizeof($arr) * 2, "-");
    print_r ($arr);
?>
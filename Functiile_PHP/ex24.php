<?php
    $arr = range('a', 'e');
    print_r($arr);
    print("\n");
    $arr = array_replace($arr, [0=>'!', 3=>'!!']);
    print_r($arr);
    print("\n");
?>
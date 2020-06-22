<?php
    $arr = range('a', 'z');
    shuffle($arr);
    $str_arr = substr(implode("", $arr), 0, 6);
    print($str_arr . "\n");
?>
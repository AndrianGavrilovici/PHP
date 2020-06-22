<?php
    $arr = range(1, 8);
    print_r ($arr);
    $str = "";
    while (sizeof ($arr) > 0) {
        $str .= array_shift ($arr);
        $str .= array_pop ($arr);
    }
    print ($str . PHP_EOL);
?>
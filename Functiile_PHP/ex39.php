<?php
    $arr = range (1, 5);
    $newArr = array_map ("sqrt", $arr);
    print_r ($newArr);    
?>
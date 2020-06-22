<?php
    $arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
    print_r($arr);
    $index = array_search('-', $arr);
    print("\nPozitia primului \"-\" = " . $index . "\n");
    array_splice($arr, $index , 1);
    print_r($arr);
    print("\n");
?>
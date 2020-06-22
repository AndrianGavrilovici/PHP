<?php
    print("<b>ex12</b><br>");
    $arr1 = [1, 2, 3];
    $arr2 = ['a', 'b', 'c'];
    $array = array_merge($arr1, $arr2);
    foreach($array as $show)
        print($show);
?>
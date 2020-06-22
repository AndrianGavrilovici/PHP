<?php
    print("<b>ex13</b><br>");
    $arr = array(1, 2, 3, 4, 5);
    $result = array_slice($arr, 1, count($arr)-2);
    print_r($result);
?>
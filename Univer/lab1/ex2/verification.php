<?php
    $x = $_GET["x"];
    $y = $_GET["y"];
    if(!is_numeric($x) || !is_numeric($y)){
        echo "x sau y nu a fost introdus corect";
        exit(1);
    }
    if ($x > $y) echo "true";
    else echo "false";
?>
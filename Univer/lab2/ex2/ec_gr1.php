<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    if(!is_numeric($a) || !is_numeric($b)){
        echo "a sau b nu a fost introdus corect";
        exit(1);
    }
    $b = $b * -1;
    echo "x=". $b/$a;
?>
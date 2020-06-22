<?php
    $string = $_GET["vector"];
    echo "numerele introduse sunt: ". $string. "<br><br>";
    $string = rtrim($string);
    $arr = explode(" ",$string);
    
    for($i=0;$i<count($arr)/2;$i++){
        if ($arr[$i] != $arr[count($arr)-$i-1]){
            echo "Nu este simetric"; exit(1);
        }
    }
    echo "Este simetric";
?>
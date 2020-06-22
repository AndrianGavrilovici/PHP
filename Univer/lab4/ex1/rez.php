<?php
    $n = $_GET["n"];
    $x = $_GET["x"];
    if(!is_numeric($n)){
        echo "nu a fost introdus corect n";
        exit(1);
    }
    $a = array();
    for($i=1;$i<=$n;$i++){
        $a[$i]=rand(-500, 500);
    }
    $i = 0;
    $f = false;
    do{
        $i++;
        if($x==$a[$i])$f = true;
        else $f = false;
    }while(!($f || ($i==$n)));
    if ($f) echo 'Pozitia '. $i. '<br>';
    else echo 'Numarul '. $x. ' nu este componenta a vectorului<br>';
    for($i=1;$i<=$n;$i++)
        echo $a[$i]. ' ';
?>
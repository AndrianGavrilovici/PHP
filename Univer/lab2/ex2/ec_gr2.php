<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];
    if(!is_numeric($a) || !is_numeric($b) || !is_numeric($c)){
        echo "a,b sau c nu a fost introdus corect";
        exit(1);
    }
    if($a!=0&&$b!=0)
    {
        $d=$b*$b-4*$a*$c;
        if($d>=0) {
            $x1=(-$b+sqrt($d))/(2*$a);
            $x2=(-$b-sqrt($d))/(2*$a);
            echo "x1=". $x1. "<br>";
            echo "x2=". $x2. "<br>";
        }
        else
        if($d<0) {
            echo "Ecuatia nu are solutii in R";
        }
    }
    if ($a==0&&$b==0&&$c==0)
    {
        echo "Ecuatia are o infinitate de solutii!";
    } else if($a==0&&$b==0){
        echo "Ecuatia nu are solutii!";
    } else if($a==0) {
        if($c!=0) {
            $x1=-$b/$c;
            echo "x=". $x1;
        }
        else echo "Ecuatia nu are solutii!";
    } else if($b==0) {
        if(-$c/$a>=0&&$c!=0){
            $x1=sqrt(-$c/$a);
            echo "x=". $x1;
        } else if($c==0) {
            echo "x=0";
        } else echo "Ecuatia nu are solutii!";
    }
?>
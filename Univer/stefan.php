<?php
for($a=1;$a<=999;$a++){
    for($b=1;$b<=999;$b++){
        $prim = (3 / ($a + 2));
        //echo"prim = ". $prim. "<br>";
        $doi = (7 / ((2 * $b) + 3));
        //echo "doi = ". $doi. "<br>";
        $x = $prim + $doi;
        
        if($x == (int)$x){
            echo "a= ". $a. " b= ". $b. "<br>";
            //echo("x =". $x. "<br>");
        }
    }
}
?>
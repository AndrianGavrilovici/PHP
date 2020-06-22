<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laborator 3. Structuri repetitive</title>
</head>
<body>
    <pre>
            Laborator 3. Structuri repetitive
            ============================================
            2. Turbo Pascal, pagina 35, problema 2 + N, unde N este numarul de ordine din catalog.
    </pre>
    <p>Ex7. Sa se determine daca exista 4 numere naturale consecutive, astfel incat suma patratelor lor este egala cu suma patratelor urmatoarelor 3 numere</p>
</body>
</html>
<?php
    for($i=1;$i<=50;$i++){
        $num = pow($i, 2)+pow($i+1, 2)+pow($i+2, 2)+pow($i+3, 2);
        $num1 = pow($i+4, 2)+pow($i+5, 2)+pow($i+6, 2);
        if($num==$num1){
            echo "exista<br>";
            echo $i. '^2 + '. ($i+1). '^2 + '. ($i+2). '^2 + '. ($i+3). "^2 = ". $num. "<br>";
            echo ($i+4). '^2 + '. ($i+5). '^2 + '. ($i+6). "^2 = ". $num1. "<br>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laborator 3. Structuri repetitive</title>
</head>
<body>
    <pre>
            Laborator 3. Structuri repetitive
            =============================
            1. Transpunerea in PHP a unei probleme rezolvate. Turbo Pascal, pagina 31.
    </pre>
    <p>Sa se scrie un program ce calculeaza si afiseaza la ecran patratele numerelor 11, 12, 13, ..., 35</p>
    
</body>
</html>
<?php
    for($i=11;$i<=35;$i++){
        echo pow($i, 2). " ";
    }
?>
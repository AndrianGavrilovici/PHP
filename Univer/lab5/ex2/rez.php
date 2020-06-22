<?php
    $text = trim($_GET["text"]);
    $textAr = explode("\n", $text);
    $textAr = array_filter($textAr, 'trim');
    $myfile = fopen("proba.txt", "w") or die("Unable to open file!");
    foreach ($textAr as $line) {
        fwrite($myfile, $line);
    }
    fclose($myfile);
    echo "In fisier a fost scris textul introdus";
?>
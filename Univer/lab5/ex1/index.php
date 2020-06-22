<!DOCTYPE html>
<html>
<head>
    <title>Laborator 5. Lucru cu fisierile</title>
</head>
<body>
    <pre>
        Laborator 5. Lucru cu fisierile
        1. Rezolvati problemele PN si AN din lista de mai jos, unde N este numarul de prdine din catalog.
    </pre>
    <p>P5. Sa se scrie un program PHP care afiseaza doar primele 2 randuri din fisierul f1.txt.</p>
    <p>A5. Sa se scrie un program PHP care salveaza intr-un fisier text 20 de numere naturale aleatoare mai mici ca 200.</p>
    <br>
    <?php
        $arr = file("f1.txt");
        echo "P5)Primele doua randuri extrase din fisier sunt:<br>";
        echo $arr[0]. "<br>";
        echo $arr[1]. "<br>";
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        for ($i=0;$i<20;$i++)
            fwrite($myfile, rand(0, 199). " ");
        fclose($myfile);
        echo "<br>A5)20 de numere aleatoare a fost scris cu succes in fisierul \"newfile.txt\"";
    ?>
</body>
</html>
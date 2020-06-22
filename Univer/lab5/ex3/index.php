<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laborator 5. Lucru cu fisierile</title>
</head>
<body>
    <pre>
        Laborator 5. Lucru cu fisierile
        3. Rezolvati problema 12-N de la pag. 114, unde N este numarul de ordine din catalog.
    </pre>
    <p>Ex7. Se da un fisier text in care fiecare rand contine cel mult 255 caractere. Sa se afiseze continutul lui la ecran.</p>
    <?php
        $myfile = fopen("File.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            echo fgets($myfile) . "<br>";
          }
        fclose($myfile);
    ?>
</body>
</html>
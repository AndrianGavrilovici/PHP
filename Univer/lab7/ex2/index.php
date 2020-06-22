<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laborator 7. Gestionarea BD MySQL cu PHP</title>
</head>
<body>
    <pre>
        Laborator 7. Gestionarea BD MySQL cu PHP
        2. Creati si executati cu PHP cate 2 interogari
        a) de selectie;
        b) de sortare;
        c) de inserare a noilor inregistrari;
        d) de actualizare;
        e) de stergere a unor inregisrari;
        f) de totalizare;
        g) de creare a unui tabel nou;
        h) de stergere a tabelului creat in g)
    </pre>
</body>
</html>
<?php
    include 'SQL.php';
    
    $sql = new SQL ("localhost", "root", "");
    $sql->setDB ("php");
    $sql->connect ();
    echo "<br><b><i>a) 2 interogari de selectie</i></b><br>";
    selectie1 ($sql);
    selectie2 ($sql);
    echo "<br><b><i>b) 2 interogari de sortare</i></b><br>";
    sortare1 ($sql);
    sortare2 ($sql);
    echo "<br><b><i>c) 2 interogari de inserare</i></b><br>";
    inserare1 ($sql);
    inserare2 ($sql);
    echo "<br><b><i>d) 2 interogari de actualizare</i></b><br>";
    actualizare1 ($sql);
    actualizare2 ($sql);
    echo "<br><b><i>e) 2 interogari de stergere</i></b><br>";
    stergere1 ($sql);
    stergere2 ($sql);
    echo "<br><b><i>f) 2 interogari de totalizare</i></b><br>";
    totalizare1 ($sql);
    totalizare2 ($sql);
    echo "<br><b><i>g) interogari de creare a unui tabel nou</i></b><br>";
    $sql->createTable ("myguest");
    echo "<br><b><i>h) interogari de stergere a tabelului creat in g.</i></b><br>";
    $sql->dropTable ("myguest");
    
    /**
     *  SELECTIE
     */
    function selectie1 ($sql){
        echo "<b>1. Disciplinele care minimum un student are nota 10 la examen:</b><br>";
        $query = "SELECT DISTINCT Disciplina FROM discipline WHERE Examen=10;";
        $sql->printQuerry ($query);
    }
    function selectie2 ($sql){
        echo "<b>2. Studentii care la examen au nota 10 si denumirea disciplinei</b><br>";
        $query = "SELECT students.Nume, students.Prenume, discipline.Disciplina FROM (students INNER JOIN discipline ON students.StudentID=discipline.StudentID) WHERE discipline.Examen = 10;";
        $sql->printQuerry ($query);
    }
    /**
     *  SORTARE
     */
    function sortare1 ($sql){
        echo "<b>1. Sortarea studentilor dupa NUME</b><br>";
        $query = "SELECT * FROM students ORDER BY NUME ASC";
        $sql->printQuerry ($query);
    }
    function sortare2 ($sql){
        echo "<b>2. Sortarea studentilor dupa nota de examen in descrestere(de la 10 la 2) si dupa nume in crestere</b><br>";
        $query = "SELECT students.Nume, students.Prenume, discipline.Disciplina, discipline.Examen FROM (students INNER JOIN discipline ON students.StudentID=discipline.StudentID) ORDER BY discipline.Examen DESC, students.Nume ASC";
        $sql->printQuerry ($query);
    }
    /**
     *  INSERARE
     */
    function inserare1 ($sql){
        echo "<b>1. Inserarea studentului Ceapa Iulian</b><br>";
        $query = "INSERT INTO students (Nume, Prenume, Data_Inmatricularii, Facultatea, Specialitatea)
        VALUES ('Ceapa', 'Iulian', '2017', 'FMTI', 'Informatica')";
        if ($sql->conn->query($query) === TRUE) {
            echo "Inserat cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    function inserare2 ($sql){
        echo "<b>2. Inserarea disciplinei la studentul Ceapa Iulian</b><br>";
        $query = "INSERT INTO discipline (Disciplina, Testare1, Testare2, Examen, StudentID)
        VALUES ('Sisteme electronice de calcul', '7', '8', '7', '8')";
        if ($sql->conn->query($query) === TRUE) {
            echo "Inserat cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    /**
     *  ACTUALIZARE
     */
    function actualizare1 ($sql){
        echo "<b>1. Actualizare disciplina in loc StudentID Ceapa Iulian punem StudentID a lui Vlas Mihail</b><br>";
        $query = "UPDATE discipline SET StudentID='6' WHERE DisciplineID=26";
        if ($sql->conn->query($query) === TRUE) {
            echo "Actualizat cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    function actualizare2 ($sql){
        echo "<b>2. Actualizare disciplina Notele lui Rugaliov la Programare JAVA</b><br>";
        $query = "UPDATE discipline SET Testare1='9', Testare2='9', Examen='10' WHERE DisciplineID=7";
        if ($sql->conn->query($query) === TRUE) {
            echo "Actualizat cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    /**
     *  STERGERE
     */
    function stergere1 ($sql){
        echo "<b>1. Stergerea studentului Ceapa Iulian</b><br>";
        $query = "DELETE FROM students WHERE Nume='Ceapa' AND Prenume='Iulian'";
        if ($sql->conn->query($query) === TRUE) {
            echo "Sters cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    function stergere2 ($sql){
        echo "<b>2. Stergerea disciplinei 'Sisteme electronice de calcul' cu id-ul>25</b><br>";
        $query = "DELETE FROM discipline WHERE Disciplina='Sisteme electronice de calcul' AND DisciplineID>25";
        if ($sql->conn->query($query) === TRUE) {
            echo "Sters cu succes!<br>";
        } else {
            echo "Error: " . $query . "<br>" . $sql->conn->error;
        }
    }
    /**
     *  TOTALIZARE
     */
    function totalizare1 ($sql){
        echo "<b>1. Calculam ce an sunt studentii dupa anul inmatricularii.</b><br>";
        $year = date("Y");
        $query = "SELECT * FROM students ORDER BY Nume ASC;";
        $result = $sql->conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Nume: ". $row["Nume"]. " ". $row["Prenume"]. " - Anul de studii: ". ($year-$row["Data_Inmatricularii"]+1). "<br>";
            }
        } else echo "0 results";
    }
    function totalizare2 ($sql){
        echo "<b>2. Calculam nota medie.</b><br>";
        
        $query = "SELECT students.Nume, students.Prenume, discipline.Disciplina, discipline.Testare1, discipline.Testare2, discipline.Examen FROM (students INNER JOIN discipline ON students.StudentID=discipline.StudentID) ORDER BY students.Nume ASC;";
        $result = $sql->conn->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $media=((($row["Testare1"]+$row["Testare2"])/2)*0.6)+($row["Examen"]*0.4);
                echo "Nume: ". $row["Nume"]. " ". $row["Prenume"]. " , Disciplina: ". $row["Disciplina"]. " - Media: $media<br>";
            }
        } else echo "0 results";
    }
?>
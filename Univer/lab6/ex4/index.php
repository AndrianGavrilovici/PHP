<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laborator 6. Lucru cu BD MySQL</title>
</head>
<body>
    <pre>
        Laborator 6. Lucru cu BD MySQL
        4. Realizati o conexiune PHP cu BD creata si afisati datele din tabelele bazei.
    </pre>
    <p>4. Realizati o conexiune PHP cu BD creata si afisati datele din tabelele bazei.</p>
</body>
</html>
<?php
class SQL {
    public $conn;
    private $servername;
    private $username;
    private $password;
    private $dbase;
 
    public function __construct ($servername, $username, $password) {
       $this->servername = $servername;
       $this->username = $username;
       $this->password = $password;
    }
 
    public function connect () {
       $this->conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbase);
       if ($this->conn->connect_error)
          die ("Connection failed: " . $this->conn ->connect_error. PHP_EOL);
       else print ("<--> Connected to server successfully <-->". "<br><br>");
    }
    
    public function printStudents(){
       $query = "SELECT * FROM students";
       $result = $this->conn->query($query);
       if ($result->num_rows > 0) {
          echo "Tabelul Students:<br>";
          echo "<table border='1'>";
          echo "<tr><th>StudentID</th><th>Nume</th><th>Prenume</th><th>Data Inmatricularii</th><th>Facultatea</th><th>Specialitatea</th></tr>";
          while($row = $result->fetch_assoc()) {
             echo "<tr>";
             foreach ($row as $field => $value) {
                echo "<td>" . $value . "</td>";
             }
             echo "</tr>";
          }
          echo "</table>";
      } else echo "0 results";
      
    }
 
    public function printDiscipline(){
       $query = "SELECT * FROM discipline";
       $result = $this->conn->query($query);
       if ($result->num_rows > 0) {
          echo "Tabelul Discipline:<br>";
          echo "<table border='1'>";
          echo "<tr><th>DisciplineID</th><th>Disciplina</th><th>Testarea 1</th><th>Testarea 2</th><th>Examen</th><th>StudentID</th></tr>";
          while($row = $result->fetch_assoc()) {
             echo "<tr>";
             foreach ($row as $field => $value) {
                echo "<td>" . $value . "</td>";
             }
             echo "</tr>";
          }
          echo "</table>";
      } else echo "0 results";
      
    }
 
    public function setDB ($dbase) {
       $this->dbase = $dbase;
    }
 }
    
    $sql = new SQL ("localhost", "php", "php_password");
    $sql->setDB ("php");
    $sql->connect ();
    $sql->printStudents ("");
    $sql->printDiscipline ("");
?>
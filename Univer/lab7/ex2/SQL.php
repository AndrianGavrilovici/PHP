<?php
/**
 * SQL
 */
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
         die ("Connection failed: " . $this->conn ->connect_error. "<br>");
      else print ("<--> Connected to server successfully <-->". "<br>");
   }

   public function printQuerry ($query) {
      $result = $this->conn->query($query);
      if ($result->num_rows > 0) {
         echo "<table border='1'  rules='all' cellpadding='4'>";
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

   public function createDB ($dbase) {
      $this->conn = new mysqli ($this->servername, $this->username, $this->password);
      $query = "CREATE DATABASE $dbase";
      if ($this->conn->query ($query) === TRUE)
         print ("<--> Database created successfully <-->". "<br>". "<br>");
      else print ("Database exists". "<br>");
      $this->dbase = $dbase;
      return $dbase;
   }

   public function createTable ($tablename) {
      $columns_no = 3;
      $create_table = "CREATE TABLE $tablename (
         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         firstname VARCHAR(30) NOT NULL,
         lastname VARCHAR(30) NOT NULL,
         email VARCHAR(50),
         reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
         )";
      if ($this->conn->query ($create_table) === TRUE)
         print ("Tabel ". $tablename. " creat cu succes". "<br>");
      else print ("Eroare de creare a tabelului: ". $this->conn->error);
   }

   public function dropTable ($tablename) {
      $query = "DROP TABLE $tablename";
      if ($this->conn->query ($query) === TRUE)
         echo ("Tabelul ". $tablename. " sters cu succes". "<br>");
      else echo ("Eroare la stergerea tabelului: ". $this->conn->error);
   }

   public function setDB ($dbase) {
      $this->dbase = $dbase;
   }
}
?>

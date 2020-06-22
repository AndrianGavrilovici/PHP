<?php
/**
 * SQL
 */
class SQL {
   protected $conn;
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
      else print ("<--> Connected to server successfully <-->". PHP_EOL. PHP_EOL);
   }

   public function createDB ($dbase) {
      $this->conn = new mysqli ($this->servername, $this->username, $this->password);
      $query = "CREATE DATABASE $dbase";
      if ($this->conn->query ($query) === TRUE)
         print ("<--> Database created successfully <-->". PHP_EOL. PHP_EOL);
      else print ("Database exists". PHP_EOL);
      $this->dbase = $dbase;
   }

   public function createTable () {
      $tablename = readline ("Name table: ");
      $create_table = "CREATE TABLE $tablename";
      $columns_no = readline ("Nomber of columns: ");
      $data_table = "";
      for ($i=0; $i < $columns_no; $i++) {
         print ("\nName columns ". ($i+1) . ": ");
         $data_table .= readline ();
         print ("\nType column:\nINT, DOUBLE, VARCHAR, DATE, DATETIME". PHP_EOL);
         $data_table .= " ". readline ("Type: ");
         $data_table .= "(". readline ("length: "). ")";
         if ($i < ($columns_no - 1))
            $data_table .= ", ";
      }
      $create_table .= '('. $data_table. ')';
      if ($this->conn->query ($create_table) === TRUE)
         print ("Table ". $tablename. " created successfully". PHP_EOL);
      else print ("Error creating table: ". $this->conn->error);
   }

   public function setDB ($dbase) {
      $this->dbase = $dbase;
   }
}
?>

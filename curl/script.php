<?php
   include 'SQL.php';
/**
 * RESPONSE
 */
class Response extends SQL {
   private $UserID;
   private $message;
   private $number;
   public function __construct () {
      $this->message = NULL;
      $this->number = NULL;
   }
   public function fromDB () {
      parent::__construct ("127.0.0.1", "root", "unifun");
      parent::setDB ("AndrianDBexample");
      parent::connect ();

      $login = $_GET["user"];
      $password = $_GET["password"];
      $stmt = $this->conn->prepare("SELECT UserID FROM Users WHERE Login=? AND Password=?");
      $stmt->bind_param("ss", $login, $password);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
         $this->UserID = $row['UserID'];
      } else {
         print ("<-->  Wrong login or password in sql!  <-->". PHP_EOL);
         exit;
      }
      $stmt->close ();
   }
   public function responseShow () {
      $this->message = $_GET["message"];
      $this->number = $_GET["number"];
      if ($this->message == NULL || $this->number == NULL) {
         print ("You did not enter the message or the number". PHP_EOL);
         exit;
      }
      // Wrong message
      if (strlen ($this->message) > 75) {
         print ("WRONG text ". PHP_EOL);
         print ("You passed the limit of ".(strlen ($this->message)-75). " characters". PHP_EOL);
         exit;
      }
      // End wrong message
      // Wrong number
      if (substr ($this->number, 0, 3) != "373"||!is_numeric (substr ($this->number, 0, 3))) {
         print ("WRONG number code country --> ". substr ($this->number, 0, 3). PHP_EOL);
         exit;
      } elseif (substr ($this->number, 4, 2) != "76" && substr ($this->number, 4, 2) != "78" && substr ($this->number, 4, 2) != "79" ||!is_numeric (substr ($this->number, 4, 2))) {
         print ("WRONG number code formar --> ". substr ($this->number, 4, 2). PHP_EOL);
         exit;
      } else if (strlen (substr ($this->number, 7)) != 6 ||!is_numeric (substr ($this->number, 7))) {
         print ("WRONG number code number --> ". substr ($this->number, 7). PHP_EOL);
         exit;
      }
      // End wrong number
      print ("Everything is okay". PHP_EOL);
      print ("SEND: - Message: ". $this->message. " - Number: ". $this->number. PHP_EOL);
   }
   public function savesInDB () {
      $stmt =  $this->conn->prepare ("INSERT INTO sms_to_send (Message, Number, UserID) VALUES (?, ?, ?)");
      $stmt->bind_param("ssi", $this->message, $this->number, $this->UserID);
      $stmt->execute ();
      if ($stmt->affected_rows > 0) {
        print ("Added rows: ". $stmt->affected_rows. PHP_EOL);
      } else {
        print ("Error adding to database". PHP_EOL);
      }
      $stmt->close ();
   }
   public function fromFile () {
      $login = $_GET["user"]. PHP_EOL;
      $password = $_GET["password"]. PHP_EOL;
      $signin = FALSE;
      $usersfile = fopen ("Users.txt", "r") or die ("File does not exist!". PHP_EOL);
      while(!feof($usersfile)) {
        if ($login == substr (fgets ($usersfile), 6) && $password == substr (fgets ($usersfile), 9)) {
           $signin = TRUE;
           fclose ($usersfile);
           return;
        }
      }
      if (!$signin ) {
         print ("<-->  Wrong login or password in file!  <-->". PHP_EOL);
         exit;
      }
      fclose ($usersfile);
   }
}

   $response = new Response ();
   $from = $_GET['from'];
   if ($from == "file") {
      $response->fromFile ();
      print ("FROM THE FILE". PHP_EOL);
      print ("<-->  Welcome!  <-->". PHP_EOL);
      $response->responseShow ();
   } elseif ($from == "db") {
      $response->fromDB ();
      print ("FROM THE DATABASE". PHP_EOL);
      print ("<-->  Welcome!  <-->". PHP_EOL);
      $response->responseShow ();
      $response->savesInDB ();
   } elseif ($from == "both") {
      $response->fromDB ();
      $response->fromFile ();
      print ("FROM THE DATABASE AND FILE". PHP_EOL);
      print ("<-->  Welcome!  <-->". PHP_EOL);
      $response->responseShow ();
      $response->savesInDB ();
   } else {
      print ("You have not entered \"from\"=[file or db or both]". PHP_EOL);
   }
   print (PHP_EOL);
 ?>

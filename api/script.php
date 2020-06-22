<?php

   $user = isset ($_GET["user"]) ? $_GET["user"] : "";
   $password = isset ($_GET["password"]) ? $_GET["password"] : "";
   $number = isset ($_GET["number"]) ? $_GET["number"] : "";
   if ($user == "" || $password == "" || $number == "") {
      exit ("Not all data entered". PHP_EOL);
   }
   

   $number = check_number ($number);
   if (!$number) {
      exit ("The number has not been entered correctly". PHP_EOL);
   }

   $servername = "127.0.0.1";
   $username_db = "root";
   $password_db = "unifun";
   $dbase = "AndrianDBexample";
   $link = mysqli_connect ($servername, $username_db, $password_db, $dbase);
   if (!$link) {
      die ("Connection failed: ". mysqli_connect_error ());
   } print ("<--> Connected to server successfully <-->". PHP_EOL);

   $check_login = check_login ($user, $password, $link);
   if (!$check_login) {
      exit ("User or password was wrong". PHP_EOL);
   }

   $output = Activation_API ();
   if ($output == "true") {
      $response = "Success Activation";
   } else {
      $response = "Failed Activation";
   }

   $date = date ("Y-m-d H:i:s");
   $sql = "INSERT INTO logs (date, user, password, number, Activation_API, response)
   VALUES ('$date', '$user', '$password', '$number', '$output', '$response')";
   if (!mysqli_query ($link, $sql)) {
      exit ("Message was not saved". PHP_EOL);
   }

   print (PHP_EOL. "Everything is okay". PHP_EOL. PHP_EOL);

   /*
   *  FUNCTIONS
   */
   function check_number ($number) {
      $prefix = "373";
      $number_format = array (76, 78, 79);
      $replace = array (" ", "+", "-", "/");
      if (!is_numeric ($number)) {
         foreach ($replace as $value)
            $number = str_replace ($value, '', $number);
      }
      if (!is_numeric($number) || substr($number, 0, 3) != $prefix  || !in_array(substr($number,3,2), $number_format) || strlen(substr($number, 5)) != 6)
         return 0;

      return $number;
   }


   function check_login ($user, $password, $link) {
      $sql = "SELECT user, password FROM users WHERE user='$user' AND password='$password'";
      $result = mysqli_query ($link, $sql);
      if (mysqli_num_rows ($result) > 0) {
         while ($row = mysqli_fetch_assoc ($result))
             if ($row['user'] == $user && $row['password'] == $password)
                return 1;
      }
      return 0;
   }

   function Activation_API () {
      $url = "http://127.0.0.1/andrian/Activation_API.php";
      $ch = curl_init ();
      $options = array (
         CURLOPT_FOLLOWLOCATION => true,
		   CURLOPT_SSL_VERIFYHOST => false,
		   CURLOPT_SSL_VERIFYPEER => false,
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true
      );
      curl_setopt_array($ch , $options);
      $output = curl_exec ($ch);
      curl_close ($ch);
      return $output;
   }

 ?>

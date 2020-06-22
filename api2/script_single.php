<?php
   
   $user = isset ($_GET["user"]) ? $_GET["user"] : "";
   $password = isset ($_GET["password"]) ? $_GET["password"] : "";
   $number = isset ($_GET["number"]) ? $_GET["number"] : "";
   if ($user == "" || $password == "" || $number == "") {
      exit ("Not all data entered". PHP_EOL);
   }
   
   $msisdn = array();
   $prefix = "373";
   $number_format = array (76, 78, 79);
   for ($i=0; $i < $number; $i++) {
      $msisdn[$i] = $prefix. $number_format[rand(0,2)]. rand(100,900). rand(100,900);
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

   $date = date ("Y-m-d H:i:s");
    print ("DATE: ". $date. PHP_EOL);
   for ($i=0;$i < $number; $i++) {
      
      $output[$i] = Activation_API ();
      $date = date ("Y-m-d H:i:s");
      if ($output[$i] == "") {
         $output[$i] = "Request failed!";
      } if ($output[$i] == "true") {
         $response[$i] = "Success Activation";
      } else {
         $response[$i] = "Failed Activation";
      }
   }
   print_r ($output);
   print PHP_EOL;
   print ("DATE: ". $date. PHP_EOL);
   for ($i=0; $i < $number; $i++) {
      $sql = "INSERT INTO logs (date, user, password, number, Activation_API, response)
      VALUES ('$date', '$user', '$password', '$msisdn[$i]', '$output[$i]', '$response[$i]')";
      if (!mysqli_query ($link, $sql)) {
         exit ("Message was not saved". PHP_EOL);
      }
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
         CURLOPT_CONNECTTIMEOUT => 1,
		   CURLOPT_TIMEOUT => 1,
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true
      );
      curl_setopt_array($ch , $options);
      $output = curl_exec ($ch);
      curl_close ($ch);
      return $output;
   }

 ?>

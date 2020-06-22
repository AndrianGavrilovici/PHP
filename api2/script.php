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

   for ($i=0; $i < $number; $i++) {
      $msisdn[$i] = check_number ($msisdn[$i]);
      if (!$msisdn[$i]) {
         exit ("The msisdn has not been entered correctly". PHP_EOL);
      }
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

   $index = 0;
   $multi = (int)$number/5;
   $single = $number%5;

   if ($multi > 0)
      while ($index < $multi - 1) {
         $date = date ("Y-m-d H:i:s");
         print ("DATE: ". $date. PHP_EOL);
         $output[$index] = Activation_API (5);
         $index++;
      } 

   if ($single > 0) {
      $output[$index] = Activation_API ($single);
      $date = date ("Y-m-d H:i:s");
      print ("DATE: ". $date. PHP_EOL);
   }

   for ($i=0;$i < count($output); $i++) {
      for ($j=0; $j < count($output[$i]); $j++) {
         if ($output[$i][$j] == "true") {
            $response[$i][$j] = "Success Activation";
         } else {
            $response[$i][$j] = "Failed Activation";
         }
         $out = $output[$i][$j];
         $resp = $response[$i][$j];
         $sql = "INSERT INTO logs (date, user, password, number, Activation_API, response)
         VALUES ('$date', '$user', '$password', '$msisdn[$i]', '$out', '$resp')";
         if (!mysqli_query ($link, $sql)) {
            exit ("Message was not saved". PHP_EOL);
         }
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

   function Activation_API ($number) {
      $url = "http://127.0.0.1/andrian/Activation_API.php";

      $options = array (
         CURLOPT_FOLLOWLOCATION => true,
		   CURLOPT_SSL_VERIFYHOST => false,
         CURLOPT_SSL_VERIFYPEER => false,
         CURLOPT_CONNECTTIMEOUT => 1,
		   CURLOPT_TIMEOUT => 1,
         CURLOPT_URL => $url,
         CURLOPT_RETURNTRANSFER => true
      );

      $master = curl_multi_init(); 
      for ($i=0; $i < $number; $i++) {
         $curl_arr[$i] = curl_init($url);
         curl_setopt_array($curl_arr[$i] , $options);
         curl_multi_add_handle($master, $curl_arr[$i]);
      }
      
      $running = NULL;
      do {
         curl_multi_exec($master,$running);
      } while($running);

      $results = array();
      for ($i=0; $i < $number; $i++) {
         $results[$i] = curl_multi_getcontent($curl_arr[$i]);
         if ($results[$i] == "") {
            $results[$i] = "Request failed!";
         }
         curl_multi_remove_handle($master, $curl_arr[$i]);
      }
      curl_multi_close($mh);
      return $results;
   }

 ?>

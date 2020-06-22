<?php

    $user = readline ("User: ");
    $password = readline ("Password: ");
    $message = readline ("Message: ");
    $number = readline ("Number: ");
    print ("FROM: \"file or db or both\"". PHP_EOL);
    $from = readline ("From: ");

    $curl_url = "http://127.0.0.1/andrian/script.php?user=$user&password=$password&message=$message&number=$number&from=$from";

    $curl_ch = curl_init ();
    $curl_option = array (
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_URL => $curl_url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($curl_ch , $curl_option);

    $curl_output = curl_exec($curl_ch);

    print ($curl_output);
?>
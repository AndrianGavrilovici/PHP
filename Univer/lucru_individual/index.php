<?php
set_time_limit(0); // eliminați termenul de execuție a scriptului
ob_implicit_flush();

function random_string($length)
{ // funcție de generare aleatorie a liniilor
	$chars = "abcdefghijklmnopqrstuvwxyz1234567890"; // simboluri din care generăm
	$numChars = strlen($chars); // Determinam lungimea $chars
	$string = ''; // setam o variabilă goală
	for ($i = 0; $i < $length; $i++) { // strangem sirul
		$string.= substr($chars, rand(1, $numChars) - 1, 1);
	}
	return $string; // Returnam sirul facut
}

function get_http_response_code($url) { // Funcția de verificare a codului http
	$headers = get_headers($url);
	return substr($headers[0], 9, 3);
}

if (!file_exists('lightshot_images')) { // cream un director în care să salvați imaginile, dacă lipsesc
	mkdir('lightshot_images', 0777);
}

$options = array(
	'http' => array(
		'method' => "GET",
		'header' => "Accept-language: en\r\n" . "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
	)
);
$context = stream_context_create($options);

while (1) {
	$randstring = random_string(5); // Generam un sir aleatoriu
	$htmldata = file_get_contents('https://prnt.sc/m' . $randstring, false, $context); // înlocuim șirul aleatoriu și obținem codul paginii
	preg_match_all('/<meta name=\"twitter:image:src\" content=\"(.*?)\"\/>/is', $htmldata, $img_url); // parsing imagini url obișnuite
	if (strlen($img_url[1][0]) > 1) { // verificăm lungimea șirului primit, dacă mai mult de 1 - există o imagine la această adresă
		$imgs = str_replace('//st.prntscr', 'https://st.prntscr', $img_url[1][0]);
		$localname = array_pop(explode('/', $img_url[1][0])); // impartim șirul într-un tablou și extragem ultimul element al tabloului (adică imagename.png)
		$localpath = "./lightshot_images/" . $localname; // determinam unde se va salva imaginea local.
		if (get_http_response_code($imgs) != "200") {
			echo "<span style='color:red;display:block;margin-bottom:10px;font-size:14px;'>404. La adresa " . $imgs . " nu mai sunt poze :(</span>";
		} else {
			file_put_contents($localpath, file_get_contents($imgs, false, $context)); // descarcam
			echo "<span style='color:green;display:block;margin-bottom:10px;font-size:14px;'>Salvare - " . $localname . " , url - http://prntscr.com/m" . $randstring . " , descarcam din " . $imgs . "</span>";
		}
	} else {
		echo "<span style='color:red;display:block;margin-bottom:10px;font-size:14px;'>Pe adresa http://prntscr.com/m" . $randstring . " nu este poza</span>";
	}
}
?>
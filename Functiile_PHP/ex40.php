<?php
    $arr = ['<b>php</b>', '<i>html</i>'];
	$result = array_map('strip_tags', $arr);
	print_r ($result);
?>
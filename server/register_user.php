
<?php

	$host = 'localhost';
	$namedb = 'server';
	$userdb = 'serveruser';
	$passdb = 'example';

	$user = $_POST["user"];
	$password = $_POST["password"];
	
	$mysqli = new mysqli($host, $namedb, $passdb, $userdb);
	$mysqli->set_charset("utf8");

	$sql = sprintf("INSERT INTO ips (user, password, ip) VALUES ('%s', '%s', '192.168.0.1')", $user, $password);
	$res = $mysqli->query($sql);

?>
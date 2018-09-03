
<?php

	header('Access-Control-Allow-Origin: *');

	$host = 'localhost';
	$namedb = 'server';
	$userdb = 'serveruser';
	$passdb = 'example';

	$user = $_GET["user"];
	
	$mysqli = new mysqli($host, $namedb, $passdb, $userdb);
	$mysqli->set_charset("utf8");

	$sql = sprintf("SELECT * FROM ips WHERE user='%s'", $user);
	$res = $mysqli->query($sql);

	if ($res) {

		while ($row = mysqli_fetch_row($res)) {

			echo $row[2];
			return;
		}
	}

	else {

		echo "192.168.0.1";
		return;
	}

?>
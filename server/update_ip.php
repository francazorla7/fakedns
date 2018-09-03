
<?php

	$host = 'localhost';
	$namedb = 'server';
	$userdb = 'serveruser';
	$passdb = 'example';

	$user = $_POST["user"];
	$password = $_POST["password"];
	$ip = $_POST["ip"];
	
	$mysqli = new mysqli($host, $namedb, $passdb, $userdb);
	$mysqli->set_charset("utf8");

	$sql = sprintf("SELECT * FROM ips WHERE user='%s'", $user);
	$res = $mysqli->query($sql);

	if ($res) {

		while ($row = mysqli_fetch_row($res)) {

			if ($row[1] == hash('sha512', $password)) {

				$sql = sprintf("UPDATE ips SET ip='%s' WHERE user='%s'", $ip, $user);
				$mysqli->query($sql);

				echo sprintf('{"response":"true", "message":"%s"}', $ip);
				return;
			}

			else {

				echo sprintf('{"response":"false", "message":"%s"}', $row[1]);
				return;
			}
		}
	}

?>
<?php

	$source = 'mysql:host=tsuts.tskoli.is;dbname=0506973399_login';
	$user = '0506973399';
	$password = 'mypassword';
	try {
	$pdo = new PDO($source, $user, $password);

	$pdo->exec('SET NAMES "utf8"');

	} catch (PDOException $e) {
	       echo 'Tenging mistókst: ' . $e->getMessage();
	}
?>

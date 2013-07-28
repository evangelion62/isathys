<?php

function getBdd(){

	$user="root";
	$pass="";
	$dbname="isathys";

	$bdh;

	try {

		$dbh = new PDO('mysql:host=localhost;dbname='.$dbname,
				$user,
				$pass,
				array(
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
				)
		);

	} catch (PDOException $e) {

		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();

	}

	return $dbh;
}
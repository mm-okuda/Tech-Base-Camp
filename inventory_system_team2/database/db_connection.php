<?php

$db_info = [
	"user" => "root",
	"pass" => "$Root1995",
	"host" => "localhost",
	"dbname" => "team2"
];
$dsn = "mysql:host={$db_info['host']}; dbname={$db_info['dbname']}; charset=utf8";

try{
	$dbh = new PDO($dsn, $db_info["user"], $db_info["pass"]);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	die ("PDO Error:" . $e->getMessage());
}

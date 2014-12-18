<?php

header('Content-Type: application/json');

if(!isset($_GET['query'])){
	echo json_encode(array());
	exit;
}

$db = new PDO('mysql:host=127.0.0.1; dbname=drop_loc','root','');

$users = $db->prepare(" 
	SELECT id, username 
	FROM users 
	WHERE username LIKE :query
");

$users->execute(array(
	'query' => "{$_GET['query']}%"
	));

echo json_encode($users->fetchAll());
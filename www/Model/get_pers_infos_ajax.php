<?php

require("../Ressources/db_call.php");

$id = $_POST['id'];

$sql = "SELECT * FROM `personne` WHERE `id` = " . $id;
$req = $bd->query($sql);

$result = $req->fetch(PDO::FETCH_ASSOC);

$data[] = [ 
		"id" => $result['id'], 
		"nom" => $result['nom'],  
		"prenom" => $result['prenom'],  
		"date" => $result['date_naissance'],
		"bio" => $result['biographie']
	];

echo json_encode($data);


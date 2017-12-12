<?php

require("../Ressources/db_call.php");

$id = $_POST['id'];
$message = "";

$sql = "DELETE FROM `personne` WHERE `id` = " . $id;
$count = $bd->exec($sql);

if ($count > 0) 
	$message = "Suppression effectuée";
else 
	$message = "Une erreur s'est produite lors de la suppression";


$data['message'] = $message;

echo json_encode($data);


<?php

require("../Ressources/db_call.php");

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date'];
$bio = $_POST['bio'];

$ok = false;


$sql = "UPDATE `personne` SET `nom` = :nom, `prenom` = :prenom, `date_naissance` = :date_n, `biographie` = :bio WHERE `id` = " . $id;
$req = $bd->prepare($sql);


$result = $req->execute(array(':nom' => $nom, ':prenom' => $prenom, ':date_n' => $date, ':bio' => $bio));


if ($result) 
	$ok = true;

$data[] = ["ok" => $ok];

echo json_encode($data);


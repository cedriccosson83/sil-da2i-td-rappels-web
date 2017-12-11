<?php

require("../Ressources/db_call.php");

$personnages = [];
$message = "";

$sql = "SELECT * FROM `personne`";
$request = $bd->query($sql);

foreach ($request as $row) {
    $personnages[] = array("id" => $row['id'], "nom" => $row['nom'], "prenom" => $row['prenom'], "date" => $row['date_naissance']);
}

if (count($personnages) == 0)
    $message = "Il n'y a aucun personnage enregistré";

$data['personnages'] = $personnages;
$data['message'] = $message;

echo json_encode($data);


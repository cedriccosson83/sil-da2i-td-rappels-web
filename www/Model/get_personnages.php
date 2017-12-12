<?php

function personnages () {
	require("Ressources/db_call.php");

	$personnages = [];

	$sql = "SELECT * FROM `personne`";
	$request = $bd->query($sql);

	foreach ($request as $row) 
	    $personnages[] = array("id" => $row['id'], "nom" => $row['nom'], "prenom" => $row['prenom']);

	return $personnages;
}

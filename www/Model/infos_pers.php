<?php


function get_pers_infos() {
	require("../Ressources/db_call.php");
    $req = $bd->query("SELECT * FROM personne");

    $personnages = [];

    foreach ($req as $result) {
        $pers = [];
        $pers[] = $result['nom'];
        $pers[] = $result['prenom'];
        $pers[] = $result['date_naissance'];
        $pers[] = $result['bio'];
        $personnages[] = $pers;
    }

    return $personnages;
}
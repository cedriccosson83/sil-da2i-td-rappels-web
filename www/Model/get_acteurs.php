<?php

function get_acteurs($id_film) {

    require("Ressources/db_call.php");

    $req = $bd->query("SELECT * FROM personne p JOIN film_has_personne fhp ON p.id = fhp.id_personne WHERE fhp.role = 'acteur' AND fhp.id_film = " . $id_film);

    $acteurs = [];

    foreach ($req as $result) {
        $acteurs[] = $result;
    }

    return $acteurs;
}
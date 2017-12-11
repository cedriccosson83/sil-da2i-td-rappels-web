<?php


function get_film_infos($id_film) {
    require("Ressources/db_call.php");
    $req = $bd->query("SELECT * FROM film WHERE id = " . $id_film);

    $titre = "";
    $date_sortie = "";
    $synopsis = "";
    $note = 0;
    $autres_infos = "";

    foreach ($req as $result) {
        $titre = $result['titre'];
        $date_sortie = $result['date_sortie'];
        $synopsis = $result['synopsis'];
        $note = $result['note'];
        $autres_infos = $result['autres_infos'];
        break;
    }

    return ["titre" => $titre, "date" => $date_sortie, "synopsis" => $synopsis, "note" => $note, "autres_infos" => $autres_infos];
}
/*
function get_acteurs($id_film) {

    require("Ressources/db_call.php");

    $req = $bd->query("SELECT * FROM personne p JOIN film_has_personne fhp ON p.id = fhp.id_personne WHERE fhp.role = 'acteur' AND fhp.id_film = '". $id_film);

    $acteurs = [];

    foreach ($req as $result) {
        $acteurs[] = $result;
    }

    return $acteurs;
}*/
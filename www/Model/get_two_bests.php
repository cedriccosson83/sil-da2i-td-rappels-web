<?php

function get_two_bests($id) {
    require("Ressources/db_call.php");

    $req = $bd->query("SELECT COUNT(id_personne), id_personne
                            FROM film_has_personne
                            WHERE id_personne != " . $id . "
                                AND id_film IN 
                                (SELECT id_film FROM film_has_personne WHERE id_personne = " . $id . ")
                                 GROUP BY id_personne"); // récupération de tous les acteurs ayant une relation avec le réalisateur

    $bests = [];
    $favoris = [];

    foreach ($req as $result) {
        $favoris[$result["id_personne"]] += $result[0];
    }

    arsort($favoris);
    $favoris = array_values(array_flip(array_slice($favoris,0 ,2, true)));

    if ($favoris[0] && $favoris[1])
        return [get_the_pers($favoris[0]), get_the_pers($favoris[1])];
    else
        return [get_the_pers($favoris[0])];

}

function get_best($pers, $escape = null) {

    $best = [];
    $best["nb_participation"] = 0;
    $best["id"] = null;


    foreach ($pers as $p) {
        if ($escape != null)
            if ($p[1] == $escape) continue;


        if ($best["id"] == null) {
            $best["id"] = $p[1];
        }
        else {
            if ($p[0] > $best["nb_participation"]) {
                $best["id"] = $p[1];
                $best["nb_participation"] = $p[0];
            }
        }
    }

    return $best['id'];
}
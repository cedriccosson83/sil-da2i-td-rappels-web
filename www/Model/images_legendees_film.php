<?php


function get_images_legendees_film($id_film) {

    require("Ressources/db_call.php");

    $req = $bd->query("SELECT * FROM film_has_photo WHERE id_film = " . $id_film);

    $film_images = [];

    foreach ($req as $result) {
        $req1 = $bd->query("SELECT * FROM photo p JOIN film_has_photo fhp ON p.id = fhp.id_photo WHERE p.id =" . $result['id_photo']);
        $result1 = $req1->fetch();
        $img = [];
        $img['chemin'] = $result1['chemin'];
        $img['legende'] = $result1['legende'];
        $img['role'] = $result['role'];
        $film_images[] = $img;
    }

    return $film_images;
}
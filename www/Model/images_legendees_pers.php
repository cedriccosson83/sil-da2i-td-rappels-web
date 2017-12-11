<?php



function get_images_legendees_pers($id_film) {

    require("Ressources/db_call.php");

    $req = $bd->query("SELECT * FROM personne p JOIN film_has_personne fhp ON p.id = fhp.id_personne WHERE id_film = " . $id_film);

    $pers_images = [];

    foreach ($req as $result) {
        $roles = $bd->query("SELECT * FROM film_has_personne fhp JOIN personne p on p.id = fhp.id_personne WHERE p.id =" . $result['id']);
        $result3 = $roles->fetch();
        $req2 = $bd->query("SELECT * FROM personne p JOIN personne_has_photo php ON p.id = php.id_personne WHERE p.id =" . $result['id']);
        $result2 = $req2->fetch();
        $req1 = $bd->query("SELECT * FROM photo p JOIN personne_has_photo php ON p.id = php.id_photo WHERE php.id_personne =" . $result['id']);
        $result1 = $req1->fetch();

        $img = [];
        $img['chemin'] = $result1['chemin'];
        $img['legende'] = $result1['legende'];
        $img['role'] = $result3['role'];
        $img['prenom'] = $result2['prenom'];
        $img['nom'] = $result2['nom'];
        $img['bio'] = $result2['biographie'];
        $img['id'] = $result['id'];

        $pers_images[] = $img;
    }

    return $pers_images;
}
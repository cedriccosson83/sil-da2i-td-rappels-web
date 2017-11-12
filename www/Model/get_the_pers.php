<?php

function get_the_pers($id) {
        require("../Ressources/db_call.php");
        $req = $bd->query("SELECT * FROM personne WHERE id = " . $id);
        $personnage = [];
        foreach ($req as $result) {
            $req1 = $bd->query("SELECT * FROM photo p JOIN personne_has_photo php ON p.id = php.id_photo JOIN film_has_personne fhp ON fhp.id_personne = php.id_personne  WHERE php.id_personne =" . $result['id']);
            $result1 = $req1->fetch();
            $personnage['nom'] = $result['nom'];
            $personnage['prenom'] = $result['prenom'];
            $personnage['date'] = $result['date_naissance'];
            $personnage['biographie'] = $result['biographie'];
            $personnage['role'] = $result1['role'];
            $personnage['chemin'] = $result1['chemin'];
            $personnage['legende'] = $result1['legende'];
        }

        return $personnage;
}

function get_pers_movies($id) {
        require("../Ressources/db_call.php");
        $films = [];
        $req = $bd->query("SELECT * FROM film_has_personne WHERE id_personne = " . $id);
        foreach ($req as $result) {
            $req1 = $bd->query("SELECT id_photo FROM film_has_photo WHERE id_film = " . $result['id_film']);
            $res = $req1->fetch();

            $req1_2 = $bd->query("SELECT * FROM photo WHERE id = " . $res['id_photo']);
            $img = $req1_2->fetch();

            $req2 = $bd->query("SELECT * FROM film WHERE id = " . $result['id_film']);
            $film_info = $req2->fetch();        



            $film = [];
            $film['id'] = $result['id_film'];
            $film['chemin'] = $img['chemin'];
            $film['legende'] = $img['legende'];
            $film['titre'] = $film_info['titre'];
            $film['role'] = $result['role'];

            $films[] = $film;
        }

        return $films;
}
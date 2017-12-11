<?php

function get_films() {
        require("Ressources/db_call.php");
        $req = $bd->query("SELECT * FROM film ORDER BY titre ASC");
        $films = [];
        foreach ($req as $result) {
            $film = [];
            $film['id'] = $result['id'];
            $film['titre'] = $result['titre'];
            $films[] = $film;
        }
        return $films;
}

function get_pers() {
        require("Ressources/db_call.php");
        $req = $bd->query("SELECT * FROM personne ORDER BY prenom ASC");
        $personnages = [];
        foreach ($req as $result) {
            $pers = [];
            $pers['id'] = $result['id'];
            $pers['nom'] = $result['nom'];
            $pers['prenom'] = $result['prenom'];
            $personnages[] = $pers;
        }
        return $personnages;
}
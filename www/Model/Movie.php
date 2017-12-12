<?php

class Person
{
    private $title;
    private $date;
    private $note;
    private $synopsis;
    private $more_informations;
    private $id;

    function __construct($title, $date, $note, $synopsis, $more_informations,$id){
        $this->title = $title;
        $this->date = $date;
        $this->note = $note;
        $this->synopsis = $synopsis;
        $this->more_informations = $more_informations;
        $this->id = $id;
    }

    function __get($attribut) {
        return $this->$attribut;
    }

    function __set($attribut, $value) {
        $this->$attribut = $value;
    }

    function getAllDirectors () {
        require("Ressources/db_call.php");
        $req = $bd->query("SELECT * FROM personne p JOIN film_has_personne fhp ON p.id = fhp.id_personne WHERE fhp.role = 'réalisateur' AND fhp.id_film = " . $this->id);
        $acteurs = [];

        foreach ($req as $result)
            $acteurs[] = $result;

        return $acteurs;
    }

    function getAllActors () {
        require("Ressources/db_call.php");
        $req = $bd->query("SELECT * FROM personne p JOIN film_has_personne fhp ON p.id = fhp.id_personne WHERE fhp.role = 'acteur' AND fhp.id_film = " . $this->id);
        $acteurs = [];

        foreach ($req as $result)
            $acteurs[] = $result;

        return $acteurs;
    }

    function getBaseInfos() {
        return ["title" => $this->title, "date" => $this->date, "note" => $this->note, "synopsis" => $this->synopsis,
            "more_informations" => $this->more_informations, "id" => $this->id];
    }
}
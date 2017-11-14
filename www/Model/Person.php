<?php

class Person
{
    private $name;
    private $surname;
    private $birth_date;
    private $biography;
    private $id;

    function __construct($name, $surname, $birth_date, $biography, $id){
        $this->name = $name;
        $this->surname = $surname;
        $this->birth_date = $birth_date;
        $this->biography = $biography;
        $this->id = $id;
    }

    function __get($attribut) {
        return $this->$attribut;
    }

    function __set($attribut, $value) {
        $this->$attribut = $value;
    }

    function getAllMovies () {
        require("Ressources/db_call.php");
        $films = [];
        $request = $bd->query("SELECT * FROM film_has_personne WHERE id_personne = " . $id);
        foreach ($request as $result) {
            $request1 = $bd->query("SELECT `id_photo` FROM film_has_photo WHERE id_film = " . $result['id_film']);
            $res = $request1->fetch();

            if ($res) {
                $request2 = $bd->query("SELECT * FROM photo WHERE id = " . $res['id_photo']);
                $img = $request2 -> fetch();

                if ($img) {
                    $request3 = $bd->query("SELECT * FROM film WHERE id = " . $result['id_film']);
                    $film_info = $request3->fetch();

                    $film = [];
                    $film['id'] = $result['id_film'];
                    $film['chemin'] = $img['chemin'];
                    $film['legende'] = $img['legende'];
                    $film['titre'] = $film_info['titre'];
                    $film['role'] = $result['role'];

                    $films[] = $film;
                }
            }
        }
        return $films;
    }

    function getAllDirectors () {

    }

    function getAllActors () {

    }

    function getBaseInfos() {
        return ["name" => $this->name, "surname" => $this->surname, "birth_date" => $this->birth_date, "id" => $this->id, "biography" => $this->biography];
    }
}
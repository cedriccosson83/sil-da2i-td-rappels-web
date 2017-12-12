<?php

require("../Ressources/db_call.php");

if (isset($_POST['form_add_personnage'])) { // formulaire d'ajout de personnage
    $message = $_POST;
    $prenom = $_POST['name'];
    $nom = $_POST['surname'];
    $date = $_POST['birth'];
    $bio = $_POST['bio'];

    $sql = "INSERT INTO `personne`(`nom`, `prenom`, `date_naissance`, `biographie`) VALUES (:name, :surname, :birth, :bio)";

    $request = $bd->prepare($sql); 
    
    $result = $request->execute(
        array(
            ':name' => $prenom,
            ':surname' => $nom,
            ':birth' => $date,
            ':bio' => $bio
        )
    );

    if ($result)
        $message = "l'ajout du personnage à été fait avec succès !" ;
    else
        $message = "Une erreur s'est produite lors de l'ajout du personnage." ;



    $data['message'] = $message;

    echo json_encode($data);

} // fin formulaire d'ajout de personnage



<?php
if (!isset($_GET['personnage'])) {
    echo "Aucun personnage sélectionné ! redirection vers la page d'accueil ...";
    sleep(2);
    header("Location: index.php");
}
else {
    $id = $_GET['personnage'];
    include("Model/get_the_pers.php");
    $personnage = get_the_pers($id);
    $films = get_pers_movies($id);

	getBlock('View/head.php');
	getBlock("View/V_personnage.php", [$id, $personnage, $films]);
}

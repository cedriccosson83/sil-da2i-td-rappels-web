<?php
if (!isset($_GET['personnage'])) {
    echo "Aucun personnage sélectionné ! redirection vers la page d'accueil ...";
    sleep(2);
    header("Location: index.php");
}
else {
    $id = $_GET['personnage'];
    include("Model/get_two_bests.php");
    include("Model/get_the_pers.php");
    $personnage = get_the_pers($id);
    $films = get_pers_movies($id);
    $two_favorite_actors = get_two_bests($id);
    $have_two = (count($two_favorite_actors) == 2) ? true : false;

	getBlock('View/head.php');
	getBlock("View/V_personnage.php", [$id, $personnage, $films, $two_favorite_actors, $have_two]);
}

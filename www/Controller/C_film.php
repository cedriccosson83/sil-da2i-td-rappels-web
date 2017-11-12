<?php 
if (!isset($_GET['film'])) {
    echo "Aucun film sélectionné ! redirection vers la page d'accueil ...";
    sleep(2);
    header("Location: ../index.php");
}
else {
    $id = $_GET['film'];
	
	include("../Model/get_the_pers.php");
	include("../Model/infos_film.php");
	include("../Model/images_legendees_film.php");
	include("../Model/images_legendees_pers.php");
	
	$infos = get_film_infos($id);
	$acteurs = get_acteurs($id);
	$affiche = get_images_legendees_film($id);
	$personnages = get_images_legendees_pers($id);

	include("../View/head.php");
	include("../View/V_film.php");
	
}
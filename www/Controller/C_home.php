<?php

getBlock("View/head.php");
include("Model/all_datas.php");

$films = get_films();
$personnage = get_pers();

getBlock("View/V_home.php", [$personnage, $films]);

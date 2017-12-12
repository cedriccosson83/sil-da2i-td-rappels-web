<?php
/**
 * Created by PhpStorm.
 * User: c15009594
 * Date: 05/12/17
 * Time: 12:00
 */

/* create  -  update  -  delete */

include("Model/get_personnages.php");

$personnages = personnages();

getBlock("View/head.php");
getBlock("View/V_CRUD.php", [$personnages]);



<?php

function getBlock($file, $data = []) {
    require $file;
}

$user = "139485";
$pass = "139485";
$bd = new PDO('mysql:host=mysql-cedriccosson83500.alwaysdata.net;dbname=cedriccosson83500_site_dyn', $user, $pass);

if (!empty($_GET['page']) && is_file("Controller/C_".$_GET['page'].".php")) {
    include "Controller/C_".$_GET['page'].".php";
}

else {
    include "Controller/C_home.php";
}


$bd = null;
?>

<?php

$personnage = $data[0];
$films = $data[1];

?>

<body>
<header>
    <?php
        getBlock("View/main_menu.php");
    ?>
</header>
<main>
    <section>
        <article>
            <h1>Vidéothèque</h1>
            <p class="center padd-top">Bienvenue dans la vidéothèque de Cédric Cosson, choisissiez parmi les listes ci dessous un film pour en savoir plus à son sujet, un acteur ou un réalisateur afin de découvrir toutes les oeuvres dans lesquelles il a participé.</p>
            <div class="clear"></div>

            <form id="form_film" method="get" action="index.php">
                <input type="hidden" name="page" value="film">
                <label for="select_film"> Titre du film :  </label>
                <select id="select_film" name="film">
                    <?php foreach ($films as $key => $film) { ?>
                        <option value="<?php echo $film["id"] ;?>"><?php echo $film["titre"] ;?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Rechercher le film">
            </form>

            <form id="form_pers" method="get" action="index.php">
                <input type="hidden" name="page" value="personnage">
                <label for="select_pers"> Nom du personnage :  </label>
                <select name="personnage" id="select_pers">
                    <?php foreach ($personnage as $key => $pers) { ?>
                        <option value="<?php echo $pers["id"] ;?>"><?php echo $pers["prenom"] ;?> <?php echo $pers["nom"] ;?></option>
                    <?php } ?>
                </select>

                <input type="submit" value="Rechercher le personnage">
            </form>


            <br/><br/>

            <p>Vous pouvez également accéder au CRUD du site (c'est pas tous les jours que vous aurez cette permission).</p>

            <a href="index.php?page=CRUD"> Accéder au CRUD </a>

        </article>
    </section>
</main>

<footer>
    <?php getBlock("View/footer.php"); ?>
</footer>
</body>
</html>
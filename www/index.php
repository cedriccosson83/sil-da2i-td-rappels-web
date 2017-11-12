<?php include("View/head.php");
include("Model/all_datas.php");    ?>
    <body>
        <header>
            <?php 
                include("View/main_menu.php"); 
                $films = get_films();
                $personnage = get_pers();
            ?>
        </header>
        <main>
            <section>
                <article>
                    <h1>Vidéothèque</h1>
                    <p class="center padd-top">Bienvenue dans la vidéothèque de Cédric Cosson, choisissiez parmi les listes ci dessous un film pour en savoir plus à son sujet, un acteur ou un réalisateur afin de découvrir toutes les oeuvres dans lesquelles il a participé.</p>
                    <div class="clear"></div>

                    <form id="form_film" method="get" action="Controller/C_film.php">
                        <label for="select_film"> Titre du film :  </label>
                        <select id="select_film" name="film">
                            <?php foreach ($films as $key => $film) { ?>
                            <option value="<?php echo $film["id"] ;?>"><?php echo $film["titre"] ;?></option> 
                            <?php } ?>
                        </select>

                        <input type="submit" value="Rechercher le film">
                    </form>

                    <form id="form_pers" method="get" action="Controller/C_personnage.php">
                        <label for="select_pers"> Nom du personnage :  </label>
                        <select name="personnage" id="select_pers">
                            <?php foreach ($personnage as $key => $pers) { ?>
                            <option value="<?php echo $pers["id"] ;?>"><?php echo $pers["prenom"] ;?> <?php echo $pers["nom"] ;?></option> 
                            <?php } ?>
                        </select>

                        <input type="submit" value="Rechercher le personnage">
                    </form>

                </article>
            </section>
        </main>

        <footer>
            <?php include("View/footer.php"); ?>
        </footer>
    </body>
</html>

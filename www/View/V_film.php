<?php

$infos = $data[0];
$acteurs = $data[1];
$affiche = $data[2];
$personnages = $data[3];

?>
    <body>
        <header>
            <?php getBlock("View/menu.php"); ?>
        </header>
        <main>
            <section>
                <article>
                    <div class="title-block">
                        <h1><?php echo $infos['titre']; ?></h1>
                        <figure>
                            <img src="../images/decoration-titre.png" alt="decoration du titre" id="title-decoration">
                        </figure>
                    </div>
                    <div class="flex-container infos-film">

                        <span class="flex_component half left">
<?php
                        foreach ($affiche as $aff) {
?>
                            <figure>
                               <img src="../images/<?php echo $aff['chemin'] ?>" alt="<?php echo $aff['legende']?>"/>
                               <figcaption><?php echo $aff['legende']?></figcaption>
                            </figure>
<?php
                            break;
                        }
?>
                        </span>
                        <span class="flex_component half right">
                            <p>date de sortie  : <time datetime="<?php echo $infos['date']; ?>"> <?php echo $infos['date']; ?> </time></p>
                            <p>
<?php
                            foreach ($acteurs as $act) {
                                echo $act['prenom'] . " " . $act['nom'] . ", ";
                            }
                            echo PHP_EOL;
?>                          </p>

                            <p>Synopsis : <?php echo $infos['synopsis']; ?></p>

                            <aside>
                                <button id="load_faq"> Afficher la FAQ </button>
                                <p><?php echo $infos['autres_infos'];?></p>
                            </aside>

                            <p><meter min="0.0" max="5.0" value="<?php echo $infos['note']; ?>" >Note : <?php echo $infos['note']; ?> / 5 </meter> Note : <?php echo $infos['note']; ?> / 5</p>
                        </span>

                    </div>

                    <div id="realisateur">
                        <h2>Réalisateur</h2>
<?php

                            foreach ($personnages as $p) {
                                if ($p['role'] == "réalisateur") {
?>

                                    <div class="flex-container">
                                        <div class="flex_component half left">
                                            <figure><img src="../images/<?php echo $p['chemin'] ?>" alt="<?php echo $p['legende']?>"/>
                                            <figcaption><?php echo $p['prenom'] . " " . $p['nom'];?></figcaption></figure>
                                        </div>
                                        <div class="flex_component half right">
                                            <p> Biographie : </p>
                                            <p><?php echo $p['bio']; ?></p>
                                            <a class="btn-more" href="index.php?page=personnage&personnage=<?php echo $p['id']; ?>"> En savoir plus </a>
                                        </div>
                                    </div>
<?php
                                }
                            }
?>
                    </div>
                    <hr/>

                    <div id="acteurs">
                        <h2>Acteurs principaux</h2>
                        <div class="flex-container">
<?php
                            foreach ($personnages as $p) {
                                if ($p['role'] == "acteur") {
?>
                                    <div class="acteur flex_component third">
                                        <figure><img src="../images/<?php echo $p['chemin'] ?>" alt="<?php echo $p['legende']?>"/>
                                            <figcaption><?php echo $p['prenom'] . " " . $p['nom'];?></figcaption></figure>
                                        <a class="btn-more" href="index.php?page=personnage&personnage=<?php echo $p['id']; ?>"> En savoir plus </a>
                                    </div>
<?php
                                }
                            }
?>                      </div>
                    </div>
                </article>
            </section>
        </main>

        <footer>
            <?php getBlock("View/footer.php"); ?>
        </footer>
    </body>
</html>
<?php

$id = $data[0];
$personnage = $data[1];
$films = $data[2];
$two_favorite_actors = $data[3];
$have_two = $data[4];
$favorite_first = $two_favorite_actors[0];
$favorite_second = $two_favorite_actors[1];
?>

<body>
<header>
    <?php getBlock("View/menu_pers.php"); ?>
</header>
<main>
    <section>
        <article>
            <h1><?php echo($personnage['prenom']); ?> <?php echo($personnage['nom']); ?></h1>
            <div class="flex-container padd-top">
                <div class="flex_component third left">
                    <img src="../images/<?php echo($personnage['chemin']); ?>" alt="<?php echo($personnage['legende']); ?>"/>
                </div>
                <div class="flex_component two-third right" >
                    <p>Date de naissance : <time datetime="<?php echo($personnage['date']); ?>"><?php echo($personnage['date']); ?></time></p>
                    <p>Rôle dans ce film : <?php echo($personnage['role']); ?></p>
                    <p>Biographie : </p>
                    <p><?php echo($personnage['biographie']); ?></p>
                </div>
            </div>


            <?php if ($have_two) { ?>
                <h2 class="center">Acteurs avec qui il a le plus travaillé</h2>
                <div class="flex-container padd-top">
                    <div class="flex-component half left">
                        <figure>
                            <img src="../images/<?php echo($favorite_first['chemin']); ?>" alt="<?php echo($favorite_first['legende']); ?>"/>
                            <figcaption class="align-right"> <?php echo($favorite_first['prenom']); ?> <?php echo($favorite_first['nom']); ?></figcaption>
                        </figure>
                    </div>
                    <div class="flex-component half right">
                        <figure>
                            <img src="../images/<?php echo($favorite_second['chemin']); ?>" alt="<?php echo($favorite_second['legende']); ?>"/>
                            <figcaption class="align-left"> <?php echo($favorite_second['prenom']); ?> <?php echo($favorite_second['nom']); ?></figcaption>
                        </figure>
                    </div>
                </div>
            <?php } else { ?>
                <h2 class="center">Acteur avec qui il a le plus travaillé</h2>
                <div class="flex-container padd-top">
                    <div class="flex-component full">
                        <figure class="center">
                            <img class="center" src="../images/<?php echo($favorite_first['chemin']); ?>" alt="<?php echo($favorite_first['legende']); ?>"/>
                            <figcaption class="center"> <?php echo($favorite_first['prenom']); ?> <?php echo($favorite_first['nom']); ?></figcaption>
                        </figure>
                    </div>
                </div>
            <?php } ?>

            <div class="clear"></div>

            <h2 class="center">Films dans lesquels <?php echo($personnage['prenom']); ?> <?php echo($personnage['nom']); ?> a un contribué </h2>
            <div class="flex-container">
                <?php foreach ($films as $key => $film) { ?>
                    <div class="flex-component third">
                        <p><a href="index.php?page=film&film=<?php echo($film['id']); ?>"><img src="../images/<?php echo($film['chemin']); ?>" alt="<?php echo($film['chemin']); ?>"/></a><p>
                        <p><?php echo($film['titre']); ?> - <?php echo($film['role']); ?></p>  
                    </div>
                <?php } ?>
            </div>
        </article>
    </section>
</main>

<footer>
    <?php getBlock("View/footer.php"); ?>
</footer>
</body>
</html>
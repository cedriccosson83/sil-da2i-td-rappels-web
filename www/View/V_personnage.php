<body>
<header>
    <?php include("menu_pers.php"); ?>
</header>
<main>
    <section>
        <article>
            <h1><?php echo($personnage['prenom']); ?> <?php echo($personnage['nom']); ?></h1>
            <div class="flex-container padd-top">
                <div class="flex_component third left">
                    <img src="../images/<?php echo($personnage['chemin']); ?>" alt="<?php echo($personnage['chemin']); ?>"/>
                </div>
                <div class="flex_component two-third right" >
                    <p>Date de naissance : <time datetime="<?php echo($personnage['date']); ?>"><?php echo($personnage['date']); ?></time></p>
                    <p>Rôle dans ce film : <?php echo($personnage['role']); ?></p>
                    <p>Biographie : </p>
                    <p><?php echo($personnage['biographie']); ?></p>
                </div>
            </div>

            <div class="clear"></div>

            <h2 class="center">Films dans lesquels <?php echo($personnage['prenom']); ?> <?php echo($personnage['nom']); ?> a un rôle </h2>
            <div class="flex-container">
                <?php foreach ($films as $key => $film) { ?>
                    <div class="flex-component third">
                        <p><a href="../Controller/C_film.php?film=<?php echo($film['id']); ?>"><img src="../images/<?php echo($film['chemin']); ?>" alt="<?php echo($film['chemin']); ?>"/></a><p>
                        <p><?php echo($film['titre']); ?> - <?php echo($film['role']); ?></p>  
                    </div>
                <?php } ?>
            </div>
        </article>
    </section>
</main>

<footer>
    <?php include("footer.php"); ?>
</footer>
</body>
</html>
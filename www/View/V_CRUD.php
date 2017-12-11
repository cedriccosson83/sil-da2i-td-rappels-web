<body>
<header>
    <?php
    getBlock("View/main_menu.php");
    ?>
</header>
<main>
    <section>
        <article>

            <div id="request_result">
                <span class="success hide"></span>
                <span class="error hide"></span>
            </div>

            <div id="insert_pers">

                <form id="form_add_pers" method="post" action="#"><br/>
                    <label for="name">Prénom </label><input type="text" name="name" required><br/>
                    <label for="surname">Nom </label><input type="text" name="surname" required><br/>
                    <label for="birth">Date de naissance</label><input type="text" name="birth" placeholder="jj/mm/aaaa" required><br/>
                    <label for="bio">Biographie </label><textarea name="bio" required></textarea><br/>
                    <input type="hidden" name="form_add_personnage"><br/><br/>
                    <button type="submit" id="add_personnage" class="black_btn"> AJOUTER </button>
                </form>

            </div>

            <div id="delete_pers" class="hide">

            </div>

        </article>
    </section>
</main>

<footer>
    <?php getBlock("View/footer.php"); ?>
</footer>
</body>
</html>
<body>
<header>
    <?php
        getBlock("View/main_menu.php");
        $personnages = $data[0];
	
    ?>
</header>
<main>
    <section>
        <article>

        <div class="flex-container">
    		<div id="update_pers" class="flex-component half">
            <h2> Modification d'un personnage </h2>
        		<form method="post" id="form_update" class="form_template">
        			<select id="select_pers_to_update" name="selected_pers">
        				<?php foreach ($personnages as $p) { ?>
        					<option value="<?php echo $p["id"]; ?>"><?php echo $p["prenom"] . " " . $p['nom']; ?></option> 
        				<?php } ?>
        			</select>
                    <div id="request_result_update">
                        <span class="success hide"></span>
                        <span class="error hide"></span>
                    </div>
        			<button type="submit" class="black_btn" id="update_pers_btn">Modifier ce personnage</button>
        		</form>

        		<div id="form_update_pers"></div>
            </div>
            <div id="insert_pers" class="flex-component half">
            <h2> Ajout d'un personnage </h2>

                <form id="form_add_pers" method="post" action="#"><br/>
                    <label for="name">Prénom </label><input class="form_input_text" type="text" name="name" required><br/>
                    <label for="surname">Nom </label><input class="form_input_text" type="text" name="surname" required><br/>
                    <label for="birth">Date de naissance</label><input class="form_input_text" type="text" name="birth" placeholder="jj/mm/aaaa" required><br/>
                    <label for="bio">Biographie </label><textarea name="bio" class="form_textarea" required></textarea><br/>
                    <input type="hidden" name="form_add_personnage">


                    <div id="request_result_insert">
                        <span class="success hide"></span>
                        <span class="error hide"></span>
                    </div>

                    <button type="submit" id="add_personnage" class="black_btn elm_center"> Ajouter le personnage </button>
                </form>

            </div>
        </div>
		<hr/>	

            <div id="delete_pers" class="hide">
                <h2> Suppression d'un personnage </h2>

            </div>
            

        </article>
    </section>
</main>

<footer>
    <?php getBlock("View/footer.php"); ?>
</footer>
</body>
</html>

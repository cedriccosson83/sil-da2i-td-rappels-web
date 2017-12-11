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
            <div id="request_result">
                <span class="success hide"></span>
                <span class="error hide"></span>
            </div>

		<div id="update_pers">

		<form method="post" id="form_update" class="form_template">
			<select id="select_pers_to_update" name="selected_pers">
				<?php foreach ($personnages as $p) { ?>
					<option value="<?php echo $p["id"]; ?>"><?php echo $p["prenom"] . " " . $p['nom']; ?></option> 
				<?php } ?>
			</select>
			<button type="submit" class="black_btn" id="update_pers_btn">Modifier ce personnage</button>
		</form>

		<div id="form_update_pers"></div>
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

		<hr/>	

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

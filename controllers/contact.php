<body>
    <header id="header" >
        <div id="meteoTitre">
            <h1>Météo</h1>
            <input type="text" id="cityInput" placeholder="Entrer la ville">
            <button id="meteo">c'est parti !</button>
            <br>
            <img id="weatherIcon" class="d-none" alt="Weather Icon">
            <div id="weatherInfo"></div>
        </div>
        <div class="slider ">
        <?php  
       require_once(ROOT_PATH ."/librairies/topMenu.php");
       ?>
            <div class="nom">
                <img id="photoProfil" src="/img/20240220_155455.jpg" alt="photoProfil">
                <h1>Contact</h1>
            </div>
        </div>
    </header>
    <section>
    <?php
		// bon on va verifier si l'utiliseur à déja fait une demande histoire que tu sois pas SPAM
		$_REQ = "SELECT * FROM consultations WHERE consultation_ip = ?";
		$_QUERY = $_PDO['DB_WRITE']->prepare($_REQ);
		
		//$_QUERY contient la requete préparer 
		
		//on va préparer le tableau de données (5 données)
		$_DATA = array();
		$_DATA[] = $_SERVER['REMOTE_ADDR'];
		$_QUERY->execute($_DATA);
		
		// la on récupere le résultat de ta requete , si il n'y a pas de résultat, fetch te retourne false ou NULL
		$_RESULT = $_QUERY->fetch(PDO::FETCH_ASSOC);
		
		// si il n'y a pas de résultat alors on affiche le formulaire
		// bien sur on pourrai aller plus loin, en disant que si tu l'as consulté, dans ce cas, il a à nouveau accés au formulaire.
		// ou alors avec un délai de réponse, et dans le cas contraire si pas de réponse au bout de 1 semaine, bah le formulaire est à nouveau accessible.
		if(!$_RESULT) {

		?>
         <section>
        <div class="container text-center">
			<div class="row">
				<div class="col-lg-3">&nbsp;</div>
				<div class="col-lg-6"> 
				<?php
					if(isset($_SESSION['ERROR'])) {
						
						$_HTML  = '<div class="alert alert-warning" role="alert">';
						$_HTML .= $_SESSION['ERROR'];
						$_HTML .='</div>';
						
						echo $_HTML;
						unset($_SESSION);
						session_destroy();
					}
	?>
			<h1>Formulaire de contact</h1>
			<form id="form" method="POST" action="/formulaire/">
				<!-- ---------------------------- -->
				<label for="fname">Nom & prénom</label>
				<input type="text" id="fname" name="fname" placeholder="Votre nom et prénom" required><br />
				<!-- ---------------------------- -->
				<label for="subject">Sujet</label>
				<input type="text" id="subject" name="subject" placeholder="L'objet de votre message" required><br />
				<!-- ---------------------------- -->
				<label for="mail">Email</label>
				<input id="mail" type="text" name="mail" placeholder="Votre email" required><br />
				<!-- ---------------------------- -->
				<label for="content">Message</label>
				<textarea id="content" name="content" placeholder="Votre message" style="height:200px" required></textarea><br />
				<!-- ---------------------------- -->
				<input id="bouton" type="submit" value="Envoyer" name="save"><br />
			</form>
			<?php
			}
			else {
				$_HTML  = '<div class="alert alert-success" role="alert">';
				$_HTML .= "Votre demande est en cours de traitement";
				$_HTML .='</div>';
				
				echo $_HTML;
			}
			?>
				</div>
				<div class="col-lg-3">&nbsp;</div>
			</div>
		</div>
        </section>
<?php  
       require_once(ROOT_PATH ."/librairies/footer.php");
       ?>
</body>
</html
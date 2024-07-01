<body>
    <header id="header">
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
            require_once (ROOT_PATH . "/librairies/topMenu.php");
            ?>
            <div class="nom">
                <img id="photoProfil" src="/img/20240220_155455.jpg" alt="photoProfil">
                <h1>Mon portfolio</h1>
            </div>
        </div>
    </header>
    <section>

        <div class="card" >
            <a href="http://myyuka/" target="_blank">
                <img class="cancel , card-img-top" src="/img/Capture d'écran 2024-03-07 131029.png" alt="My yuka">
            </a>
            <div class="card-body">
                <p class="card-text">Projet utilisant les langages HTML, CSS et TypeScript, de la librairie Bootstrap, du framework Angular ainsi que de l'API du site OpenFoodFact.</p>
            </div>
        </div>

        <div class="card" >
            <a href="http://book/" target="_blank">
                <img class="cancel , card-img-top" src="/img/Capture d'écran 2024-03-13 152118.png" alt="book catalog">
            </a>
            <div class="card-body">
                <p class="card-text">Pojet utilisant les langages HTML, CSS, JavaScript et une API fourni books.json</p>
            </div>
        </div>

    </section>
    <?php
    require_once (ROOT_PATH . "/librairies/footer.php");
    ?>
</body>

</html>
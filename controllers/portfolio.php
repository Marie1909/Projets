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
                <h1>Mon portfolio</h1>
            </div>
        </div>
    </header>
    <section>
        <p class="text-center flex flex-column">Lien inactif pour le moment</p>
        <div class="projet flex flex-column col-12">
            
            <a href="https://google.fr" target="_blank"><img src="/img/Capture d'écran 2024-03-07 131029.png" alt="My yuka"></a>
            <a href="#"><img src="/img/Capture d'écran 2024-03-13 152118.png" alt="book catalog"></a>
        </div>
    </section>
    <?php  
       require_once(ROOT_PATH ."/librairies/footer.php");
       ?>
</body>
</html>
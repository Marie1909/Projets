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
        <div class="slider">
            <?php
            require_once (ROOT_PATH . "/librairies/topMenu.php");
            ?>
            <div class="text-center">
                <img id="photoProfil" src="/img/20240220_155455.jpg" alt="photoProfil">
            </div>
            <div class="nom d-flex flex-column ">

                <h1>Marie Capelle</h1>
                <div class="container">
                    <div class="typing-container">
                        <p>Je suis développeur fullstack&nbsp;<span typing-speed="70" typing-delay="1000"
                                words="en formation,passionnée,en recherche d'alternance"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="aPropos">
            <div>
                <div>
                    <h2>A propos de moi</h2>
                    <p>Passionnée, créative et déterminée à explorer le vaste monde de l'informatique, je suis
                        consciente que ce métier nécessite une formation permanente, en constante évolution. Je suis
                        enthousiaste à l'idée de relever les défis du développement web et de poursuivre au-delà. Ma
                        flexibilité et mon adaptabilité me permettent de m'ajuster rapidement aux nouvelles technologies
                        et méthodes de travail.
                        De plus, ma
                        collaboration efficace et mon esprit d'équipe sont des atouts qui enrichissent mon parcours
                        professionnel. Ma créativité et mon engagement envers la qualité me poussent à trouver des
                        solutions innovantes et à produire un travail de haute qualité. Ces compétences combinées
                        renforcent ma détermination à exceller dans le domaine du développement web.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="gap20 ">
        <h2>Mes compétences </h2>
        <div class="flex flex-wrap">
            <div class="competence25 skill">

                <a href="https://developer.mozilla.org/fr/docs/learn/html/introduction_to_html/getting_started">
                    <img src="/img/html5-logo.png" alt="logo html">
                </a>
            </div>
            <div class="competence25 skill">

                <a href="https://developer.mozilla.org/fr/docs/Web/CSS">
                    <img src="/img/css-3-logo.png" alt="logo css">
                </a>
            </div>
            <div class="competence25 skill js">

                <a href="https://developer.mozilla.org/fr/docs/Learn/JavaScript">
                    <img src="/img/JavaScript-logo.png" alt="logo js">
                </a>
            </div>
            <div class="competence25 skill php">

                <a href="https://www.php.net/manual/fr/intro-whatis.php">
                    <img src="/img/php-logo-transparent.png" alt="logo php">
                </a>
            </div>
            <div class="competence25 skill bootstrap">

                <a href="https://getbootstrap.com/">
                    <img src="/img/bootstrap-4096.png" alt="logo bootstrap">
                </a>
            </div>
            <div class="competence25 skill bootstrap">

                <a href="https://angular.io/docs">
                    <img src="/img/angular-icon-logo-png-transparent.png" alt="logo Angular">
                </a>
            </div>
            <div class="competence25 skill bootstrap">

                <a href="https://react.dev/">
                    <img src="/img/react_logo_2.png" alt="logo React">
                </a>
            </div>
            <div class="competence25 skill bootstrap">

                <a href="https://www.mysql.com/fr/">
                    <img src="/img/mysql_PNG23.png " alt="logo React">
                </a>
            </div>
        </div>
    </section>
    <?php
    require_once (ROOT_PATH . "/librairies/footer.php");
    ?>
</body>

</html>
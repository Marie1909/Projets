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
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        My Yuka

                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Projet utilisant les langages HTML, CSS et TypeScript, de la librairie
                        Bootstrap, du framework Angular ainsi que de l'API du site OpenFoodFact. <br>
                        <a href="http://myyuka/" target="_blank">
                            My Yuka
                        </a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Books
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Projet utilisant les langages HTML, CSS, JavaScript et une API fourni
                        books.json. <br>
                        <a href="http://book/" target="_blank">
                            Books
                        </a>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate
                        the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more
                        exciting happening here in terms of content, but just filling up the space to make it look, at
                        least at first glance, a bit more representative of how this would look in a real-world
                        application.</div>
                </div>
            </div>
        </div>

    </section>


    <?php
    require_once (ROOT_PATH . "/librairies/footer.php");
    ?>
</body>

</html>
<?php /* Template Name: Team */ ?>

<?php 
    get_header(null, array('invert'  => true, ));
?>

<!-- Fullsize -->
<div class="team-bg">
    <div class="main-content-container main-content-container-full">
        <h1 class="team-heading"><?php wp_title(''); ?></h1>

        <img class="team-img" src="img/demo/team.jpg" title="Teamfoto" />

        <div class="team-list">
            <div>
                <div class="team-group">
                    <h2>Torhüter</h2>
                    <a href="">
                        <p><span>88</span>Andreas Frunz</p>
                    </a>
                    <a>
                        <p><span>31</span>Daniel Gisin</p>
                    </a>
                </div>

                <div class="team-group">
                    <h2>Verteidiger</h2>
                    <a>
                        <p><span>71</span>Nicola Rüede</p>
                    </a>
                    <a>
                        <p><span>25</span>Luca Rüede</p>
                    </a>
                    <a>
                        <p><span>30</span>Andrin Luciani</p>
                    </a>
                    <a>
                        <p><span>33</span>Nico Baumann</p>
                    </a>
                    <a>
                        <p><span>17</span>Yannick Kalt</p>
                    </a>
                    <a>
                        <p><span>29</span>Christoph Hummel</p>
                    </a>
                    <a>
                        <p><span>44</span>Flurin Egger</p>
                    </a>
                </div>
            </div>

            <div>
                <div class="team-group">
                    <h2>Stürmer</h2>
                    <a>
                        <p><span>07</span>Matteo De Santis</p>
                    </a>
                    <a>
                        <p><span>60</span>Curdin Caflisch</p>
                    </a>
                    <a>
                        <p><span>93</span>Nicola De Santis</p>
                    </a>
                    <a>
                        <p><span>22</span>Tim Clerc</p>
                    </a>
                    <a>
                        <p><span>09</span>Tim Ursprung</p>
                    </a>
                    <a>
                        <p><span>77</span>Colin Trobl</p>
                    </a>
                    <a>
                        <p><span>20</span>Rudolf Würsch</p>
                    </a>
                    <a>
                        <p><span>23</span>Andrin Cimma</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="team-staff">
            <div class="team-group">
                <h2>Staff</h2>
                <p>
                    <span>Headcoach</span><br>
                    Manuel Schoop
                </p>
                <p>
                    <span>Assistenzcoach</span><br>
                    Luca Affolter
                </p>
                <p>
                    <span>Athletiktrainer</span><br>
                    Dominik Gazzetta
                </p>
                <p>
                    <span>Physiotherapeutin</span><br>
                    Carol Schaffner
                </p>
                <p>
                    <span>Mentalcoach</span><br>
                    Christoph Kistler
                </p>
            </div>
        </div>

    </div>
</div>


<?php
    get_footer();
?>
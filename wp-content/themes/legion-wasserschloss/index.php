<?php 
    get_header();
?>

<div class="content">
    <div class="hero-bg-img">
        <div class="main-content-container hero">
            <div class="logo-container">
                <img class="logo" src="<?php echo get_bloginfo('template_url') ?>/img/logo_negativ_borderless.svg">
            </div>

            <div class="hero-text">
                <h1>Willkommen <br>in der Legion!</h1>
                <p>
                    Hier findest du alle Informationen zum grössten Unihockey-Club des Aargaus.
                    Ob Spitzen- oder Breitensport bei uns findest du alles rund ums Unihockey
                    in der Region Baden-Brugg.
                </p>
                <div class="hero-cta cta-link">
                    <a class="link-button inverted hero-cta-link" href="legion-beitreten">Legion kontaktieren</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- TODO: Add with games
<section class="content-section bg-blue">
    <div class="main-content-container ">
        <h2 class="fp-heading">Nächstes Spiel</h2>

        <div class="next-game-grid">
            <img class="next-game-team-img-grid" src="<?php echo get_bloginfo('template_url') ?>/img/logo.svg">
            <span class="next-game-divider-grid"><i><b>vs</b></i></span>
            <img class="next-game-team-img-grid" src="<?php echo get_bloginfo('template_url') ?>/img/opponent.png">
            <div class="next-game-info-grid">
                <p>Samstag, 09.03.2024 20:00<br>Go Easy Arena</p>
            </div>
        </div>
    </div>
</section>
-->

<section class="content-section">
    <div class="main-content-container">
        <h2 class="fp-heading">Unsere Region</h2>

        <div class="region-content">
            <div class="region-content-map">
                <img src="<?php echo get_bloginfo('template_url') ?>/img/map.png" />
            </div>
            <div class="region-content-text">
                <p>
                    Durch die Fusion der Vereine Unihockey Baden-Birmenstorf,
                    Powermäuse Brugg und UHC Obersiggenthal wurde der Grundstein für die
                    Legion Wasserschloss gelegt. Hochqualifizierte Trainer:innen und
                    begeisterte Fans befähigen unsere über 400 Spielenden ihr volles
                    Potenzial in ihren jeweiligen Leistungsklassen an 11 Standorten zu verwirklichen.
                </p>
                <div class="cta-link">
                    <a class="link-button" href="fusionsprozess">Zum Fusionsprozess</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-section first-team">
    <div class="main-content-container">
        <div class="first-team-container">
            <h2 class="fp-heading">
                Unsere Legionäre:<br>
                Die erste Mannschaft
            </h2>
            <div class="hero-cta">
                <a class="link-button inverted hero-cta" href="/herren-1">Mehr zur Mannschaft</a>
            </div>

        </div>
    </div>
</section>

<section class="content-section">
    <div class="main-content-container">
        <h2 class="fp-heading">News</h2>

        <div class="news">
            <?php 
                $argsNews = array(
                    'numberposts'	=> 3,
                    'category'		=> 'News'
                );

                $newsPosts = get_posts( $args );

                $output = '';
                foreach ( $my_posts as $p ){
                    $output .= '<article class="news-article';
                    if(has_post_thumbnail($p->ID)) $output .= ' news-article-no-image';
                    $output .= '">';

                    $output .= '<a href="' . get_permalink($p->ID). '">';

                    $output .= get_the_post_thumbnail($p->ID, 'full', ['class' => 'news-article-image']);

                    $output .= '<div class="news-article-content';
                    if(has_post_thumbnail($p->ID)) $output .= 'news-article-content-no-image';
                    $output .= '">';

                    $output .= '<p class="news-article-date">' . get_the_date( 'd.m.Y' , $p->ID) . '</p>';
                    $output .= '<h3>' . get_the_title($p->ID) . '</h3>';
                    $output .= '<p>' .  get_the_excerpt($p->ID) . '</p>';

                    $output .= '</div>';
                    $output .= '</a>';
                    $output .= '</article>';
                }

                echo $output;
            ?>      
        </div>

    </div>

</section>


    
<?php
    get_footer();
?>
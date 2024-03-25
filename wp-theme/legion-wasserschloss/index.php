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
                    <a class="link-button inverted hero-cta-link" href="legion-beitreten">Legion beitreten</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- TODO: Add with games
<section class="content-section bg-blue">
    <div class="main-content-container ">
        <h2>Nächstes Spiel</h2>

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
        <h2>Unsere Region</h2>

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
            <h2>
                Unsere Helden:<br>
                Die erste Mannschaft
            </h2>
            <div class="hero-cta">
                <a class="link-button inverted hero-cta" href="https://uhbb.ch/herren_1._liga_gf_uhbb_/teamPage/home/15862">Mehr zur Mannschaft</a>
            </div>

        </div>
    </div>
</section>

<section class="content-section">
    <div class="main-content-container">
        <h2>News</h2>

        <div class="news">
            <?php if ( have_posts() ) : ?>
                <!-- Limit posts on main page to 3 (Change post_per_page to edit) -->
                <?php query_posts('posts_per_page=3'); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <!-- Check for last post in the loop and remove the line -->
                      <article class="news-article <?php if (!has_post_thumbnail()) echo 'news-article-no-image' ?>">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', ['class' => 'news-article-image']) ?>
                            
                            <!-- <img class="news-article-image" src="<?php echo get_bloginfo('template_url') ?>/img/demo/demo_news.jpg"> -->
                            <div class="news-article-content <?php if (!has_post_thumbnail()) echo 'news-article-content-no-image' ?>">
                                <p class="news-article-date"><?php echo get_the_date( 'd.m.Y' ); ?></p>
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?> 
                <p><?php esc_html_e( 'Es wurden keine Posts gefunden. Bitte kontaktieren Sie den Seitenadministrator.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>

</section>


    
<?php
    get_footer();
?>
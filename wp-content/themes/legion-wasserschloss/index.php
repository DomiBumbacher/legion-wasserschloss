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
                
                <div class="hero-cta cta-links">
                        <div class="hero-cta cta-link">
                            <a class="link-button inverted hero-cta-link" href="probetraining">Probetraining</a>
                        </div>
                        <div class="hero-cta cta-link">
                            <a class="link-button inverted hero-cta-link" href="legion-beitreten">Legion kontaktieren</a>
                        </div>
                    </div>
            </div>
        </div>

    </div>
</div>

<?php
    $nextGame = get_next_game_details();
    $nextGameId = $nextGame['id'];
    $homeTeamLogo = $nextGame['home_team_logo'];
    $homeTeamName = $nextGame['home_team_name'];
    $awayTeamLogo = $nextGame['away_team_logo'];
    $awayTeamName = $nextGame['away_team_name'];
    $gameDate = $nextGame['game_date'];
    $gameTime = $nextGame['game_time'];
    $gameLocation = $nextGame['game_location'];
?>

<?php if ($nextGameId !== null && $homeTeamName !== '' && $awayTeamName !== ''): ?>
<section class="content-section bg-blue">
    <div class="main-content-container ">
        <h2 class="fp-heading">Nächstes Spiel</h2>
        <div class="next-game-grid">
            <div class="next-game-team-grid next-game-home-grid">
                <img class="next-game-team-img-grid" src="<?php echo esc_url($homeTeamLogo); ?>" title="<?php echo esc_attr($homeTeamName); ?>" alt="<?php echo esc_attr($homeTeamName); ?>">
                <span class="next-game-team-name-grid"><?php echo esc_html($homeTeamName); ?></span>
            </div>
            <span class="next-game-divider-grid"><i><b>vs</b></i></span>
            <div class="next-game-team-grid next-game-away-grid">
                <img class="next-game-team-img-grid" src="<?php echo esc_url($awayTeamLogo); ?>" title="<?php echo esc_attr($awayTeamName); ?>" alt="<?php echo esc_attr($awayTeamName); ?>">
                <span class="next-game-team-name-grid"><?php echo esc_html($awayTeamName); ?></span>
            </div>
            <div class="next-game-info-grid">
                <p>
                <?php echo esc_html($gameDate); ?> <?php echo esc_html($gameTime); ?><br>
                <?php echo esc_html($gameLocation); ?></p>
            </div>
        </div>
    </div>
    <div class="main-content-container event-widget-container">
        <h2 class="fp-heading">Nächste Events</h2>
        <iframe class="event-widget-iframe" 
            src='https://www.holdsport.net/widgets/legion-wasserschloss?mobile=false&hide_profile_mobile=false&hide_profile_email=false&content_type=activities_list&show_price_type_table=false&allow_price_type_selection=false&activity_types=46809'
        height='520'></iframe>
    </div>
</section>
<?php endif; ?>

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
                    <a class="link-button" href="hallenguide">Unsere Hallen</a>
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

                $categoryNewsId = get_cat_ID( 'News' );
            
                $argsNews = array(
                    'numberposts'	=> 3,
                    'category'		=> $categoryNewsId,
                );

                $newsPosts = get_posts( $argsNews );

                echo build_posts( $newsPosts );
            ?>      
        </div>
    </div>
                
    <div class="main-content-container">
        <h2 class="fp-heading">Spielberichte</h2>

        <div class="news">
            <?php 

                $categorySpielberichtId = get_cat_ID( 'Spielberichte' );
            
                $argsSpielberichte = array(
                    'numberposts'	=> 6,
                    'category'		=> $categorySpielberichtId,
                );

                $spielberichtPosts = get_posts( $argsSpielberichte );

                echo build_posts( $spielberichtPosts );
            ?>      
        </div>

    </div>

</section>


    
<?php
    get_footer();
?>

<?php
    function build_posts( $posts ) 
    {
        $output = '';
        foreach ( $posts as $post ){
            $output .= '<article class="news-article';
            if(!has_post_thumbnail($post->ID)) $output .= ' news-article-no-image';
            $output .= '">';

            $output .= '<a href="' . get_permalink($post->ID). '">';

            $output .= get_the_post_thumbnail($post->ID, 'full', ['class' => 'news-article-image']);

            $output .= '<div class="news-article-content';
            if(!has_post_thumbnail($post->ID)) $output .= ' news-article-content-no-image';
            $output .= '">';

            $output .= '<p class="news-article-date">' . get_the_date( 'd.m.Y' , $post->ID) . '</p>';
            $output .= '<h3>' . get_the_title($post->ID) . '</h3>';
            $output .= '<p>' .  get_the_excerpt($post->ID) . '</p>';

            $output .= '</div>';
            $output .= '</a>';
            $output .= '</article>';
        }

        return $output;
    }
?>
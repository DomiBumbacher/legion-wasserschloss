<?php /* Template Name: Spieler */ ?>

<?php 
    get_header();
?>


<div class="player-bg">
    <div class="main-content-container player">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
            endwhile; else: ?>
            <p>Die gesuchte Seite konnte nicht gefunden werden.</p>
            <?php endif; ?>


    </div>



</div>

<?php
    get_footer();
?>
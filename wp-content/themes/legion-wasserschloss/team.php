<?php /* Template Name: Team */ ?>

<?php 
    get_header();
?>

<!-- Fullsize -->
<div class="team-bg">
    <div class="main-content-container main-content-container-full team">
        
    <h1><?php wp_title(''); ?></h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile; else: ?>
    <p>Die gesuchte Seite konnte nicht gefunden werden.</p>
    <?php endif; ?>

</div>


<?php
    get_footer();
?>
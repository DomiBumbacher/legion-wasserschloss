<?php /* Template Name: Normale Seite */ ?>

<?php 
    get_header(null, array('invert'  => true, ));
?>

<!-- Fullsize -->
<div class="main-content-container main-content-container-full">
    <h1><b><?php wp_title(''); ?></b></h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile; else: ?>
    <p>Die gesuchte Seite konnte nicht gefunden werden.</p>
    <?php endif; ?>
</div>

<?php
    get_footer();
?>
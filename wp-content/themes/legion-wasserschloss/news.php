<?php /* Template Name: News Uebersicht*/ ?>

<?php 
    get_header(null, array('invert'  => true, ));
?>

<div class="main-content-container main-content-container-full">
    <h1><b><?php wp_title(''); ?></b></h1>

    <?php 
        $query = ""; 
        if ( get_query_var('q') ) {
            $query = get_query_var('q');
        }
    ?>

    <form class="news-search" role="search" method="get" action="<?php echo esc_url(home_url('/News/')); ?>" >
        <input class="news-search-input" type="text" name="q" value="<?php echo $query; ?>" placeholder="Suche...">
        <button class="news-search-btn" type="submit">Suche</button>
    </form>

    <?php 
        if(strcmp($query,'') == 0){
            query_posts('posts_per_page=9&paged=' . get_query_var( 'paged' ));
        }else{
            query_posts('s=' . $query . '&posts_per_page=9&paged=' . get_query_var( 'paged' ));
        }
    ?>

    <?php if ( have_posts() ) : ?>

        <div class="news">

            <?php while ( have_posts() ) : the_post(); ?>

            <article class="news-article <?php if (!has_post_thumbnail()) echo 'news-article-no-image' ?>">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full', ['class' => 'news-article-image']) ?>
                    <div class="news-article-content <?php if (!has_post_thumbnail()) echo 'news-article-content-no-image' ?>">
                        <p class="news-article-date"><?php echo get_the_date( 'd.m.Y' ); ?></p>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </a>
            </article>

            <?php endwhile; ?>

        </div>

        <div class="news-navigation">
            <div class="news-link-container">
                <?php previous_posts_link( 'Vorherige Seite' ); ?>
            </div>
            <div class="news-link-container">
                <?php next_posts_link( 'Nächste Seite' ); ?>
            </div>
    
        </div>

    <?php else : ?>
	     <p><?php esc_html_e( 'Es wurden keine News gefunden. Bitte kontaktieren Sie den Seitenadministrator.' ); ?></p>
    <?php endif; wp_reset_query(); ?>
</div>

<?php
    get_footer();
?>
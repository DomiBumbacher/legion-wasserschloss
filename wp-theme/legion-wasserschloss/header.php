<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <nav class="navbar">
            <input type="checkbox" id="navbar-toggle">
            <label for="navbar-toggle" class="menu-btn menu-btn-open">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 141.7 141.7" style="enable-background:new 0 0 141.7 141.7;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:#112156;}
                    .st1{fill:<?php if(array_key_exists("invert",$args)) { echo '#0f2056';} else { echo '#FFFFFF'; }?>}
                </style>
                <g id="Ebene_4">
                    <g>
                        <path class="st0" d="M13.7,73.5c6.8,1.3,26.3,4,37.7,2.4c29.3-4.2,36.5-18.8,75.4-4.1"/>
                        <path class="st1" d="M43,83.9c-11.8,0-25.4-2-30.7-3l2.8-14.7c7.2,1.4,25.4,3.8,35.3,2.3c8.4-1.2,14.9-3.3,21.1-5.4
                            c14.7-4.9,28.6-9.4,58,1.7l-5.3,14c-24.4-9.3-34.3-6-48-1.5c-6.6,2.2-14,4.6-23.7,6C49.6,83.7,46.4,83.9,43,83.9z"/>
                    </g>
                    <g>
                        <path class="st0" d="M13.7,46.5c6.8,1.3,26.3,4,37.7,2.4c29.3-4.2,36.5-18.8,75.4-4.1"/>
                        <path class="st1" d="M43,56.9c-11.8,0-25.4-2-30.7-3l2.8-14.7c7.2,1.4,25.4,3.8,35.3,2.3c8.4-1.2,14.9-3.3,21.1-5.4
                            c14.7-4.8,28.6-9.4,58,1.7l-5.3,14c-24.4-9.3-34.3-6-48-1.5c-6.6,2.2-14,4.6-23.7,6C49.6,56.7,46.4,56.9,43,56.9z"/>
                    </g>
                    <g>
                        <path class="st0" d="M13.7,100.4c6.8,1.3,26.3,4,37.7,2.4c29.3-4.2,36.5-18.8,75.4-4.1"/>
                        <path class="st1" d="M43,110.8c-11.8,0-25.4-2-30.7-3L15.1,93c7.2,1.4,25.3,3.8,35.3,2.3c8.4-1.2,14.9-3.3,21.1-5.4
                            c14.7-4.9,28.6-9.4,58,1.7l-5.3,14c-24.4-9.3-34.3-6-48-1.5c-6.6,2.2-14,4.6-23.7,6C49.6,110.7,46.4,110.8,43,110.8z"/>
                    </g>
                </g>
                <g id="Ebene_3">
                </g>
                <g id="Hilfslinien">
                </g>
                </svg>
            </label>
            <label for="navbar-toggle" class="menu-btn menu-btn-close" hidden><img src="<?php echo get_bloginfo('template_url') ?>/img/close.svg"></label>

               <?php wp_nav_menu( array( 'theme_location' => 'header-menu',
                                            'container_class' => 'menu-overlay',
                                            'container_id' => 'nav',
                                            'walker' => new Custom_Navwalker() ) ); ?>             
        </nav>
    </header>
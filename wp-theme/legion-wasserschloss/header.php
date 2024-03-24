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
            <label for="navbar-toggle" class="menu-btn menu-btn-open"><img src="<?php echo get_bloginfo('template_url') ?>/img/burger.svg"></label>
            <label for="navbar-toggle" class="menu-btn menu-btn-close" hidden><img src="<?php echo get_bloginfo('template_url') ?>/img/close.svg"></label>

            <div id="nav" class="menu-overlay">
                <ul>
                    <li class="nav-item nav-item-1 active"><a>Home</a></li>
                    <li class="nav-item nav-item-1"><a>News</a></li>
                    <li class="nav-item nav-item-1 nav-accordion">
                        <a>Verein</a>
                        <span class="accordion-toggle"></span>
                        <ul class="dropdown-menu">
                            <li class="nav-item nav-item-2"><a>Portrait</a></li>
                            <li class="nav-item nav-item-2"><a>Organisation</a></li>
                            <li class="nav-item nav-item-2"><a>Chronik</a></li>
                            <li class="nav-item nav-item-2"><a>Vorstand</a></li>
                            <li class="nav-item nav-item-2"><a>Schiedsrichter</a></li>
                            <li class="nav-item nav-item-2"><a>Funktionäre</a></li>
                            <li class="nav-item nav-item-2"><a>Ehrenmitglieder</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-item-1 nav-accordion">
                        <a>Teams</a>
                        <span class="accordion-toggle"></span>
                        <ul class="dropdown-menu">
                            <li class="nav-item nav-item-2"><a>Team 1</a></li>
                            <li class="nav-item nav-item-2"><a>Team 2</a></li>
                            <li class="nav-item nav-item-2"><a>Team 3</a></li>
                        </ul>
                    </li>

                    <li class="nav-item nav-item-1">
                        <a class="nav-link" href="/sponsoren">Sponsoren</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
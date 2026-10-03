<?php

/* Styles and Scripts */
function navbar(){
    wp_enqueue_script( 'navbar-js', get_template_directory_uri() . '/scripts/navbar.js', array(), false, array('strategy'  => 'defer', ));
    wp_enqueue_style( 'navbar-css', get_template_directory_uri() . '/navbar.css' );
}

function styles(){
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/normalize.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'teams', get_template_directory_uri() . '/team.css' );
    wp_enqueue_style( 'player', get_template_directory_uri() . '/player.css' );
    wp_enqueue_style( 'news', get_template_directory_uri() . '/news.css');
    wp_enqueue_style( 'forms-cf7', get_template_directory_uri() . '/forms_cf7.css' );
}

add_action('wp_enqueue_scripts', 'styles');
add_action('wp_enqueue_scripts', 'navbar');

/* Menu */
require_once('navwalker.php');

function register_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Hauptmenü' )
     )
   );
 }

 add_action( 'init', 'register_menus' );

 /* Theme */
 add_theme_support( 'post-thumbnails' );

function get_swissunihockey_season() {
    $now = new DateTimeImmutable('now');
    $cutoff = DateTimeImmutable::createFromFormat('Y-m-d', $now->format('Y') . '-05-01');

    if ($now < $cutoff) {
        return (string) ((int) $now->format('Y') - 1);
    }

    return (string) $now->format('Y');
}

function get_next_game_details($team_id = 432237) {
    $season = get_swissunihockey_season();

    $game = array(
        'id' => null,
        'home_team_logo' => '',
        'home_team_name' => '',
        'away_team_logo' => '',
        'away_team_name' => '',
        'game_date' => '',
        'game_time' => '',
        'game_location' => '',
    );

    $list_url = 'https://api-v2.swissunihockey.ch/api/games?mode=team&season=' . $season . '&team_id=' . $team_id . '&games_per_page=500';
    $list_request = curl_init();
    curl_setopt($list_request, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($list_request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($list_request, CURLOPT_URL, $list_url);
    $list_result = curl_exec($list_request);
    curl_close($list_request);

    if ($list_result === false) {
        return $game;
    }

    $list_data = json_decode($list_result);
    if (empty($list_data->data->regions)) {
        return $game;
    }

    $today = current_time('Y-m-d');
    $next_game_date = null;
    $next_game_id = null;

    foreach ($list_data->data->regions as $region) {
        foreach ($region->rows as $row) {
            $date_text = $row->cells[0]->text[0] ?? '';
            if ($date_text === 'heute') {
                $candidate_date = $today;
            } else {
                $parsed_date = DateTimeImmutable::createFromFormat('!d.m.Y', $date_text);
                if (!$parsed_date) {
                    continue;
                }
                $candidate_date = $parsed_date->format('Y-m-d');
            }

            if ($candidate_date > $today && ($next_game_date === null || $candidate_date < $next_game_date)) {
                $next_game_date = $candidate_date;
                $next_game_id = $row->link->ids[0] ?? null;
            }
        }
    }

    if ($next_game_id === null) {
        return $game;
    }

    $details_url = 'https://api-v2.swissunihockey.ch/api/games/' . $next_game_id;
    $details_request = curl_init();
    curl_setopt($details_request, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($details_request, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($details_request, CURLOPT_URL, $details_url);
    $details_result = curl_exec($details_request);
    curl_close($details_request);

    if ($details_result === false) {
        return $game;
    }

    $details_data = json_decode($details_result);
    $game_cells = $details_data->data->regions[0]->rows[0]->cells ?? array();

    $game['id'] = $next_game_id;
    $game['home_team_logo'] = $game_cells[0]->image->url ?? '';
    $game['home_team_name'] = $game_cells[1]->text[0] ?? '';
    $game['away_team_logo'] = $game_cells[2]->image->url ?? '';
    $game['away_team_name'] = $game_cells[3]->text[0] ?? '';
    $game['game_date'] = $game_cells[5]->text[0] ?? '';
    $game['game_time'] = $game_cells[6]->text[0] ?? '';
    $game['game_location'] = $game_cells[7]->text[0] ?? '';

    return $game;
}

 /* Search */
 add_action('init','add_get_val');
function add_get_val() { 
    global $wp; 
    $wp->add_query_var('q'); 
}
<?php
// This file is generated. Do not modify it manually.
return array(
	'lws-result-table' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'lws/lws-result-table',
		'version' => '0.1.0',
		'title' => 'LWS Result Table',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'This block show the current standings for a given LWS team.',
		'example' => array(
			
		),
		'attributes' => array(
			'season' => array(
				'type' => 'integer',
				'default' => 2024
			),
			'league' => array(
				'type' => 'integer'
			),
			'game_class' => array(
				'type' => 'integer'
			),
			'group' => array(
				'type' => 'integer'
			)
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'lws-result-table',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);

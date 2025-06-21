<?php
// This file is generated. Do not modify it manually.
return array(
	'lws-next-games' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'lws/lws-next-games',
		'version' => '0.1.0',
		'title' => 'LWS Next Games',
		'category' => 'widgets',
		'icon' => 'smiley',
		'description' => 'This block show the next games for a given LWS team.',
		'example' => array(
			
		),
		'attributes' => array(
			'season' => array(
				'type' => 'integer',
				'default' => 2024
			),
			'teamid' => array(
				'type' => 'integer'
			)
		),
		'supports' => array(
			'html' => false
		),
		'textdomain' => 'lws-next-games',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);

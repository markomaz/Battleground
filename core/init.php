<?php

$GLOBALS['config'] = array(
	'Warrior' => array(
		'HP' => 100,
		'attack' => 50,
		'defense' => 0.3
	),
	'battle' => array(
		'random_events' => array(
			'dragon_attack_percentage' => 3
		)
		
	)
);

spl_autoload_register(function($classname) {
	require_once("classes/{$classname}.php");
});

require_once("functions/utility.php");
<?php

class Warrior extends Combatant {

	public function __construct($name) {
		parent::__construct($name,
							$GLOBALS['config']['Warrior']['HP'], 
							$GLOBALS['config']['Warrior']['attack'], 
							$GLOBALS['config']['Warrior']['defense']);
	}
}
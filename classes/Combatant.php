<?php

class Combatant {
	private $_name;
	private $_health;
	private $_attack;
	private $_defense;
	private $_dead = false;

	public function __construct($name, $health, $attack, $defense) {
		$this->_name = $name;
		$this->_health = $health;
		$this->_attack = $attack;
		$this->_defense = $defense;
	}

	public function getName() {
		return $this->_name;
	}

	public function getHP() {
		return $this->_health;
	}

	public function getAttack() {
		return $this->_attack;
	}

	public function getDefense() {
		return $this->_defense;
	}

	public function setHP($value) {
		$this->_health = $value;
		if ($this->_health <= 0) {
			$this->_dead = true;
		}
	}

	public function isDead() {
		return $this->_dead;
	}

	public function engage($target) {
		$damage = $this->_attack * (1 - $target->getDefense());
		$target->setHP($target->getHP() - $damage);
	}
}
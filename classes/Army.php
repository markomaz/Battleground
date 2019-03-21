<?php

class Army {

	private $_name;
	private $_combatants;
	private $_alive_combatants_number;

	private $_defeated = false;
	private $_surrendered = false;

	public function __construct($army_name, $num_of_combatants) {
		$this->_name = $army_name;
		$this->_alive_combatants_number = $num_of_combatants;
		$this->_combatants = array();

		$this->generateCombatants();
	}


	public function generateCombatants() {
		for($i = 0; $i < $this->_alive_combatants_number; $i++) {
			$this->_combatants[$i] = new Warrior("Warrior" . ($i + 1));
		}
	}

	public function getName() {
		return $this->_name;
	}

	public function getCombatants() {
		return $this->_combatants;
	}

	public function getAliveCombatantsNumber() {
		return $this->_alive_combatants_number;
	}

	private function determineAttacker() {
		$attacker_index = Random::intNumber(0, $this->_alive_combatants_number - 1);

		return $this->_combatants[$attacker_index];
	}

	private function determineTarget($enemy_army) {
		$defender_index = Random::intNumber(0, $enemy_army->getAliveCombatantsNumber() - 1);

		return $enemy_army->getCombatants()[$defender_index];
	}

	public function removeDeadCombatant($combatant) {
		$combatant_index = array_search($combatant, $this->_combatants);
		// Remove combatant from combatants array and re-index the array:
		array_splice($this->_combatants, $combatant_index, 1);

		$this->_alive_combatants_number--;
		if($this->_alive_combatants_number <= 0) {
			$this->_defeated = true;
		}
	}

	public function attack($enemy_army) {
		$attacker = $this->determineAttacker();
		$target = $this->determineTarget($enemy_army);

		$attacker->engage($target);

		if($target->isDead()) {
			showOutcome($this->_name, 
						$attacker->getName(), 
						$enemy_army->getName(), 
						$target->getName());
			$enemy_army->removeDeadCombatant($target);
		}
	}

	public function isDefeated() {
		return $this->_defeated;
	}

	public function hasSurrendered() {
		return $this->_surrendered;
	}

}
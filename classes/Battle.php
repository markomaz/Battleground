<?php

class Battle {
	private $_armies;
	private $_winner;
	private $_loser;

	public function __construct($army1, $army2) {
		$this->_armies = new SplFixedArray(2);
		$this->_armies[0] = $army1;
		$this->_armies[1] = $army2;
	}

	public function start() {

		$this->_winner = null;
		$this->_loser = null;

		// Randomly determine which army starts with attack and which with defense. 
		// Armies are stored in 2-element array and are thus indexed by 0 or 1
		$attacking_army_index = Random::intNumber(0, 1);
		$defending_army_index = ($attacking_army_index == 0) ? 1 : 0;
		
		$attacking_army = $this->_armies[$attacking_army_index];
		$defending_army = $this->_armies[$defending_army_index];

		do {
			$attacking_army->attack($defending_army);

			$this->randomEvent();

			if ($defending_army->isDefeated() || $defending_army->hasSurrendered()) {
				$this->_winner = $attacking_army;
				$this->_loser = $defending_army;
				return;
			}else {
				switchValues($attacking_army, $defending_army);	// Switch turns attacking
			}
		}while(true);
	}

	public function showBattleResult() {
		if (!$this->_winner || !$this->_loser) return;

		$winner_name = $this->_winner->getName();
		$loser_name = $this->_loser->getName();

		echo "<br> <b>";
		if ($this->_loser->hasSurrendered()) {
			echo "{$winner_name} has won! -- {$loser_name} has surrendered!";
		}else {
			echo "{$winner_name} has won! -- All of {$loser_name} combatants have been killed!";
		}
	}

	public function randomEvent() {
		$value = Random::intNumber(0, 1000);
		$dragon_attack_percentage = $GLOBALS['config']['battle']['random_events']['dragon_attack_percentage'];

		if ($value <= $dragon_attack_percentage) {
			// The dragon attack has occured!
			echo "<br> <b>";
			echo "Awakened by the unnerving sounds of battle, an angry, giant dragon 
				unleashed his fire upon the battleground, killing everyone instantly!";
			die();
		}
	}
	
}
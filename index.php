<?php
require_once("core/init.php");

if (!Input::exists()) die("No input parameters given!");



$army1_combatants_number = Input::get('army1');
$army2_combatants_number = Input::get('army2');


$army1 = new Army("Army of Lothric", $army1_combatants_number);
$army2 = new Army("Irithyll army", $army2_combatants_number);

//$army1->showCombatants();
//$army2->showCombatants();

$battle = new Battle($army1, $army2);
$battle->start();
$battle->showBattleResult();




?>
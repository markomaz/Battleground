<?php

function show($data) {
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function switchValues(&$value1, &$value2) {
	$temp = $value1;
	$value1 = $value2;
	$value2 = $temp;
}

function showOutcome($army1, $attacker, $army2, $target) {
	echo "{$army1} {$attacker} kills {$army2} $target";
	echo "<br>";
}
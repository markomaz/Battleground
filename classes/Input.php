<?php

class Input {

	public static function exists() {
		return empty($_GET) ? false : true ;
	}

	public static function get($item) {
		if (isset($_GET[$item])) {
			if (is_numeric($_GET[$item])) return intval($_GET[$item]);
			else return false;
		}else return false;
	}

	public static function check() {
		//
	}
}
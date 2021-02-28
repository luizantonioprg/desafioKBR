<?php
class Model{


	private static $instance;
	public static function conectarBanco(){

		if(!isset(self::$instance)){

			self::$instance = new \PDO ('mysql:host=localhost;dbname=kbr;charset=utf8','root','');
			return self::$instance;
		}
	}
}
<?php
/** This file contains secure information relating to database connection for the site.
  * For this we are excluding it from the repo due to security concerns.
 **/
Class  Database {
	private $username = 'sociable_recipes';
	private $password = 'The0d0re';
	private $host     = 'localhost:8080';
	private $database = 'sociable_recipe';
	private $instance;

	public function __construct() {
		$dsn = ' mysql:host=' . $this->host . ';dbname=' . $this->database;
		$opt = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];
		$this->instance = new PDO($dsn, $this->username, $this->password, $opt);

	}
}
/**
	public function ins() {
		return $this->instance;
	}
	public function select($what, $from, $cond, $fetch = true) {
		$query = "SELECT " . $what . " FROM " . $from . " WHERE " . $cond;
		$result = $this->instance->query($query);
		if($fetch) {
			return $result->fetch();
		}
		return $result;
	}
**/
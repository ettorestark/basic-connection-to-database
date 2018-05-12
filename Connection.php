<?php
	require 'config.php';
	class Connection {
		private $driver, $host, $user, $password, $database, $charset, $errorMessage;
		public function __construct() {
			$this->driver = DB_DRIVER;
			$this->host = DB_HOST;
			$this->user = DB_USER;
			$this->password = DB_PASSWORD;
			$this->database = DB_DATABASE;
			$this->charset = DB_CHARSET;
			$this->errorMessage = null;
		}
		public function get_connection() {
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			try {
				$pdo = new PDO("$this->driver:host=$this->host;dbname=$this->database;", $this->user, $this->password);
				return $pdo;
			}catch(PDOException $e) {
				$this->errorMessage = "Error: ". $e->getMessage();
			}
		}
	}
?>
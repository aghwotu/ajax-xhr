<?php 
	class Database {
		private $host = 'localhost';
		private $username = 'root';
		private $pwd = '';
		private $dbname = 'examination';
		private $conn;

		public function connect() {
			$conn = new mysqli($this->host, $this->username, $this->pwd, $this->dbname);
			return $conn;
		}
	}

		

 ?>
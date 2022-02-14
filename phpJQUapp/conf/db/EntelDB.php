<?php

/*
 Database Connector
 *
 */


class EntelDB {
	 public $dbName = 'allnews';
	 public $dbUsername = 'root';
	 public $dbPassword = 'Oppositeihub14#';
	 public $conn='';
	

	 public function __construct($dbName="",$dbUsername="",$dbPassword="") {
			$this->$dbName = $dbName;
			$this->dbUsername = $dbUsername;
			$this->dbPassword = $dbPassword;
			
	 		//native PDO loaders
			$this -> conn = new PDO("mysql:host=localhost;dbname=" . $this -> dbName . ";charset=utf8", $this -> dbUsername, $this -> dbPassword);
			$this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	/**
	 *read data from a database
	 *@param query
	 *@param array of conditons
	 *@return array
	 */
	public function read($q,$a){
		$conn=$this->conn;
		$stmt=$conn->prepare($q);
		$stmt->execute($a);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}
?>

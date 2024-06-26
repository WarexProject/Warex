<?php

class Database
{
	private $connection; 
	
	private $servername = "localhost";
	private $username = "warex";
	private $password = "warex";
	private $database = "warex";

	public function __construct(){
		$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database, '3306');

		if($this->connection->connect_errno){
			echo 'Error de conexión a la base de datos';
			exit;
		}
		$this->connection->set_charset("utf8mb4");
	}

	public function getDB($table=null, $extra = null, $sql = null){
		$query = "";
		// he agregado esta parte
		if($sql){
			if (substr($sql, 0, 8) == 'opcion01') {
				$WarehouseID = substr($sql, 8);
				$query = "SELECT DISTINCT section.SectionID, section.SectionName FROM section INNER JOIN warehouses ON warehouses.WarehouseID = section.WarehouseID WHERE warehouses.WarehouseID = $WarehouseID";
			}
			else if(substr($sql, 0, 8) == 'opcion02'){
				$SectionID = substr($sql, 8);
				$query = "SELECT DISTINCT shelf.ShelfID, shelf.ShelfName FROM shelf INNER JOIN section ON section.SectionID = shelf.SectionID WHERE section.SectionID = $SectionID";
			}
			else{
				return [];
			}
		}
		else if($table){
			$query = "SELECT * FROM $table";
			if ($extra != null) {
				$query .= ' WHERE';
	
				foreach ($extra as $key => $condition) {
					$query .= ' ' . $key . ' = "' . $condition . '"';
					if ($extra[$key] != end($extra)) {
						$query .= " AND ";
					}
				}
			}
		}
		$results = $this->connection->query($query);
		$resultArray = array();

		foreach ($results as $value) {
			$resultArray[] = $value;
		}

		return $resultArray; 
	}


	public function insertDB($table, $data){
		$fields = implode(',', array_keys($data)); 
		$values = '"';
		$values .= implode('","', array_values($data)); 
		$values .= '"';
		$query = "INSERT INTO $table (".$fields.') VALUES ('.$values.')';
		$this->connection->query($query);

		return $this->connection->insert_id;
	}

	public function updateDB($table, $params, $data){	
		$query = "UPDATE $table SET ";
		foreach ($data as $key => $value) {
			$query .= "$key = '$value'";
			if(sizeof($data) > 1 && $key != array_key_last($data)){
				$query .= " , ";
			}
		}
		$query .= ' WHERE ';
		foreach ($params as $key => $condition) {
			$query .= ' '.$key.' = "'.$condition.'"';
			if($params[$key] != end($params)){
				$query .= " AND ";
			}
		}

		$this->connection->query($query);

		if(!$this->connection->affected_rows){
			return 0;
		}

		return $this->connection->affected_rows;
	}


	public function deleteDB($table, $params){
		$query = "DELETE FROM $table WHERE ";
		foreach ($params as $key => $condition) {
			$query .= ' '.$key.' = "'.$condition.'"';
			if($params[$key] != end($params)){
				$query .= " AND ";
			}
		}
		$this->connection->query($query);
		if(!$this->connection->affected_rows){
			return 0;
		}
		return $this->connection->affected_rows;
	}
}


?>
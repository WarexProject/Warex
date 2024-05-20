<?php
class Database
{
	private $connection; //conexión a BD
	private $results_page = 5; //nº de resultados por página

	// Configuración de la base de datos
	private $servername = "localhost";
	private $username = "warex";
	private $password = "warex";
	private $database = "warex";
	/**
	 * Método constructor: crea la conexión con BD
	 */
	public function __construct(){
		$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database, '3306');

		if($this->connection->connect_errno){
			echo 'Error de conexión a la base de datos';
			exit;
		}
	}

	public function getDB($table, $extra = null){
		$query = "SELECT * FROM $table"; //consulta por defecto

		//si recibimos parámetros en la petición get...
		if($extra != null){
			//concatenamos las condiciones a la consulta por defecto
			$query .= ' WHERE';

			foreach ($extra as $key => $condition) {
				$query .= ' '.$key.' = "'.$condition.'"';
				if($extra[$key] != end($extra)){
					$query .= " AND ";
				}
			}
		}

		$results = $this->connection->query($query); //realizamos consulta
		$resultArray = array(); //creamos un array que recoja la consulta

		//rellenamos el array que devuelve la consulta...
		foreach ($results as $value) {
			$resultArray[] = $value;
		}

		return $resultArray; //devolvemos la consulta
	}

	public function insertDB($table, $data){
		//se convierten los elementos del array $data en dos cadenas
		$fields = implode(',', array_keys($data)); //campos
		$values = '"';
		$values .= implode('","', array_values($data)); //valores
		$values .= '"';
		//que se van a usar en la inserción a BD
		$query = "INSERT INTO $table (".$fields.') VALUES ('.$values.')';
		$this->connection->query($query);

		return $this->connection->insert_id;
	}

	public function updateDB($table, $id, $data){	
		//generamos la sentencia sql
		$query = "UPDATE $table SET ";
		//con los parámetros recibidos por parámetro
		foreach ($data as $key => $value) {
			$query .= "$key = '$value'";
			//si son más de un parámetro, concatenamos con la separación ,
			if(sizeof($data) > 1 && $key != array_key_last($data)){
				$query .= " , ";
			}
		}
		//la tupla a actualizar
		$query .= ' WHERE id = '.$id;

		$this->connection->query($query);

		//si no modificamos ninguna tupla	
		if(!$this->connection->affected_rows){
			return 0;
		}

		//devolvemos el nº de tuplas afectadas	
		return $this->connection->affected_rows;
	}


	public function deleteDB($table, $params){
		//Eliminamos la tupla con el id indicado. Cambiar id por parametro identificado en cada tabla
		$query = "DELETE FROM $table WHERE ";
		foreach ($params as $key => $condition) {
			$query .= ' '.$key.' = "'.$condition.'"';
			if($params[$key] != end($params)){
				$query .= " AND ";
			}
		}
		$this->connection->query($query);
		//Si no se elimina, devolvemos 0
		if(!$this->connection->affected_rows){
			return 0;
		}
		//Devolvemos el nº de tuplas eliminadas
		return $this->connection->affected_rows;
	}
}


?>
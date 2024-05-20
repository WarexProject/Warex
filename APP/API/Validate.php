<?php
//Importamos la clase Response y la clase Database
require_once 'Response.php';
require_once 'Database.php';

class Validate extends Database
{

	//REPLANTEAR DOMINGO

	private $tables = array('access', 'companies', 'warehouses', 'section', 'shelf', 'location', 'products');

	//indicamos los parámetros válidos para las peticiones get mediante un array
	private $accessGetFields = array('DNI','Name','LastName','UserName','Password','Permissions','CompanyID');
	private $companyGetFields = array('NIF','CompanyName');
	private $warehousesGetFields = array('WarehouseID','CompanyID','TotalProductQuantity','RefrigeratingChamber');
	private $sectionGetFields = array('SectionID','WarehouseID','SectionName');
	private $shelfGetFields = array('ShelfID','SectionID','ShelfName');
	private $locationGetFields = array('WarehouseID','ProductID','SectionID','ShelfID','TotalProductQuantity');
	private $productGetFields = array('ProductID','ProductName','TotalProductQuantity','Description','UnitPrice','ExpiryDate');

	//indicamos los parámetros válidos para las peticiones post y put mediante un array
	private $accessPutFields = array('Name','LastName','UserName','Password','Permissions');
	private $companyPutFields = array('CompanyName',);
	private $warehousesPutFields = array('TotalProductQuantity','RefrigeratingChamber');
	private $sectionPutFields = array('SectionName');
	private $shelfPutFields = array('ShelfName');
	private $locationPutFields = array('TotalProductQuantity');
	private $productPutFields = array('ProductName','TotalProductQuantity','Description','UnitPrice','ExpiryDate');


	private function validate($data){
		//si no existe el parámetro nombre...
		if(!isset($data['CompanyName']) || empty($data['CompanyName'])){
			//... genera la respuesta de error
			$response = array(
				'result' => 'error',
				'details' => 'El campo nombre es obligatorio'
			);

			Response::result(400, $response);
			exit;
		}
		//si existe el parámetro disponible y es diferente a 1 o 0....
		if(isset($data['disponible']) && !($data['disponible'] == "1" || $data['disponible'] == "0")){
			//... genera la respuesta de error
			$response = array(
				'result' => 'error',
				'details' => 'El campo disponible debe ser del tipo boolean'
			);

			Response::result(400, $response);
			exit;
		}
		
		return true;
	}

	public function get($table, $params){
		$responseError = array(
			'result' => 'error',
			'details' => 'Error en la solicitud'
		);
		// SI LA TABLA NO EXISTE O EL PARÁMETRO NO EXISTE EN LA TABLA
		if(!in_array($table, $this->tables) || !$this->validateGetParams($table, $params)){
			Response::result(400, $responseError);
			exit;
		}

		$data = parent::getDB($table, $params);
		return $data;
	}

	public function insert($table, $params){
		$responseError = array(
			'result' => 'error',
			'details' => 'Error en la solicitud'
		);
				// SI LA TABLA NO EXISTE O EL PARÁMETRO NO EXISTE EN LA TABLA
		if(!in_array($table, $this->tables) || !$this->validateGetParams($table, $params)){
			Response::result(400, $responseError);
			exit;
		}

		return parent::insertDB($table, $params);
	}


	public function update($id, $params){
		//recorremos los parámetros
		foreach ($params as $key => $parm) {
			//si no son válidos
			if(!in_array($key, $this->allowedConditions_insert_update)){
				//eliminamos
				unset($params[$key]);
				//generamos la respuesta de error y devolvemos
				$response = array(
					'result' => 'error',
					'details' => 'Error en la solicitud'
				);
	
				Response::result(400, $response);
				exit;
			}
		}
		//si son parámetros válidos
		if($this->validate($params)){
			//realizamos la actualización en BD pasando los parámetros y el id de la tupla
			$affected_rows = parent::updateDB($this->table, $id, $params);
			//si no se actualizó, generamos la respuesta
			if($affected_rows==0){
				$response = array(
					'result' => 'error',
					'details' => 'No hubo cambios'
				);

				Response::result(200, $response);
				exit;
			}
		}
	}

	public function delete($table, $params)	{
		
		if(!in_array($table, $this->tables)){
			$response = array(
				'result' => 'error',
				'details' => 'LA TABLA NO EXISTE'
			);
			Response::result(200, $response);
			exit;
		}
		$affected_rows = parent::deleteDB($table, $params);
		
		if($affected_rows==0){
			$response = array(
				'result' => 'error',
				'details' => 'No hubo cambios'
			);
			Response::result(200, $response);
			exit;
		}
	}


	public function validateGetParams($table, $params){
		switch ($table) {
			case 'access':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->accessGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;
			case 'companies':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->companyGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;
			case 'warehouses':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->warehousesGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;

			case 'section':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->sectionGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;
			case 'shelf':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->shelfGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;
			case 'location':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->locationGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;
			case 'products':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->productGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				break;

			default:
				return false;
				break;
		}
	}

}

?>
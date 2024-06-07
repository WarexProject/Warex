<?php
require_once 'Response.php';
require_once 'Database.php';

class Validate extends Database
{


	private $tables = array('access', 'companies', 'warehouses', 'section', 'shelf', 'location', 'products');

	private $accessGetFields = array('DNI','Name','LastName','UserName','Password','Permissions','CompanyID'); 
	private $companyGetFields = array('NIF','CompanyName'); 
	private $warehousesGetFields = array('WarehouseID','CompanyID','TotalProductQuantity','RefrigeratingChamber'); 
	private $sectionGetFields = array('SectionID','WarehouseID','SectionName');
	private $shelfGetFields = array('ShelfID','SectionID','ShelfName'); 
	private $locationGetFields = array('WarehouseID','ProductID','SectionID','ShelfID','TotalProductQuantity'); 
	private $productGetFields = array('ProductID','ProductName','TotalProductQuantity','Description','UnitPrice','ExpiryDate', 'CompanyID');

	private $accessPutFields = array('DNI','Name','LastName','UserName','Password','Permissions','CompanyID');
	private $companyPutFields = array('CompanyName'); 
	private $warehousesPutFields = array('TotalProductQuantity','RefrigeratingChamber');
	private $sectionPutFields = array('SectionName');
	private $shelfPutFields = array('ShelfName');
	private $locationPutFields = array('TotalProductQuantity');
	private $productPutFields = array('ProductName','TotalProductQuantity','Description','UnitPrice','ExpiryDate'); 


	public function get($table, $params = null, $sql = null){
		$responseError = array(
			'result' => 'error',
			'details' => 'Error en la solicitud'
		);
		if (!in_array($table, $this->tables) || !$this->validateGetParams($table, $params)) {
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
		if(!in_array($table, $this->tables) || !$this->validateGetParams($table, $params)){
			Response::result(400, $responseError);
			exit;
		}

		return parent::insertDB($table, $params);
	}


	public function update($table, $params, $data){
		$responseError = array(
			'result' => 'error',
			'details' => 'Error en la solicitud'
		);
		if(!in_array($table, $this->tables) || !$this->validateGetParams($table, $params) || !$this->validateGetParams($table, $data)){
			Response::result(400, $responseError);
			exit;
		}

		return parent::updateDB($table, $params, $data);
	}

	public function delete($table, $params)	{ //CONTROLAR QUE SI NO HAY PARAMETROS, LANCE ERROR
		
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
			case 'companies':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->companyGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'warehouses':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->warehousesGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

			case 'section':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->sectionGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

				case 'shelf':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->shelfGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

				case 'location':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->locationGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

				case 'products':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->productGetFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
				
			default:
				return false;
			}
	}

	public function validatePutParams($table, $params){
		switch ($table) {
			case 'access':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->accessPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'companies':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->companyPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'warehouses':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->warehousesPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

			case 'section':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->sectionPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'shelf':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->shelfPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'location':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->locationPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;
			case 'products':
				foreach ($params as $key => $param) {
					if(!in_array($key, $this->productPutFields)){
						unset($params[$key]);						
						return false;
					}
				}
				return true;

			default:
				return false;
		}
	}
}

?>
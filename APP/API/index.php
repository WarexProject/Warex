<?php

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Manejar las solicitudes preflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	http_response_code(200);
	exit();
}

require_once 'Response.php';
require_once 'Validate.php';

$validate = new validate();

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		$sql = isset($_GET['sql']) ? urldecode($_GET['sql']) : null;
		
		if ($table == 'sql') {
			$data = $validate->getDB(null, null, $sql);
			$response = array(
				'result' => 'ok',
				'data' => $data
			);
		} else {
			if($table){
				unset($_GET['table']);
			}
			$params = $_GET;
			$data = $validate->get($table, $params);
			$response = array(
				'result' => 'ok',
				'data' => $data
			);
		}
		Response::result(200, $response); 

		break;

	case 'POST':
		
		$params = json_decode(file_get_contents('php://input'), true);
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		$action = isset($_GET['accion']) ? $_GET['accion'] : null;
		
			if($table){
				unset($_GET['table']);
			}
			if(!isset($params)){
				$response = array(
					'result' => 'error',
					'details' => 'Error en la solicitud'
				);
	
				Response::result(400, $response);
				exit;
			}
	
			if(isset($action) && $action == 'login'){
				$response = array(
					'result' => 'ok',
					'user' => $params
				);
				$data = $validate->get('access', $params);
			}
			elseif(isset($action) && $action == 'signup'){
				$params['Password'] = password_hash($params['Password'], PASSWORD_DEFAULT);
				try {
					$insert_id = $validate->insert($table, $params);
					$response = array(
						'result' => 'ok',
						'insert_id' => $insert_id
					);
				} catch (\Throwable $th) {
					$response = array(
						'result' => 'error',
						'Error' => 'No se ha podido insertar el usuario'
					);
				}
			}
			else{
				$insert_id = $validate->insert($table, $params);
	
				$response = array(
					'result' => 'ok',
					'insert_id' => $insert_id
				);
			}
		
		Response::result(201, $response);


		break;
	
	case 'PUT':

		$data = json_decode(file_get_contents('php://input'), true);
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		if($table){
			unset($_GET['table']);
		}
		$params = $_GET;
		$affectedRows =  $validate->update($table, $params, $data);
		$response = array(
			'result' => 'ok',
			'filas afectadas' => $affectedRows
		);
		Response::result(200, $response);
		
		break;

	case 'DELETE': 

		$table = isset($_GET['table']) ? $_GET['table'] : null;
		if($table){
			unset($_GET['table']);
		}
		$params = $_GET;
		
		$validate->delete($table, $params);
		$response = array(
			'result' => 'ok'
		);
		Response::result(200, $response);
		break;

	default:
		$response = array(
			'result' => 'error'
		);
		Response::result(404, $response);

		break;
}
?>
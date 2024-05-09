<?php
require_once 'Response.php';
require_once 'Validate.php';

$validate = new validate();

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		if($table){
			unset($_GET['table']);
		}
		$params = $_GET;
		$data = $validate->get($table, $params);
		$response = array(
			'result' => 'ok',
			'data' => $data
		);

		Response::result(200, $response); 

		break;

	case 'POST':
		
		$params = json_decode(file_get_contents('php://input'), true);
		$table = isset($_GET['table']) ? $_GET['table'] : null;
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

		$insert_id = $validate->insert($table, $params);

		$response = array(
			'result' => 'ok',
			'insert_id' => $insert_id
		);

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
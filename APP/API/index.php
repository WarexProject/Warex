<?php
//Importamos la clase Response y la clase User
require_once 'Response.php';
require_once 'Validate.php';

//Creamos el objeto de la clase User para manejar el endpoint
$validate = new validate();

//Comprobamos de qué tipo es la petición al endpoint
switch ($_SERVER['REQUEST_METHOD']) {
	//Método get

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

		Response::result(200, $response); //devolvemos la respuesta a la petición correcta

		break;
	//Método post

	case 'POST':
		
		$params = json_decode(file_get_contents('php://input'), true);

		//si no recibimos parámtros...
		if(!isset($params)){
			//creamos el array de error y devolvemos la respuesta
			$response = array(
				'result' => 'error',
				'details' => 'Error en la solicitud'
			);

			Response::result(400, $response);
			exit;
		}

		//realizamos la inserción en BD de la petición
		$insert_id = $validate->insert($params);

		//creamos el array de ok y devolvemos la respuesta junto al nuevo id
		$response = array(
			'result' => 'ok',
			'insert_id' => $insert_id
		);

		Response::result(201, $response);


		break;
	//Método put
	
	case 'PUT':

		$params = json_decode(file_get_contents('php://input'), true);

		//Si no recibimos parámetros, no recibimos el parámetro id o id está vacío
		if(!isset($params) || !isset($_GET['id']) || empty($_GET['id'])){
			//creamos el array de error 
			$response = array(
				'result' => 'error',
				'details' => 'Error en la solicitud'
			);
			//y lo devolvemos como respuesta
			Response::result(400, $response);
			exit;
		}
		//si recibimos el parámtro id y es correcto, realizamos la actualización
		$validate->update($_GET['id'], $params);
		//creamos el array de respuesta correcta
		$response = array(
			'result' => 'ok'
		);
		//y devolvemos
		Response::result(200, $response);
		
		break;
	//Método delete
	case 'DELETE':

		$table = isset($_GET['table']) ? $_GET['table'] : null;
		if($table){
			unset($_GET['table']);
		}
		$params = $_GET;
		
		$validate->delete($table, $params);
		//creamos el array de respuesta correcta
		$response = array(
			'result' => 'ok'
		);
		//devolvemos la respuesta
		Response::result(200, $response);
		break;
	//Si recibimos cualquier otro método diferente a get, post, put o delete...	
	default:
		//creamos el array de error
		$response = array(
			'result' => 'error'
		);
		//devolvemos la respuesta
		Response::result(404, $response);

		break;
}
?>
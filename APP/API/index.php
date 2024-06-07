<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Manejar las solicitudes preflight (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	http_response_code(200);
	exit();
}

require_once 'Response.php';
require_once 'Validate.php';
require_once 'Auth.php';

$validate = new validate();
$auth = new Auth();

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		$sql = isset($_GET['sql']) ? urldecode($_GET['sql']) : null;
		$action = isset($_GET['accion']) ? $_GET['accion'] : null;

		if ($action == 'token') {

			$userToken = $auth->getBearerToken();
			if ($userToken) {
				$tokenValidated = $auth->validateToken($userToken);
				$userValidated = $validate->get('access', ["DNI" => $tokenValidated['sub']]);
				$response = array(
					'result' => 'ok',
					'data' => $userValidated[0]
				);
			} else {
				$response = array(
					'result' => 'Error',
					'details' => 'Token no encontrado'
				);
			}
		} else {
			if ($table == 'sql') {
				$data = $validate->getDB(null, null, $sql);
				$response = array(
					'result' => 'ok',
					'data' => $data
				);
			} else {
				if ($table) {
					unset($_GET['table']);
				}
				$params = $_GET;
				$data = $validate->get($table, $params);
				$response = array(
					'result' => 'ok',
					'data' => $data
				);
			}
		}
		Response::result(200, $response);

		break;

	case 'POST':

		$obParams = json_decode(file_get_contents('php://input'), true);
		$table = isset($_GET['table']) ? $_GET['table'] : null;
		$action = isset($_GET['accion']) ? $_GET['accion'] : null;

		if ($table) {
			unset($_GET['table']);
		}
		if (!isset($obParams)) {
			$response = array(
				'result' => 'error',
				'details' => 'Error en la solicitud'
			);

			Response::result(400, $response);
			exit;
		}

		if (isset($action) && $action == 'login') {
			try {
				$user = $validate->get('access', ['DNI' => $obParams['DNI']]);
				if ($user && password_verify($obParams['password'], $user[0]['Password'])) {
					$token = $auth->generateToken($user[0]['DNI']);
					$response = array(
						'result' => 'ok',
						'data' => $user[0],
						'token' => $token
					);
				} else {
					$response = array(
						'result' => 'error',
						'message' => 'Credenciales incorrectas'
					);
				}
			} catch (Throwable $th) {
				$response = array(
					'result' => 'error',
					'message' => 'No se ha podido procesar la solicitud'
				);
			}
		} elseif (isset($action) && $action == 'signup') {
			$obParams['Password'] = password_hash($obParams['Password'], PASSWORD_DEFAULT);
			try {
				$insert_id = $validate->insert($table, $obParams);
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
		} else {
			$insert_id = $validate->insert($table, $obParams);

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
		$action = isset($_GET['accion']) ? $_GET['accion'] : null;

		if ($table) {
			unset($_GET['table']);
		}
		if ($action && $action == 'changePasswd') {
			if (isset($data['Password'])) {
				$data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);
			} else {
				$response = array(
					'result' => 'error',
					'details' => 'Password no proporcionada'
				);
				Response::result(400, $response);
				exit();
			}
			unset($_GET['accion']);
		}

		$params = $_GET;
		$affectedRows = $validate->update($table, $params, $data);
		$response = array(
			'result' => 'ok',
			'filas afectadas' => $affectedRows
		);
		Response::result(200, $response);

		break;

	case 'DELETE':

		$table = isset($_GET['table']) ? $_GET['table'] : null;
		if ($table) {
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

<?php
/**
 * Clase Response: se encarga de crear la respuesta json a la petición del endpoint
 */
class Response
{
	/**
	 * Método result: transforma el array de la respuesta en un json que se
	 * devuelve al cliente como resultado de su petición
	 *
	 * @param int $code El código de la respuesta
	 * @param array $response El array de datos que vamos a convertir a json
	 * @return void
	 */
	public static function result($code, $response){

		header('Content-type: application/json');
		http_response_code($code);

		echo json_encode($response);
	}
}

?>
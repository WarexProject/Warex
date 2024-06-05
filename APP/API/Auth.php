<?php
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Auth {
    private $secretKey = 'WarexProject_Key';
    private $algorithm = 'HS256';
    private $issuer = 'http://localhost/API';
    
    public function generateToken($DNI) {
        $issuedAt = time();
        $expirationTime = $issuedAt + (60 * 60); // Expiración del token (1 hora)
        $payload = array(
            'iss' => $this->issuer,
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $DNI
        );
        return JWT::encode($payload, $this->secretKey, $this->algorithm);
    }

    public function validateToken($token) {
        try {
            $decoded = JWT::decode($token, new Key($this->secretKey, $this->algorithm));
            return (array) $decoded;
        } catch (Exception $e) {
            return null;
        }
    }

public function getAuthorizationHeader() {
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER['Authorization']);
    } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { 
        $headers = trim($_SERVER['HTTP_AUTHORIZATION']);
    } else if (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        $requestHeaders = array_combine(array_map('strtolower', array_keys($requestHeaders)), array_values($requestHeaders));
        if (isset($requestHeaders['authorization'])) {
            $headers = trim($requestHeaders['authorization']);
        }
    }
    return $headers;
}

// Función para obtener el token del encabezado de autorización
public function getBearerToken() {
    $headers = $this->getAuthorizationHeader();
    // Extraer el token del encabezado
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1] != 'null' ? $matches[1] : null ;
        }
    }
    return null;
}


    public function login($username, $password) {
        // Validar el usuario y la contraseña con la base de datos
        // Supongamos que el usuario es válido y tiene un ID de 1
        $userId = 1;

        $token = $this->generateToken($userId);

        return [
            'token' => $token,
            'user' => [
                'id' => $userId,
                'username' => $username,
            ]
        ];
    }

    public function getUserFromToken($token) {
        $payload = $this->validateToken($token);

        if ($payload) {
            $userId = $payload['sub'];
            // Obtener los datos del usuario desde tu base de datos usando el $userId
            return [
                'id' => $userId,
                'username' => 'user_example', 
            ];
        }

        return null;
    }
}
?>

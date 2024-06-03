<?php
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;

class Auth {
    private $secretKey = 'WarexProject_Key';
    private $algorithm = 'HS256';
    private $issuer = 'http://localhost/API';
    
    public function generateToken($userId) {
        $issuedAt = time();
        $expirationTime = $issuedAt + (60 * 60); // Expiración del token (1 hora)
        $payload = array(
            'iss' => $this->issuer,
            'iat' => $issuedAt,
            'exp' => $expirationTime,
            'sub' => $userId
        );
        return JWT::encode($payload, $this->secretKey, $this->algorithm);
    }

    public function validateToken($token) {
        try {
            $decoded = JWT::decode($token, $this->secretKey, array($this->algorithm));
            return (array) $decoded;
        } catch (Exception $e) {
            return null;
        }
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

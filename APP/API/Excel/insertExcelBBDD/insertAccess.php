<?php
// Importaciones necesarias
include_once "./connection/conexion.php";
include_once "./fieldChechs/verifyAccessFields.php";

/**
 * Inserta datos de empresas en la base de datos.
 * 
 * Esta función recibe un array de datos de empresas, donde cada elemento del array
 * debe ser un array asociativo con claves 'nif' y 'companyName'.
 * Luego, inserta estos datos en la tabla 'COMPANIES' de la base de datos.
 *
 * @param array $ArDatos Un array de datos de empresas.
 * @return void
 * @throws Exception Si alguno de los campos de NIF o Nombre de la Empresa está vacío en alguna fila.
 */
function insertarDatosACCESS ($ArDatos) {
    // Insertar datos en la base de datos
    $inserto = false;
    $inserto2 = false;
    $values = [];
    $values2 = [];
    $mysqli = conexionBBDD();
    foreach ($ArDatos as $row) {
        $DNI = $row['DNI'];
        $name = $row['name'];
        $userName = $row['userName'];
        $companyID = $row['companyID'];
        $password = $row['password'];
        $lastName = $row['lastName'];
        // Verificar si $nif y $companyName no están vacíos
        if (empty($DNI) || empty($name) || empty($userName) || empty($companyID) || empty($password)) {
            throw new Exception("Los datos vienen vacíos o incorrectos.");
        }
        // Verificar validez de NIF y nombre de la empresa
        if (!verificarCompanyID($companyID) || !verificarCompanyID($DNI) || !verificarName($name) || !verificarName($userName)) {
            throw new Exception("Los datos vienen incorrectos.");
        }
        // Escapar los valores para evitar SQL injection
        $DNI = $mysqli->real_escape_string($DNI);
        $name = $mysqli->real_escape_string($name);
        $userName = $mysqli->real_escape_string($userName);
        $companyID = $mysqli->real_escape_string($companyID);
        $password = $mysqli->real_escape_string($password);
        $contrasenaHaseada = password_hash($password,PASSWORD_BCRYPT);
        if (empty($lastName)) {
            $values[] = "('$DNI', '$name', '$userName', '$companyID', '$contrasenaHaseada')";
            $inserto = true;
        } else if (!empty($lastName)) {
            if (!verificarLastName($lastName)) {
                throw new Exception("Los datos vienen incorrectos.");
            } else {
                $values2[] = "('$DNI', '$name', '$userName', '$companyID', '$contrasenaHaseada', '$lastName')";
                $inserto2 = true;
            }
        }
    }
    if ($inserto) {
        $sql = "INSERT INTO ACCESS (`DNI`, `Name`, `UserName`, `CompanyID`, `Password`) VALUES " . implode(", ", $values);
        $mysqli->query($sql);
        echo "Carga completada";
    }

    if ($inserto2) {
        $sql = "INSERT INTO ACCESS (`DNI`, `Name`, `UserName`, `CompanyID`, `Password`, `LastName`) VALUES " . implode(", ", $values2);
        $mysqli->query($sql);
        echo "Carga completada";
    }
}
?>
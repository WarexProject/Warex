<?php
// Importaciones necesarias
include_once "./connection/conexion.php";
include_once "./fieldChechs/verifyCompaniesFields.php";

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
function insertarDatosCOMPANIES ($ArDatos) {
    // Insertar datos en la base de datos
    $inserto = false;
    $mysqli = conexionBBDD();
    foreach ($ArDatos as $row) {
        $nif = $row['nif'];
        $companyName = $row['companyName'];
        // Verificar si $nif y $companyName no están vacíos
        if (empty($nif) || empty($companyName)) {
            throw new Exception("Los datos vienen vacíos o incorrectos.");
        }
        // Verificar validez de NIF y nombre de la empresa
        if (!verificarNIF($nif) || !verificarCompanyName($companyName)) {
            throw new Exception("Los datos vienen incorrectos.");
        }
        // Escapar los valores para evitar SQL injection
        $nif = $mysqli->real_escape_string($nif);
        $companyName = $mysqli->real_escape_string($companyName);
        // Agregar los valores a la lista para la inserción
        $values[] = "('$nif', '$companyName')";
        $inserto = true;
    }
    if ($inserto) {
        $sql = "INSERT INTO COMPANIES (nif, companyName) VALUES " . implode(", ", $values);
        $mysqli->query($sql);
        echo "Carga completada";
    } else {
        throw new Exception ("No se ha insertado nada porque no viene datos o son incorrectos");
    }
}
?>
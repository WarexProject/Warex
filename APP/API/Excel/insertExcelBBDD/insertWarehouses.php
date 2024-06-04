<?php
// Importaciones necesarias
include_once "./connection/conexion.php";
include_once "./fieldChechs/verifyWareHousesFields.php";

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
function insertarDatosWAREHOUSES($ArDatos)
{
    // Insertar datos en la base de datos
    $inserto = false;
    $mysqli = conexionBBDD();
    foreach ($ArDatos as $row) {
        $companyID = $row['companyID'];
        $totalProductQuantity = $row['totalProductQuantity'];
        $refrigeratingChamber = $row['refrigeratingChamber'];
        // Verificar validez de NIF y nombre de la empresa
        if (!verificarCompanyID($companyID) || !verificarTotalProductQuantity($totalProductQuantity) || !verificarRefrigeratingChamber($refrigeratingChamber)) {
            throw new Exception("Los datos vienen incorrectos.");
        }
        // Escapar los valores para evitar SQL injection
        $companyID = $mysqli->real_escape_string($companyID);
        $totalProductQuantity = $mysqli->real_escape_string($totalProductQuantity);
        $refrigeratingChamber = $mysqli->real_escape_string($refrigeratingChamber);
        // Agregar los valores a la lista para la inserción
        $values[] = "('$companyID', $totalProductQuantity, $refrigeratingChamber)";
        $inserto = true;
    }
    if ($inserto) {
        $sql = "INSERT INTO WAREHOUSES (CompanyID, TotalProductQuantity, RefrigeratingChamber) VALUES " . implode(", ", $values);
        $mysqli->query($sql);
    } else {
        throw new Exception("No se ha insertado nada porque no viene datos o son incorrectos");
    }
}

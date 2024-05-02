<?php
// Importaciones necesarias
include_once "./connection/conexion.php";
include_once "./fieldChechs/verifySectionShelfFields.php";

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
function insertarDatosSECTION ($ArDatos, $almacenID) {
    // Insertar datos en la base de datos
    if (!is_numeric($almacenID)) {
        throw new Exception("El almacen selecionado no existe.");
    }
    $values = [];
    $mysqli = conexionBBDD();
    foreach ($ArDatos as $row) {
        $sectionName = $row['sectionName'];
        // Verificar si $nif y $companyName no están vacíos
        if (empty($sectionName)) {
            throw new Exception("Los datos vienen vacíos o incorrectos.");
        }
        // Verificar validez de NIF y nombre de la empresa
        if (!verificarName($sectionName)) {
            throw new Exception("Los datos vienen incorrectos.");
        }
        // Escapar los valores para evitar SQL injection
        $sectionName = $mysqli->real_escape_string($sectionName);
        $values[] = "($almacenID, '$sectionName')";
    }
    $sql = "INSERT INTO SECTION (`WarehouseID`, `SectionName`) VALUES " . implode(", ", $values);
    $mysqli->query($sql);
    echo "Carga completada";
}
?>
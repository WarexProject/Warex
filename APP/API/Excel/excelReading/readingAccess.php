<?php
// Importación de las librerias necesarias
include_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Almacena los datos de un archivo Excel en un array asociativo.
 *
 * Esta función carga un archivo Excel y extrae los datos de la primera hoja.
 * Luego, almacena los valores de las columnas ID, ID compañia, total de almacenaje y si es camara frigorífica en un array asociativo.
 * 
 * @param string $documentoExcel La ruta al archivo Excel a procesar.
 * @return array Un array asociativo que contiene los datos del almacen.
 * @throws Exception Si alguno de los campos está vacío en alguna fila.
 */
function almacenarDatosAccessExcel($documenntoExcel) {
    $documento = IOFactory::load($documenntoExcel);
    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();
    $data = []; // Array para almacenar los datos
    for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) { // 2 para no incluir la cabecera
        $DNI = $hojaActual->getCell(Coordinate::stringFromColumnIndex(1) . $indiceFila)->getValue();
        $name = $hojaActual->getCell(Coordinate::stringFromColumnIndex(2) . $indiceFila)->getValue();
        $userName = $hojaActual->getCell(Coordinate::stringFromColumnIndex(3) . $indiceFila)->getValue();
        $companyID = $hojaActual->getCell(Coordinate::stringFromColumnIndex(4) . $indiceFila)->getValue();
        $password = $hojaActual->getCell(Coordinate::stringFromColumnIndex(5) . $indiceFila)->getValue();
        $lastName = $hojaActual->getCell(Coordinate::stringFromColumnIndex(6) . $indiceFila)->getValue();
        // Verificar si los campos no están vacíos
        if (!empty($DNI) && !empty($name) && !empty($userName) && !empty($companyID) && !empty($password)) {
            // Agregar datos al array
            $data[] = [
                'DNI' => $DNI,
                'name' => $name,
                'userName' => $userName,
                'companyID' => $companyID,
                'password' => $password,
                'lastName' => $lastName
            ];
        } else {
            throw new Exception("Los datos viene vacios o incorrectos");
        }
    }
    return $data;
}
?>
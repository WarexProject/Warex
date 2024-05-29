<?php
// Importación de las librerias necesarias
include_once "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Almacena los datos de un archivo Excel en un array asociativo.
 *
 * Esta función carga un archivo Excel y extrae los datos de la primera hoja.
 * Luego, almacena los valores de las columnas NIF y Nombre de la Empresa en un array asociativo.
 * 
 * @param string $documentoExcel La ruta al archivo Excel a procesar.
 * @return array Un array asociativo que contiene los datos de NIF y Nombre de la Empresa.
 * @throws Exception Si alguno de los campos de NIF o Nombre de la Empresa está vacío en alguna fila.
 */
function almacenarDatosCompaniesExcel($documenntoExcel) {
    $documento = IOFactory::load($documenntoExcel);
    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();
    $data = []; // Array para almacenar los datos
    for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) { // 2 para no incluir la cabecera
        $nif = $hojaActual->getCell(Coordinate::stringFromColumnIndex(1) . $indiceFila)->getValue();
        $companyName = $hojaActual->getCell(Coordinate::stringFromColumnIndex(2) . $indiceFila)->getValue();
        // Agregar datos al array
        $data[] = [
            'nif' => $nif,
            'companyName' => $companyName
        ];
    }
    return $data;
}
?>
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
function almacenarDatosProductsExcel($documenntoExcel) {
    $documento = IOFactory::load($documenntoExcel);
    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();
    $data = []; // Array para almacenar los datos
    for ($indiceFila = 2; $indiceFila <= $numeroFilas; $indiceFila++) { // 2 para no incluir la cabecera
        $companyID = $hojaActual->getCell(Coordinate::stringFromColumnIndex(1) . $indiceFila)->getValue();
        $productName = $hojaActual->getCell(Coordinate::stringFromColumnIndex(2) . $indiceFila)->getValue();
        $totalProductQuantity = $hojaActual->getCell(Coordinate::stringFromColumnIndex(3) . $indiceFila)->getValue();
        $description = $hojaActual->getCell(Coordinate::stringFromColumnIndex(4) . $indiceFila)->getValue();
        $unitPrice = $hojaActual->getCell(Coordinate::stringFromColumnIndex(5) . $indiceFila)->getValue();
        $expiryDate = $hojaActual->getCell(Coordinate::stringFromColumnIndex(6) . $indiceFila)->getValue();
        // Agregar datos al array
        $data[] = [
            'companyID' => $companyID,
            'productName' => $productName,
            'totalProductQuantity' => $totalProductQuantity,
            'description' => $description,
            'unitPrice' => $unitPrice,
            'expiryDate' => $expiryDate
        ];
    }
    return $data;
}
?>
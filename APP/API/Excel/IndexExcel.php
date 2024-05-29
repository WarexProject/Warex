<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permitir los métodos necesarios
header("Access-Control-Allow-Methods: POST, OPTIONS");
// Permitir los encabezados necesarios
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Manejar la solicitud OPTIONS (preflight request)
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

/*  */

// Establecer el nivel de error_reporting sin mostrar las advertencias Deprecated
error_reporting(error_reporting() & ~E_DEPRECATED);

if (isset($_FILES["archivo"]) && !empty($_FILES["archivo"]["name"])) {
    try {
        $nombreTabla = $_FILES["archivo"]["name"];
        switch ($nombreTabla) {
            case "warehouses.xlsx":
                include_once 'excelReading/readingWarehouses.php';
                include_once 'insertExcelBBDD/insertWarehouses.php';
                $data = almacenarDatosWarehousesExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosWAREHOUSES($data);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            case "products.xlsx":
                include_once 'excelReading/readingProducts.php';
                include_once 'insertExcelBBDD/insertProducts.php';
                $data = almacenarDatosProductsExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosPRODUCTS($data);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            case "section.xlsx":
                include_once 'excelReading/readingSection.php';
                include_once 'insertExcelBBDD/insertSection.php';
                $data = almacenarDatosSectionExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosSECTION($data, 12);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            case "shelf.xlsx":
                include_once 'excelReading/readingShelf.php';
                include_once 'insertExcelBBDD/insertShelf.php';
                $data = almacenarDatosShelfExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosSHELF($data, 12);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            case "companies.xlsx":
                include_once 'excelReading/readingCompanies.php';
                include_once 'insertExcelBBDD/insertCompanies.php';
                $data = almacenarDatosCompaniesExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosCOMPANIES($data);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            case "access.xlsx":
                include_once 'excelReading/readingAccess.php';
                include_once 'insertExcelBBDD/insertAccess.php';
                $data = almacenarDatosAccessExcel($_FILES["archivo"]["tmp_name"]);
                insertarDatosACCESS($data);
                echo json_encode(["status" => "success", "message" => "File processed successfully."]);
                break;
            default:
                echo json_encode(["status" => "error", "message" => "La tabla elegida no existe."]);
                break;
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No file uploaded or file name is empty."]);
}

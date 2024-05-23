<?php
/* 
// COMPANIES
include_once 'excelReading/readingCompanies.php';
include_once 'insertExcelBBDD/insertCompanies.php';
 */
/* 
// WAREHOUSES
include_once 'excelReading/readingWarehouses.php';
include_once 'insertExcelBBDD/insertWarehouses.php';
 */
/* 
// ACCESS
include_once 'excelReading/readingAccess.php';
include_once 'insertExcelBBDD/insertAccess.php';
 */
/* 
// PRODUCTS
include_once 'excelReading/readingProducts.php';
include_once 'insertExcelBBDD/insertProducts.php';
 */
/* 
// SECTION
include_once 'excelReading/readingSection.php';
include_once 'insertExcelBBDD/insertSection.php';
 */
/* 
// SHELF
include_once 'excelReading/readingShelf.php';
include_once 'insertExcelBBDD/insertShelf.php';
 */
// Establecer el nivel de error_reporting sin mostrar las advertencias Deprecated
error_reporting(error_reporting() & ~E_DEPRECATED);
if (isset($_POST["enviar"])) {
    if (isset($_FILES["archivo"]) && !empty($_FILES["archivo"]["name"])) {
        try {
            /* 
            // COMPANIES
            $data = almacenarDatosExcel($_FILES["archivo"]["name"]);
            insertarDatosCOMPANIES($data);
            */
            /* 
            // WAREHOUSES
            $data = almacenarDatosWarehousesExcel($_FILES["archivo"]["name"]);
            insertarDatosWAREHOUSES($data);
            */
            /* 
            // ACCESS
            $data = almacenarDatosAccessExcel($_FILES["archivo"]["name"]);
            insertarDatosACCESS($data);
            */
            /* 
            // PRODUCTS
            $data = almacenarDatosProductsExcel($_FILES["archivo"]["name"]);
            insertarDatosPRODUCTS($data);
            */
            /*
            // SECTION
            $almacenID = 1;
            $data = almacenarDatosSectionExcel($_FILES["archivo"]["name"]);
            insertarDatosSECTION($data, $almacenID);
            */
            /* 
            // SHELF
            $sectionID = 1;
            $data = almacenarDatosShelfExcel($_FILES["archivo"]["name"]);
            insertarDatosSHELF($data, $sectionID);
            */
        } catch (Exception $e) {
            echo $e->getMessage();
            ?> <script>alert("ERROR. Los datos introducidos son incorrectos, por favor reviselo")</script> <?php
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <h1>Formulario dos con funciones</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="archivo">Seleccione un archivo:</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>
        <input type="submit" value="Subir archivo" name="enviar">
    </form>
</body>

</html>
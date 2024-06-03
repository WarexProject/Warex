<?php
// Importaciones necesarias
include_once "./connection/conexion.php";
include_once "./fieldChechs/verifyProductsFields.php";

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
function insertarDatosPRODUCTS ($ArDatos) {
    // Insertar datos en la base de datos
    $inserto = false; 
    $values = []; 
    $mysqli = conexionBBDD();
    foreach ($ArDatos as $row) {
        $companyID = $row['companyID'];
        $productName = $row['productName'];
        $totalProductQuantity = $row['totalProductQuantity'];
        $unitPrice = $row['unitPrice'];
        $description = $row['description'];
        $expiryDate = $row['expiryDate'];
        // Verificar si $nif y $companyName no están vacíos
        if (empty($companyID) || empty($productName) || $totalProductQuantity < 0  || empty($unitPrice)) {
            throw new Exception("Los datos vienen vacíos o incorrectos.");
        }
        // Verificar validez de NIF y nombre de la empresa
        if (!verificarCompanyID($companyID) || !verificarProductName($productName) || !verificarTotalProductQuantity($totalProductQuantity) || !verificarUnitPrice($unitPrice)) {
            throw new Exception("Los datos vienen incorrectos.");
        }
        // Escapar los valores para evitar SQL injection
        $companyID = $mysqli->real_escape_string($companyID);
        $productName = $mysqli->real_escape_string($productName);
        $totalProductQuantity = $mysqli->real_escape_string($totalProductQuantity);
        $description = $mysqli->real_escape_string($description);
        $expiryDate = $mysqli->real_escape_string($expiryDate);
        if (!empty($description) && !empty($expiryDate)) {
            if (!verificarDescription($description) || !verificarFormatoFecha($expiryDate)) {
                throw new Exception("Los datos vienen incorrectos.");
            }
            $values[] = "('$companyID', '$productName', '$totalProductQuantity', '$unitPrice', '$description', '$expiryDate')";
            $inserto = true;
        } else if (empty($expiryDate) && !empty($description)) {
            if (!verificarDescription($description)) {
                throw new Exception("Los datos vienen incorrectos.");
            }
            $values[] = "('$companyID', '$productName', '$totalProductQuantity', '$unitPrice', '$description', NULL)";
            $inserto = true;
        } else if (!empty($expiryDate) && empty($description)) {
            if (!verificarFormatoFecha($expiryDate)) {
                throw new Exception("Los datos vienen incorrectos.");
            }
            $values[] = "('$companyID', '$productName', '$totalProductQuantity', '$unitPrice', NULL, '$expiryDate')";
            $inserto = true;
        } else if (empty($expiryDate) && empty($description)) {
            $values[] = "('$companyID', '$productName', '$totalProductQuantity', '$unitPrice', NULL, NULL)";
            $inserto = true;
        }
    }
    if ($inserto) {
        $sql = "INSERT INTO PRODUCTS (`CompanyID`, `ProductName`, `TotalProductQuantity`, `UnitPrice`, `Description`, `ExpiryDate`) VALUES " . implode(", ", $values);
        $mysqli->query($sql);
        echo "Carga completada";
    }
}
?>
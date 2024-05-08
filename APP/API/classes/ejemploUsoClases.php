<?php

// Ejemplos de uso:

// Instancia de Access
$access = new Access("12345678A", "Nombre", "Apellido", "usuario123", 1, "contrasena");

// Cambiar los permisos
$access->setPermissions("ALL");

// Instancia de Company
$company = new Company("12345678B", "Mi Empresa");

// Instancia de Warehouse
$warehouse = new Warehouse(1, 1, 1000, true);

// Instancia de Product
$product = new Product(1, "Producto 1", 50, "Descripción del producto 1", 10.50, "2024-12-31");

// ejemplo uso del método toString 
echo $access . "\n";
echo $company . "\n";
echo $warehouse . "\n";
echo $product . "\n";

?>

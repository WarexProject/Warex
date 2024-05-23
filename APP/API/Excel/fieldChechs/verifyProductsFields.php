<?php
/**
 * Verifica si companyID cumple con los criterios especificados.
 *
 * @param string $nif El NIF a verificar.
 * @return bool true si el NIF cumple con los criterios, false de lo contrario.
 */
function verificarCompanyID($companyID) {
    // Verificar si el companyID tiene exactamente 9 caracteres
    if (strlen($companyID) !== 9) {
        return false;
    }
    // Verificar si solo hay una letra en el companyID
    $numLetras = preg_match_all('/[a-zA-Z]/', $companyID);
    if ($numLetras !== 1 || !preg_match('/^[a-zA-Z].*|[a-zA-Z]$/', $companyID)) {
        return false;
    }
    // Verificar si los caracteres son alfanuméricos
    if (!ctype_alnum($companyID)) {
        return false;
    }
    // Si se superan todas las verificaciones, el NIF es válido
    return true;
}

/**
 * Verifica si un número cumple con los criterios especificados.
 *
 * @param string $numero El número a verificar.
 * @return bool true si el número cumple con los criterios, false de lo contrario.
 */
function verificarTotalProductQuantity($numero) {
    if (is_float($numero)) {
        return false;
    }
    // Verificar si el valor es numérico y está dentro del rango deseado
    if ($numero < 0 || $numero > 99999999999) {
        return false;
    }
    // Si se superan todas las verificaciones, el número es válido
    return true;
}

function verificarFormatoFecha($cadena) {
    // Definir el patrón de expresión regular para el formato "aaaa/aa/aa"
    $patron = '/^\d{4}\/\d{2}\/\d{2}$/';
    // Usar la función preg_match para verificar si el string coincide con el patrón
    if (preg_match($patron, $cadena)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Verifica si el nombre de la empresa cumple con los criterios especificados.
 *
 * @param string $companyName El nombre de la empresa a verificar.
 * @return bool true si el nombre de la empresa cumple con los criterios, false de lo contrario.
 */
function verificarProductName($productName) {
    // Verificar la longitud máxima
    if (strlen($productName) > 150) {
        return false;
    }
    // Si se superan todas las verificaciones, el nombre de la empresa es válido
    return true;
}

/**
 * Verifica si el nombre de la empresa cumple con los criterios especificados.
 *
 * @param string $companyName El nombre de la empresa a verificar.
 * @return bool true si el nombre de la empresa cumple con los criterios, false de lo contrario.
 */
function verificarDescription($description) {
    // Verificar la longitud máxima
    if (strlen($description) > 254) {
        return false;
    }
    // Si se superan todas las verificaciones, el nombre de la empresa es válido
    return true;
}

/**
 * Verifica si un número cumple con los criterios especificados.
 *
 * @param string $numero El número a verificar.
 * @return bool true si el número cumple con los criterios, false de lo contrario.
 */
function verificarUnitPrice($numero) {
    if (!is_numeric($numero)) {
        return false;
    }
    // Verificar si el valor es numérico y está dentro del rango deseado
    if ($numero < 0 || $numero > 99999999999) {
        return false;
    }
    // Si se superan todas las verificaciones, el número es válido
    return true;
}

?>
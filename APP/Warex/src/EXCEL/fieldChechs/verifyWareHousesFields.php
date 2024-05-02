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

/**
 * Verifica si el esFrigorifico representa un booleano.
 *
 * @param string $esFrigorifico El valor a verificar.
 * @return bool true si el valor representa un booleano, false de lo contrario.
 */
function verificarRefrigeratingChamber($esFrigorifico) {
    if (strcasecmp($esFrigorifico, "true") === 0 || strcasecmp($esFrigorifico, "false") === 0) {
        return true;
    }
    return false;
}
?>
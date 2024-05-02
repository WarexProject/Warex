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
 * Verifica si el nombre de la empresa cumple con los criterios especificados.
 *
 * @param string $companyName El nombre de la empresa a verificar.
 * @return bool true si el nombre de la empresa cumple con los criterios, false de lo contrario.
 */
function verificarName($companyName) {
    // Verificar la longitud máxima
    if (strlen($companyName) > 50) {
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
function verificarLastName($companyName) {
    // Verificar la longitud máxima
    if (strlen($companyName) > 80) {
        return false;
    }
    // Si se superan todas las verificaciones, el nombre de la empresa es válido
    return true;
}
?>
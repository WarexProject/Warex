<?php
/**
 * Verifica si un NIF cumple con los criterios especificados.
 *
 * @param string $nif El NIF a verificar.
 * @return bool true si el NIF cumple con los criterios, false de lo contrario.
 */
function verificarNIF($nif) {
    // Verificar si el NIF tiene exactamente 9 caracteres
    if (strlen($nif) !== 9) {
        return false;
    }
    // Verificar si solo hay una letra en el NIF
    $numLetras = preg_match_all('/[a-zA-Z]/', $nif);
    if ($numLetras !== 1 || !preg_match('/^[a-zA-Z].*|[a-zA-Z]$/', $nif)) {
        return false;
    }
    // Verificar si los caracteres son alfanuméricos
    if (!ctype_alnum($nif)) {
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
function verificarCompanyName($companyName) {
    // Verificar la longitud máxima
    if (strlen($companyName) > 250) {
        return false;
    }
    // Si se superan todas las verificaciones, el nombre de la empresa es válido
    return true;
}
?>
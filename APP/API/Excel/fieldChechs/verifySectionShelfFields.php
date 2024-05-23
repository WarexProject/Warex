<?php
/**
 * Verifica si el nombre de la empresa cumple con los criterios especificados.
 *
 * @param string $companyName El nombre de la empresa a verificar.
 * @return bool true si el nombre de la empresa cumple con los criterios, false de lo contrario.
 */
function verificarName($name) {
    // Verificar la longitud máxima
    if (strlen($name) > 254) {
        return false;
    }
    // Si se superan todas las verificaciones, el nombre es válido
    return true;
}
?>
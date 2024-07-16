<?php
defined('BASEPATH') OR exit('No direct script access allowed');

spl_autoload_register(function($class) {
    // Prefixo do namespace da biblioteca PhpSpreadsheet
    $prefixPhpSpreadsheet = 'PhpOffice\\PhpSpreadsheet\\';
    $baseDirPhpSpreadsheet = __DIR__ . '/src/PhpSpreadsheet/';

    // Mapeamento dos prefixos para os diretórios correspondentes
    $prefixes = [
        $prefixPhpSpreadsheet => $baseDirPhpSpreadsheet,
    ];

    // Itera sobre os prefixos registrados
    foreach ($prefixes as $prefix => $baseDir) {
        // Verifica se a classe pertence ao namespace atual
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue; // Passa para o próximo prefixo
        }

        // Obtém o nome relativo da classe
        $relativeClass = substr($class, $len);

        // Substitui os separadores de namespace por separadores de diretório
        $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

        // Se o arquivo da classe existir, inclui-o
        if (file_exists($file)) {
            require $file;
            return; // Classe carregada com sucesso, encerra a função
        }
    }
});
?>
<?php
// Para registrar las rutas dónde se encuentran las clases

spl_autoload_register(function ($class) {
    // Namespace base para las clases
    $prefix = 'Dwes\\ProyectoVideoclub\\app\\';
    $baseDir = __DIR__ . '/app/';

    // Verifica si la clase usa el prefijo esperado
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }


    $relativeClass = substr($class, $len);

    // Reemplaza los separadores de namespace con '/' y construye la ruta completa
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';


    if (file_exists($file)) {
        include_once $file;
    }
});

?>
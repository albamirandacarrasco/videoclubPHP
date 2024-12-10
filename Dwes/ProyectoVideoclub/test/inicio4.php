<?php
// Incluye las clases Cliente, Videoclub y otras necesarias
include_once '../autoload.php';

use Dwes\ProyectoVideoclub\app\Soporte;
use Dwes\ProyectoVideoclub\app\Cliente;
use Dwes\ProyectoVideoclub\app\Videoclub;
use Dwes\ProyectoVideoclub\app\Juego;
use Dwes\ProyectoVideoclub\app\CintaVideo;


// Crear un videoclub
$videoclub = new Videoclub("Blockbuster");



if ($videoclub !== null) {
    $videoclub->incluirCintaVideo("Cinta de Acción", 10.99, 120); 
    $videoclub->incluirDvd("DVD de Comedia", 15.99, "Español, Inglés", "16:9");
    $videoclub->incluirJuego("Juego de Aventura", 40.00, "PS5", 1, 4);
    $videoclub->incluirSocio("Alba M", 2);
    $videoclub->alquilaSocioProducto(1, 1);
    $videoclub->listarProductos();
    $videoclub->listarSocios();    

    } else {
            echo "Error: El objeto Videoclub no fue instanciado correctamente.";
    }
?>
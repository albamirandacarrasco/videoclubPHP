<?php
// Incluye las clases Cliente, Videoclub y otras necesarias
include_once '../autoload.php';

use Dwes\ProyectoVideoclub\app\Soporte;
use Dwes\ProyectoVideoclub\app\Cliente;
use Dwes\ProyectoVideoclub\app\Videoclub;

// Crear un videoclub
$videoclub = new Videoclub("Blockbuster");

// Agregar
$videoclub->incluirDvd("Pocahontas", 2.5, ["Español", "Inglés"], "16:9")
          ->incluirCintaVideo("Los Cazafantasmas", 1.8, 107)
          ->incluirJuego("The Last of Us", 4.5, "PS4", 1, 1);


$videoclub->incluirSocio("Alba M", 2)
          ->incluirSocio("Julia López");


$videoclub->alquilaSocioProducto(1, 1)
          ->alquilaSocioProducto(1, 2)
          ->alquilaSocioProducto(2, 3);


$videoclub->listarProductos();
$videoclub->listarSocios();
?>
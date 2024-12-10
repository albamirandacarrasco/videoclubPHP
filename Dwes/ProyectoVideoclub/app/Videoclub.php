<?php

namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\SoporteYaAlquilado;

class Videoclub {
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;
    private $numProductosAlquilados = 0; 
    private $numTotalAlquileres = 0;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $s) {
        $this->productos[] = $s;
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion) {
        $this->incluirProducto(new CintaVideo($titulo, $this->numProductos + 1, $precio, $duracion));
    }

    public function incluirDvd($titulo, $precio, $idiomas, $formatoPantalla) {
        $this->incluirProducto(new Dvd($titulo, $this->numProductos + 1, $precio, $idiomas, $formatoPantalla));
    }

    public function incluirJuego($titulo, $precio, $consola, $minJugadores, $maxJugadores) {
        $this->incluirProducto(new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJugadores, $maxJugadores));
    }

    public function incluirSocio($nombre, $maxAlquileres = 3) {
        $this->socios[] = new Cliente($nombre, $this->numSocios + 1, $maxAlquileres);
        $this->numSocios++;
    }

    public function alquilaSocioProducto($numSocio, $numProducto): self {
        if (!isset($this->socios[$numSocio - 1])) {
            throw new ClienteNoEncontradoException("Error: Socio con número $numSocio no encontrado.");
        }

        if (!isset($this->productos[$numProducto - 1])) {
            throw new SoporteNoEncontradoException("Error: Producto con número $numProducto no encontrado.");
        }

        $producto = $this->productos[$numProducto - 1];
        if ($producto->alquilado) {
            throw new SoporteYaAlquiladoException("Error: El producto ya está alquilado.");
        }

        $this->socios[$numSocio - 1]->alquilar($producto);
        $producto->alquilado = true;
        $this->numProductosAlquilados++;
        $this->numTotalAlquileres++;

        return $this;
    }

    public function devolverSocioProducto($numSocio, $numProducto): self {
        if (!isset($this->socios[$numSocio - 1])) {
            throw new ClienteNoEncontradoException("Error: Socio con número $numSocio no encontrado.");
        }

        $producto = $this->productos[$numProducto - 1] ?? null;
        if (!$producto || !$producto->alquilado) {
            throw new SoporteNoEncontradoException("Error: Producto con número $numProducto no está alquilado.");
        }

        $this->socios[$numSocio - 1]->devolver($numProducto);
        $producto->alquilado = false;
        $this->numProductosAlquilados--;

        return $this;
    }

    public function getNumProductosAlquilados(): int {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }

    public function listarProductos() {
        echo "<strong>Productos en el videoclub:</strong><br>";
        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
            echo "<br>";
        }
        echo "Total productos: $this->numProductos<br>";
    }

    public function listarSocios() {
        echo "<strong>Socios del videoclub:</strong><br>";
        foreach ($this->socios as $socio) {
            $socio->listaAlquileres();
            echo "<br>";
        }
        echo "Total socios: $this->numSocios<br>";
    }
}
?>

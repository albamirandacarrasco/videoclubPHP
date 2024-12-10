<?php
namespace Dwes\ProyectoVideoclub;

class Videoclub {
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

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
            echo "Error: Socio con número $numSocio no encontrado.<br>";
            return $this; // Permitir encadenamiento
        }
        if (!isset($this->productos[$numProducto - 1])) {
            echo "Error: Producto con número $numProducto no encontrado.<br>";
            return $this; 
        }
        $this->socios[$numSocio - 1]->alquilar($this->productos[$numProducto - 1]);
        return $this; 
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

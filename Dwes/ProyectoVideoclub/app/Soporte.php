<?php

namespace Dwes\ProyectoVideoclub\app;

//abstract class Soporte implements Resumible {
    class Soporte {
    public $titulo;
    public $precio;
    public $duracion;
    public $numero;
    public static $IVA = 21;
    public $alquilado = false;

    public function __construct($titulo, $numero, $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getPrecioConIVA() {
        return $this->precio * (1 + self::$IVA / 100);
    }

    public function getNumero() {
        return $this->numero; 
    }   

    public function muestraResumen() {
        echo "<strong>Título:</strong> $this->titulo<br>";
        echo "<strong>Número:</strong> $this->numero<br>";
        echo "<strong>Precio:</strong> " . $this->getPrecio() . " euros<br>";
        echo "<strong>Estado:</strong> " . ($this->alquilado ? "Alquilado" : "Disponible") . "<br>";
    }
}
?>

<?php
include_once "Soporte.php";

class Dvd extends Soporte {
    public $idiomas;
    public $formatoPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla) {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen() {
        parent::muestraResumen();
        echo "<strong>Idiomas:</strong> $this->idiomas<br>";
        echo "<strong>Formato de Pantalla:</strong> $this->formatoPantalla<br>";
    }
}
?>

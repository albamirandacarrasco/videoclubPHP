<?php
namespace Dwes\ProyectoVideoclub\app;

use Dwes\ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use Dwes\ProyectoVideoclub\Util\CupoSuperadoException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;

class Cliente {
    public $nombre;
    private $numero;
    private $numSoportesAlquilados = 0;
    private $soportesAlquilados = [];
	private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    public function tieneAlquilado(Soporte $s) {
        return in_array($s, $this->soportesAlquilados, true);
    }

    public function alquilar(Soporte $s) {
        if ($this->tieneAlquilado($s)) {
            throw new SoporteYaAlquiladoException("El soporte ya está alquilado.");
        }
        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("Se ha superado el cupo máximo de alquileres.");
        }
        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        return $this;
    }

    public function devolver($numSoporte) {
        foreach ($this->soportesAlquilados as $key => $soporte) {
            if ($soporte->numero == $numSoporte) {
                unset($this->soportesAlquilados[$key]);
                echo "Soporte devuelto: {$soporte->titulo}.<br>";
                return true;
            }
        }
        throw new SoporteNoEncontradoException("Error: El soporte con número $numSoporte no está alquilado.");
    }

    public function listaAlquileres() {
        echo "El cliente {$this->nombre} tiene los siguientes alquileres:<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            echo "- {$soporte->titulo}<br>";
        }
    }
}
?>

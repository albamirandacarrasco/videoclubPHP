<?php
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
            echo "Ya tienes alquilado este soporte.<br>";
            return false;
        }
        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "No puedes alquilar más soportes.<br>";
            return false;
        }
        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "Soporte alquilado: {$s->titulo}.<br>";
        return true;
    }

    public function devolver($numSoporte) {
        foreach ($this->soportesAlquilados as $key => $soporte) {
            if ($soporte->numero == $numSoporte) {
                unset($this->soportesAlquilados[$key]);
                echo "Soporte devuelto: {$soporte->titulo}.<br>";
                return true;
            }
        }
        echo "El soporte no está alquilado.<br>";
        return false;
    }

    public function listaAlquileres() {
        echo "El cliente {$this->nombre} tiene los siguientes alquileres:<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            echo "- {$soporte->titulo}<br>";
        }
    }
}
?>

<?php
require_once __DIR__ . '/Reserva.php';

// HERENCIA
class ReservaHospedaje extends Reserva {
    private $numeroPersonas;
    private $fechaInicio;
    private $fechaFin;

    public function __construct($nombreCliente, $dni, $precioPorNoche, $numeroPersonas, $fechaInicio, $fechaFin) {
        parent::__construct($nombreCliente, $dni, $precioPorNoche);
        $this->numeroPersonas = $numeroPersonas;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    // POLIMORFISMO
    public function calcularTotal() {
        $inicio = new DateTime($this->fechaInicio);
        $fin = new DateTime($this->fechaFin);
        $dias = $inicio->diff($fin)->days;
        
        if ($dias <= 0) {
            $dias = 1;
        }

        return $this->precioBase * $dias;
    }

    public function getNumeroPersonas() { return $this->numeroPersonas; }
    public function getFechaInicio() { return $this->fechaInicio; }
    public function getFechaFin() { return $this->fechaFin; }
}
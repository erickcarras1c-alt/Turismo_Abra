<?php
require_once __DIR__ . '/Reserva.php';

// HERENCIA
class ReservaEntrada extends Reserva {
    private $cantidadEntradas;

    public function __construct($nombreCliente, $dni, $precioEntrada, $cantidadEntradas) {
        parent::__construct($nombreCliente, $dni, $precioEntrada);
        $this->cantidadEntradas = $cantidadEntradas;
    }

    // POLIMORFISMO
    public function calcularTotal() {
        return $this->precioBase * $this->cantidadEntradas;
    }

    public function getCantidadEntradas() { return $this->cantidadEntradas; }
}
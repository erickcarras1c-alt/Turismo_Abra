<?php

// CLASE PADRE (Abstracción)
abstract class Reserva {
    // ENCAPSULAMIENTO
    protected $id;
    protected $nombreCliente;
    protected $dni;
    protected $precioBase;

    public function __construct($nombreCliente, $dni, $precioBase) {
        $this->id = 'REG-' . rand(1000, 9999);
        $this->nombreCliente = $nombreCliente;
        $this->dni = $dni;
        $this->precioBase = $precioBase;
    }

    // GETTERS Y SETTERS
    public function getId() { return $this->id; }
    public function getNombreCliente() { return $this->nombreCliente; }
    public function getDni() { return $this->dni; }
    public function getPrecioBase() { return $this->precioBase; }

    // POLIMORFISMO: Método abstracto
    abstract public function calcularTotal();
}
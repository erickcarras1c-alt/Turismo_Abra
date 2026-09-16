<?php

// CLASE PADRE ABSTRACTA
// No se puede instanciar directamente con 'new'. Sirve como plantilla base.
abstract class Reserva {

    // ENCAPSULAMIENTO
    // Atributos 'protected': Solo accesibles desde esta clase y sus clases hijas.
    protected $id;
    protected $nombreCliente;
    protected $dni;
    protected $precioBase;

    // CONSTRUCTOR
    // Inicializa los datos compartidos de cualquier reserva y genera un código único aleatorio.
    public function __construct($nombreCliente, $dni, $precioBase) {
        $this->id = 'REG-' . rand(1000, 9999);
        $this->nombreCliente = $nombreCliente;
        $this->dni = $dni;
        $this->precioBase = $precioBase;
    }

    // GETTERS (Lectura segura)
    // Permiten consultar los datos protegidos desde fuera sin modificarlos.
    public function getId() { return $this->id; }
    public function getNombreCliente() { return $this->nombreCliente; }
    public function getDni() { return $this->dni; }
    public function getPrecioBase() { return $this->precioBase; }

    // POLIMORFISMO (Método Abstracto)
    // Obliga a las clases hijas a implementar su propio método 'calcularTotal()'.
    abstract public function calcularTotal();
}
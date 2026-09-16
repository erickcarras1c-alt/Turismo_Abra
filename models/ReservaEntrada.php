<?php
// models/ReservaEntrada.php
require_once __DIR__ . '/Reserva.php';
require_once __DIR__ . '/../config/Conexion.php';

class ReservaEntrada extends Reserva {
    private $cantidadEntradas;

    public function __construct($nombreCliente, $dni, $precioEntrada, $cantidadEntradas = 1) {
        parent::__construct($nombreCliente, $dni, $precioEntrada);
        $this->cantidadEntradas = $cantidadEntradas;
    }

    public function getCantidadEntradas() {
        return $this->cantidadEntradas;
    }

    public function calcularTotal() {
        return $this->precioBase * $this->cantidadEntradas;
    }

    public function guardarEnBD() {
        $db = Conexion::getConexion();

        // 1. Verificar si el cliente ya existe, o registrarlo
        $stmt = $db->prepare("SELECT id FROM clientes WHERE dni = ?");
        $stmt->execute([$this->dni]);
        $cliente = $stmt->fetch();

        if ($cliente) {
            $clienteId = $cliente['id'];
        } else {
            $stmt = $db->prepare("INSERT INTO clientes (nombre, dni) VALUES (?, ?)");
            $stmt->execute([$this->nombreCliente, $this->dni]);
            $clienteId = $db->lastInsertId();
        }

        // 2. Registrar Venta de Entrada
        $sql = "INSERT INTO ventas_entradas 
                (codigo_ticket, cliente_id, cantidad_entradas, monto_total) 
                VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        
        return $stmt->execute([
            $this->id,
            $clienteId,
            $this->cantidadEntradas,
            $this->calcularTotal()
        ]);
    }
}
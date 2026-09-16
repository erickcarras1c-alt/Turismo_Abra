<?php
// models/ReservaEntrada.php

// Requerimos la clase padre Reserva y la configuración de Conexión a BD
require_once __DIR__ . '/Reserva.php';
require_once __DIR__ . '/../config/Conexion.php';

// HERENCIA: Hereda atributos y métodos de la clase abstracta Reserva
class ReservaEntrada extends Reserva {

    // ENCAPSULAMIENTO: Atributo privado propio de la clase Entrada
    private $cantidadEntradas;

    // CONSTRUCTOR
    public function __construct($nombreCliente, $dni, $precioEntrada, $cantidadEntradas = 1) {
        // Reutiliza el constructor del Padre (Reserva) para inicializar nombre, DNI y precio base
        parent::__construct($nombreCliente, $dni, $precioEntrada);
        $this->cantidadEntradas = $cantidadEntradas;
    }

    // GETTER: Retorna la cantidad de tickets comprados de forma segura
    public function getCantidadEntradas() {
        return $this->cantidadEntradas;
    }

    // POLIMORFISMO: Implementa el cálculo de cobro específico para Entradas (Precio x Cantidad)
    public function calcularTotal() {
        return $this->precioBase * $this->cantidadEntradas;
    }

    // GUARDAR EN BASE DE DATOS
    public function guardarEnBD() {
        // Obtiene la conexión activa de MySQL usando el patrón Singleton
        $db = Conexion::getConexion();

        // 1. Busca si el cliente ya existe por su DNI para evitar duplicarlo
        $stmt = $db->prepare("SELECT id FROM clientes WHERE dni = ?");
        $stmt->execute([$this->dni]);
        $cliente = $stmt->fetch();

        if ($cliente) {
            $clienteId = $cliente['id']; // Toma el ID del cliente existente
        } else {
            // Si es un cliente nuevo, lo registra en la tabla 'clientes'
            $stmt = $db->prepare("INSERT INTO clientes (nombre, dni) VALUES (?, ?)");
            $stmt->execute([$this->nombreCliente, $this->dni]);
            $clienteId = $db->lastInsertId(); // Obtiene el ID recien generado
        }

        // 2. Inserta la venta del ticket asociando el cliente_id
        $sql = "INSERT INTO ventas_entradas 
                (codigo_ticket, cliente_id, cantidad_entradas, monto_total) 
                VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        
        // Ejecuta la consulta pasando los valores de manera segura
        return $stmt->execute([
            $this->id,
            $clienteId,
            $this->cantidadEntradas,
            $this->calcularTotal()
        ]);
    }
}
<?php
// models/ReservaHospedaje.php
require_once __DIR__ . '/Reserva.php';
require_once __DIR__ . '/../config/Conexion.php';

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

    public function getNumeroPersonas() {
        return $this->numeroPersonas;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function calcularDias() {
        $inicio = new DateTime($this->fechaInicio);
        $fin = new DateTime($this->fechaFin);
        $dias = $inicio->diff($fin)->days;
        return ($dias > 0) ? $dias : 1;
    }

    public function calcularTotal() {
        return $this->precioBase * $this->calcularDias();
    }

    // Verifica en MySQL si el rango de fechas colisiona con otra reserva existente
    public function verificarDisponibilidad() {
        $db = Conexion::getConexion();
        $sql = "SELECT COUNT(*) FROM reservas_hospedaje 
                WHERE ? < fecha_fin AND ? > fecha_inicio";
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->fechaInicio, $this->fechaFin]);
        
        // Retorna TRUE si no hay traslape (disponible), FALSE si ya está ocupado
        return $stmt->fetchColumn() == 0;
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

        // 2. Registrar la Reserva de Hospedaje
        $sql = "INSERT INTO reservas_hospedaje 
                (codigo_reserva, cliente_id, numero_personas, fecha_inicio, fecha_fin, dias_estadia, monto_total) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        
        return $stmt->execute([
            $this->id,
            $clienteId,
            $this->numeroPersonas,
            $this->fechaInicio,
            $this->fechaFin,
            $this->calcularDias(),
            $this->calcularTotal()
        ]);
    }
}
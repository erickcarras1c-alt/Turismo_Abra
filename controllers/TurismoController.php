<?php

class TurismoController {

    public function inicio() {
        require_once 'views/inicio.php';
    }

    public function actividades() {
        require_once 'views/actividades.php';
    }

    public function destinos() {
        require_once 'views/destinos.php';
    }

    public function reservas() {
        require_once 'views/reservas.php';
    }

    public function procesarReserva() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Incluimos las clases solo al procesar
            require_once 'models/ReservaHospedaje.php';

            $nombre = $_POST['nombre'] ?? '';
            $dni = $_POST['dni'] ?? '';
            $personas = $_POST['personas'] ?? 1;
            $fecha_inicio = $_POST['fecha_inicio'] ?? date('Y-m-d');
            $fecha_fin = $_POST['fecha_fin'] ?? date('Y-m-d');

            // Crear objeto POO de ReservaHospedaje
            $hospedajeObj = new ReservaHospedaje($nombre, $dni, 80.00, $personas, $fecha_inicio, $fecha_fin);

            $reserva = [
                'id' => $hospedajeObj->getId(),
                'nombre' => $hospedajeObj->getNombreCliente(),
                'dni' => $hospedajeObj->getDni(),
                'personas' => $hospedajeObj->getNumeroPersonas(),
                'fecha_inicio' => $hospedajeObj->getFechaInicio(),
                'fecha_fin' => $hospedajeObj->getFechaFin(),
                'total' => number_format($hospedajeObj->calcularTotal(), 2)
            ];

            require_once 'views/confirmacion_reserva.php';
        } else {
            header('Location: index.php?action=reservas');
        }
    }

    public function entradas() {
        require_once 'views/entradas.php';
    }

    public function procesarPago() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once 'models/ReservaEntrada.php';

            $nombre = $_POST['nombre'] ?? '';
            $dni = $_POST['dni'] ?? '';

            // Crear objeto POO de ReservaEntrada
            $entradaObj = new ReservaEntrada($nombre, $dni, 5.00, 1);

            $ticket = [
                'codigo' => $entradaObj->getId(),
                'nombre' => $entradaObj->getNombreCliente(),
                'dni' => $entradaObj->getDni(),
                'monto' => number_format($entradaObj->calcularTotal(), 2),
                'fecha' => date('Y-m-d H:i:s')
            ];

            require_once 'views/ticket_virtual.php';
        } else {
            header('Location: index.php?action=entradas');
        }
    }
}
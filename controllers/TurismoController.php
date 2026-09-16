<?php
// controllers/TurismoController.php

// Carga de modelos para manejar la lógica de hospedaje y entradas
require_once 'models/ReservaHospedaje.php';
require_once 'models/ReservaEntrada.php';

// Controlador principal que conecta las vistas con los modelos (MVC)
class TurismoController {

    // --- MÉTODOS PARA MOSTRAR LAS VISTAS ---

    public function inicio() {
        require 'views/inicio.php'; // Carga la página de inicio
    }

    public function destinos() {
        require 'views/destinos.php'; // Carga la vista de destinos
    }

    public function reservaciones() {
        require 'views/reservas.php'; // Carga el formulario de hospedaje
    }

    public function entradas() {
        require 'views/entradas.php'; // Carga el formulario de entradas
    }

    // --- PROCESAR RESERVA DE HOSPEDAJE ---

    public function procesarReserva() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura y limpia los datos enviados del formulario
            $nombre = trim($_POST['nombre'] ?? '');
            $dni = trim($_POST['dni'] ?? '');
            $personas = intval($_POST['personas'] ?? 1);
            $fechaInicio = $_POST['fecha_inicio'] ?? '';
            $fechaFin = $_POST['fecha_fin'] ?? '';
            
            $precioPorDia = 800.00; // Tarifa fija por día

            if (!empty($nombre) && !empty($dni) && !empty($fechaInicio) && !empty($fechaFin)) {
                
                // Valida que el DNI tenga exactamente 8 números
                if (!ctype_digit($dni) || strlen($dni) !== 8) {
                    echo "<script>alert('El DNI debe contener exactamente 8 dígitos numéricos.'); window.history.back();</script>";
                    return;
                }

                // Valida que la fecha fin sea mayor a la fecha inicio
                if (strtotime($fechaFin) <= strtotime($fechaInicio)) {
                    echo "<script>alert('La fecha de Check-out debe ser posterior a la fecha de Check-in.'); window.history.back();</script>";
                    return;
                }

                // Instancia el objeto ReservaHospedaje con los datos
                $reserva = new ReservaHospedaje($nombre, $dni, $precioPorDia, $personas, $fechaInicio, $fechaFin);
                
                // Valida en la BD que no haya cruce de fechas
                if (!$reserva->verificarDisponibilidad()) {
                    echo "<script>alert('Las fechas seleccionadas ya están reservadas. Por favor elige otro rango de días.'); window.history.back();</script>";
                    return;
                }

                // Guarda la reserva en la BD
                $guardado = $reserva->guardarEnBD();

                if ($guardado) {
                    require 'views/confirmacion_reserva.php'; // Muestra la confirmación
                } else {
                    echo "<script>alert('Error al registrar la reserva en la base de datos.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Por favor complete todos los campos requeridos.'); window.history.back();</script>";
            }
        }
    }

    // --- PROCESAR VENTA DE ENTRADAS ---

    public function procesarEntrada() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Captura los datos del formulario de entradas
            $nombre = trim($_POST['nombre'] ?? '');
            $dni = trim($_POST['dni'] ?? '');
            $cantidad = intval($_POST['cantidad'] ?? 1);
            
            $precioEntrada = 8.00; // Tarifa unitaria por ticket

            if (!empty($nombre) && !empty($dni)) {

                // Valida que el DNI sea de 8 dígitos numéricos
                if (!ctype_digit($dni) || strlen($dni) !== 8) {
                    echo "<script>alert('El DNI debe contener exactamente 8 dígitos numéricos.'); window.history.back();</script>";
                    return;
                }

                // Instancia el objeto ReservaEntrada
                $entrada = new ReservaEntrada($nombre, $dni, $precioEntrada, $cantidad);
                
                // Guarda la venta en la BD
                $guardado = $entrada->guardarEnBD();

                if ($guardado) {
                    require 'views/ticket_virtual.php'; // Genera el ticket virtual
                } else {
                    echo "<script>alert('Error al procesar el pago de la entrada.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Por favor complete su nombre y DNI.'); window.history.back();</script>";
            }
        }
    }
}
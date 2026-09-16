<?php
// controllers/TurismoController.php
require_once 'models/ReservaHospedaje.php';
require_once 'models/ReservaEntrada.php';

class TurismoController {

    // Carga la página de inicio
    public function inicio() {
        require 'views/inicio.php';
    }

    // Carga la lista de destinos
    public function destinos() {
        require 'views/destinos.php';
    }

    // Carga el formulario de reservas de hospedaje
    public function reservaciones() {
        require 'views/reservas.php';
    }

    // Carga el formulario de compra de entradas
    public function entradas() {
        require 'views/entradas.php';
    }

    // Procesa el alquiler/hospedaje a S/ 800.00 por día con validación de traslape
    public function procesarReserva() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $dni = trim($_POST['dni'] ?? '');
            $personas = intval($_POST['personas'] ?? 1);
            $fechaInicio = $_POST['fecha_inicio'] ?? '';
            $fechaFin = $_POST['fecha_fin'] ?? '';
            
            // Tarifa por día
            $precioPorDia = 800.00;

            if (!empty($nombre) && !empty($dni) && !empty($fechaInicio) && !empty($fechaFin)) {
                
                // Validación básica de coherencia de fechas
                if (strtotime($fechaFin) <= strtotime($fechaInicio)) {
                    echo "<script>alert('La fecha de salida (Check-out) debe ser posterior a la fecha de entrada (Check-in).'); window.history.back();</script>";
                    return;
                }

                $reserva = new ReservaHospedaje($nombre, $dni, $precioPorDia, $personas, $fechaInicio, $fechaFin);
                
                // 1. Comprobar traslape de fechas en MySQL
                if (!$reserva->verificarDisponibilidad()) {
                    echo "<script>alert('Las fechas seleccionadas ya están reservadas por otro usuario. Por favor elige otro rango de días.'); window.history.back();</script>";
                    return;
                }

                // 2. Guardar en la base de datos si las fechas están disponibles
                $guardado = $reserva->guardarEnBD();

                if ($guardado) {
                    require 'views/confirmacion_reserva.php';
                } else {
                    echo "<script>alert('Error al registrar la reserva en la base de datos.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Por favor complete todos los campos requeridos.'); window.history.back();</script>";
            }
        }
    }

    // Procesa la venta de entradas a S/ 8.00 por ticket
    public function procesarEntrada() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $dni = trim($_POST['dni'] ?? '');
            $cantidad = intval($_POST['cantidad'] ?? 1);
            
            // Tarifa por entrada
            $precioEntrada = 8.00;

            if (!empty($nombre) && !empty($dni)) {
                $entrada = new ReservaEntrada($nombre, $dni, $precioEntrada, $cantidad);
                
                // Realizar pago y guardar en MySQL
                $guardado = $entrada->guardarEnBD();

                if ($guardado) {
                    require 'views/ticket_virtual.php';
                } else {
                    echo "<script>alert('Error al procesar el pago de la entrada.'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Por favor complete su nombre y DNI.'); window.history.back();</script>";
            }
        }
    }
}
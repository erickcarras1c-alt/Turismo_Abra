<?php
// Activar reporte de errores para diagnóstico
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Carga del controlador
require_once 'controllers/TurismoController.php';

$controller = new TurismoController();
$action = isset($_GET['action']) ? $_GET['action'] : 'inicio';

switch ($action) {
    case 'inicio':
        $controller->inicio();
        break;
    case 'actividades':
        $controller->actividades();
        break;
    case 'destinos':
        $controller->destinos();
        break;
    case 'reservas':
        $controller->reservas();
        break;
    case 'procesar_reserva':
        $controller->procesarReserva();
        break;
    case 'entradas':
        $controller->entradas();
        break;
    case 'procesar_pago':
        $controller->procesarPago();
        break;
    default:
        $controller->inicio();
        break;
}
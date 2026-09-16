<?php
// index.php

// 1. Cargar la conexión y los controladores/modelos requeridos
require_once 'config/Conexion.php';
require_once 'controllers/TurismoController.php';

// 2. Instanciar el controlador principal
$controller = new TurismoController();

// 3. Capturar la acción desde la URL (por defecto carga 'inicio')
$action = $_GET['action'] ?? 'inicio';

// 4. Enrutador según la acción solicitada
switch ($action) {
    case 'inicio':
        $controller->inicio();
        break;

    case 'destinos':
        $controller->destinos();
        break;

    // Acepta 'reservas' y 'reservaciones' para redireccionar correctamente
    case 'reservas':
    case 'reservaciones':
        $controller->reservaciones();
        break;

    case 'entradas':
        $controller->entradas();
        break;

    case 'procesarReserva':
        $controller->procesarReserva();
        break;

    case 'procesarEntrada':
        $controller->procesarEntrada();
        break;

    default:
        // Si la ruta no existe, redirige a inicio
        $controller->inicio();
        break;
}
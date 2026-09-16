<!-- FRONT CONTROLLER: Enrutador Central de la Aplicación (index.php) -->
<?php

// 1. CARGA DE DEPENDENCIAS
// Carga la configuración de la BD y el controlador principal antes de procesar cualquier petición
require_once 'config/Conexion.php';
require_once 'controllers/TurismoController.php';

// 2. INSTANCIACIÓN DEL CONTROLADOR
// Maneja la lógica de negocio y despacho de vistas
$controller = new TurismoController();

// 3. CAPTURA DE RUTA
// Lee el parámetro 'action' de la URL via GET. Aplica el operador Null Coalescing (??) para usar 'inicio' por defecto
$action = $_GET['action'] ?? 'inicio';

// 4. ENRUTADOR PRINCIPAL (SWITCH / ROUTER)
// Redirige el flujo hacia el método correspondiente en el TurismoController según la petición
switch ($action) {
    case 'inicio':
        $controller->inicio();
        break;

    case 'destinos':
        $controller->destinos();
        break;

    // Soporta múltiples alias ('reservas' y 'reservaciones') para apuntar al mismo método del controlador
    case 'reservas':
    case 'reservaciones':
        $controller->reservaciones();
        break;

    case 'entradas':
        $controller->entradas();
        break;

    // Métodos tipo POST para procesamiento de formularios en el servidor
    case 'procesarReserva':
        $controller->procesarReserva();
        break;

    case 'procesarEntrada':
        $controller->procesarEntrada();
        break;

    default:
        // Manejo de peticiones no reconocidas o rutas inexistentes (Mecanismo Fallback)
        $controller->inicio();
        break;
}
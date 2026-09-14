<?php
// Incluimos el controlador que maneja la lógica de la página
require_once 'controllers/TurismoController.php';

// Creamos un objeto de nuestro controlador
$controller = new TurismoController();

// Ejecutamos el método que carga la página principal
$controller->inicio();
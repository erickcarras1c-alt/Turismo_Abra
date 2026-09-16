<?php
// views/reservas.php
require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/ReservaHospedaje.php';

include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <div class="seccion-bienvenida">
        <h2>Reserva de Hospedaje</h2>
        <p>Selecciona tus fechas de estadía y número de visitantes para Oxapampa.</p>
    </div>

    <div class="formulario-card">
        <form action="index.php?action=procesarReserva" method="POST">
            <div class="grupo-campo">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Erick Carrasco" required>
            </div>

            <div class="grupo-campo">
                <label for="dni">DNI / Documento:</label>
                <input type="text" id="dni" name="dni" placeholder="Ej. 70000000" maxlength="15" required>
            </div>

            <div class="grupo-campo">
                <label for="personas">Número de Personas:</label>
                <input type="number" id="personas" name="personas" min="1" max="10" value="1" required>
            </div>

            <div class="grupo-campo">
                <label for="fecha_inicio">Fecha de Check-in:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required>
            </div>

            <div class="grupo-campo">
                <label for="fecha_fin">Fecha de Check-out:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required>
            </div>

            <button type="submit" class="btn">Confirmar y Guardar Reserva</button>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
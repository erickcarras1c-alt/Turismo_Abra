<?php
// views/entradas.php
require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/ReservaEntrada.php';

include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <div class="seccion-bienvenida">
        <h2>Compra de Entradas Virtuales</h2>
        <p>Precio por entrada general: <strong>S/ 8.00</strong></p>
    </div>

    <div class="formulario-card">
        <form action="index.php?action=procesarEntrada" method="POST">
            <div class="grupo-campo">
                <label for="nombre">Nombre del Titular:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" required>
            </div>

            <div class="grupo-campo">
                <label for="dni">DNI / Documento:</label>
                <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI" maxlength="15" required>
            </div>

            <div class="grupo-campo">
                <label for="cantidad">Cantidad de Entradas (S/ 8.00 c/u):</label>
                <input type="number" id="cantidad" name="cantidad" min="1" max="20" value="1" required>
            </div>

            <button type="submit" class="btn">Realizar Pago e Imprimir Ticket</button>
        </form>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
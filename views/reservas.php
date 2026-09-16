<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<section class="contenedor">
    <h2>🏠 Reserva de Hospedaje en El Abra</h2>
    <p class="descripcion">Completa el formulario para reservar tu estadía con nosotros.</p>

    <div class="formulario-card">
        <form action="index.php?action=procesar_reserva" method="POST">
            <div class="grupo-campo">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez">
            </div>

            <div class="grupo-campo">
                <label for="dni">DNI / Documento:</label>
                <input type="text" id="dni" name="dni" required placeholder="Ej. 70809000">
            </div>

            <div class="grupo-campo">
                <label for="personas">Número de Personas:</label>
                <input type="number" id="personas" name="personas" min="1" value="1" required>
            </div>

            <div class="grupo-campo">
                <label for="fecha_inicio">Fecha de Entrada (Check-in):</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required>
            </div>

            <div class="grupo-campo">
                <label for="fecha_fin">Fecha de Salida (Check-out):</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required>
            </div>

            <button type="submit" class="btn">Confirmar Reserva</button>
        </form>
    </div>
</section>

<?php include 'views/partials/footer.php'; ?>
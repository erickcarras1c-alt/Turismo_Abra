<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<section class="contenedor">
    <div class="comprobante-card">
        <h2>✅ ¡Reserva Registrada con Éxito!</h2>
        <p>Gracias por elegir el Hospedaje Mirador El Abra.</p>
        
        <div class="detalles">
            <p><strong>Titular:</strong> <?php echo htmlspecialchars($reserva['nombre']); ?></p>
            <p><strong>DNI:</strong> <?php echo htmlspecialchars($reserva['dni']); ?></p>
            <p><strong>N° de Personas:</strong> <?php echo htmlspecialchars($reserva['personas']); ?></p>
            <p><strong>Desde:</strong> <?php echo htmlspecialchars($reserva['fecha_inicio']); ?></p>
            <p><strong>Hasta:</strong> <?php echo htmlspecialchars($reserva['fecha_fin']); ?></p>
        </div>

        <br>
        <a href="index.php" class="btn">Volver al Inicio</a>
    </div>
</section>

<?php include 'views/partials/footer.php'; ?>
<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<section class="contenedor">
    <h2>🎉 ¡Pago Confirmado! Aquí está tu Entrada Virtual</h2>

    <div class="ticket-card">
        <div class="ticket-header">
            <h3>🏔️ BOLETO DIGITAL - MIRADOR EL ABRA</h3>
            <span class="codigo"><?php echo htmlspecialchars($ticket['codigo']); ?></span>
        </div>
        <div class="ticket-body">
            <p><strong>Visitante:</strong> <?php echo htmlspecialchars($ticket['nombre']); ?></p>
            <p><strong>DNI:</strong> <?php echo htmlspecialchars($ticket['dni']); ?></p>
            <p><strong>Monto Pagado:</strong> S/ <?php echo htmlspecialchars($ticket['monto']); ?></p>
            <p><strong>Fecha de Emisión:</strong> <?php echo htmlspecialchars($ticket['fecha']); ?></p>
            <div class="qr-placeholder">
                <p>📱 Muestra este comprobante desde tu celular al ingresar.</p>
            </div>
        </div>
    </div>

    <br>
    <a href="index.php" class="btn">Volver al Inicio</a>
</section>

<?php include 'views/partials/footer.php'; ?>
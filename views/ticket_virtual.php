<?php
// views/ticket_virtual.php
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <div class="formulario-card" style="border-top: 4px solid #22c55e; text-align: center;">
        <h2 style="color: #15803d; margin-bottom: 10px;">¡Pago Exitoso y Ticket Generado!</h2>
        <p>Tu entrada ha sido registrada en la base de datos de MySQL.</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">

        <div style="text-align: left; background: #f8fafc; padding: 15px; border-radius: 8px;">
            <p><strong>Código de Ticket:</strong> <?= $entrada->getId(); ?></p>
            <p><strong>Cliente:</strong> <?= htmlspecialchars($entrada->getNombreCliente()); ?></p>
            <p><strong>DNI:</strong> <?= htmlspecialchars($entrada->getDni()); ?></p>
            <p><strong>Cantidad de Entradas:</strong> <?= $entrada->getCantidadEntradas(); ?></p>
            <p><strong>Monto Total Pagado:</strong> S/ <?= number_format($entrada->calcularTotal(), 2); ?></p>
        </div>

        <a href="index.php?action=inicio" class="btn" style="display: inline-block; margin-top: 20px; text-decoration: none;">Volver al Inicio</a>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
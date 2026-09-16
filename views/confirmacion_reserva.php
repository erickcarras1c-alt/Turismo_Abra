<?php
// views/confirmacion_reserva.php
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <div class="formulario-card" style="border-top: 4px solid #22c55e; text-align: center;">
        <h2 style="color: #15803d; margin-bottom: 10px;">✅ ¡Reserva Registrada con Éxito!</h2>
        <p>Gracias por elegir el Hospedaje Mirador El Abra.</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">

        <div style="text-align: left; background: #f8fafc; padding: 18px; border-radius: 8px;">
            <p><strong>Código de Reserva:</strong> <?= $reserva->getId(); ?></p>
            <p><strong>Titular:</strong> <?= htmlspecialchars($reserva->getNombreCliente()); ?></p>
            <p><strong>DNI / Documento:</strong> <?= htmlspecialchars($reserva->getDni()); ?></p>
            <p><strong>Personas:</strong> <?= $reserva->getNumeroPersonas(); ?></p>
            <p><strong>Fecha de Check-in:</strong> <?= $reserva->getFechaInicio(); ?></p>
            <p><strong>Fecha de Check-out:</strong> <?= $reserva->getFechaFin(); ?></p>
            <p><strong>Días de Estadía:</strong> <?= $reserva->calcularDias(); ?> día(s)</p>
            <p style="font-size: 1.15rem; margin-top: 10px; color: #0f172a;">
                <strong>Monto Total a Pagar:</strong> S/ <?= number_format($reserva->calcularTotal(), 2); ?>
            </p>
        </div>

        <a href="index.php?action=inicio" class="btn" style="display: inline-block; margin-top: 20px; text-decoration: none;">Volver al Inicio</a>
    </div>
</div>

<?php include 'views/partials/footer.php'; ?>
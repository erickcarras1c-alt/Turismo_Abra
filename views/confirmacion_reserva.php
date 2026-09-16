<!-- VISTA: Confirmación de Reserva (views/confirmacion_reserva.php) -->

<!-- Carga las partes reutilizables del sitio (Encabezado y Menú de navegación) -->
<?php
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <!-- Tarjeta visual de confirmación con estilo de éxito (color verde) -->
    <div class="formulario-card" style="border-top: 4px solid #22c55e; text-align: center;">
        <h2 style="color: #15803d; margin-bottom: 10px;">✅ ¡Reserva Registrada con Éxito!</h2>
        <p>Gracias por elegir el Hospedaje Mirador El Abra.</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">

        <!-- BLOQUE DE DETALLES DE LA RESERVA -->
        <!-- Usa el objeto '$reserva' pasado desde el controlador para mostrar la información en vivo -->
        <div style="text-align: left; background: #f8fafc; padding: 18px; border-radius: 8px;">
            <!-- Obtiene el código único autogenerado (ej. REG-4821) -->
            <p><strong>Código de Reserva:</strong> <?= $reserva->getId(); ?></p>

            <!-- htmlspecialchars evita ataques de Inyección XSS al imprimir texto ingresado por el usuario -->
            <p><strong>Titular:</strong> <?= htmlspecialchars($reserva->getNombreCliente()); ?></p>
            <p><strong>DNI / Documento:</strong> <?= htmlspecialchars($reserva->getDni()); ?></p>
            
            <!-- Datos del hospedaje obtenidos mediante los métodos Getters del modelo -->
            <p><strong>Personas:</strong> <?= $reserva->getNumeroPersonas(); ?></p>
            <p><strong>Fecha de Check-in:</strong> <?= $reserva->getFechaInicio(); ?></p>
            <p><strong>Fecha de Check-out:</strong> <?= $reserva->getFechaFin(); ?></p>
            
            <!-- Llama al método de lógica de negocio que calcula la diferencia de días -->
            <p><strong>Días de Estadía:</strong> <?= $reserva->calcularDias(); ?> día(s)</p>
            
            <!-- Muestra el cálculo total aplicando formato de 2 decimales para soles (S/) -->
            <p style="font-size: 1.15rem; margin-top: 10px; color: #0f172a;">
                <strong>Monto Total a Pagar:</strong> S/ <?= number_format($reserva->calcularTotal(), 2); ?>
            </p>
        </div>

        <!-- Botón de retorno al inicio pasando el parámetro GET al enrutador -->
        <a href="index.php?action=inicio" class="btn" style="display: inline-block; margin-top: 20px; text-decoration: none;">Volver al Inicio</a>
    </div>
</div>

<!-- Carga el pie de página común del proyecto -->
<?php include 'views/partials/footer.php'; ?>
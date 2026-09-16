<!-- VISTA: Ticket Virtual / Comprobante de Compra (views/ticket_virtual.php) -->

<!-- Inclusión de los componentes de cabecera y navegación -->
<?php 
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor">
    <!-- TARJETA DEL TICKET VIRTUAL -->
    <div class="formulario-card" style="border-top: 4px solid #22c55e; text-align: center;">
        
        <!-- Mensaje de confirmación del proceso -->
        <h2 style="color: #15803d; margin-bottom: 10px;">¡Pago Exitoso y Ticket Generado!</h2>
        <p>Tu entrada ha sido registrada en la base de datos de MySQL.</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #e2e8f0;">

        <!-- DETALLE DEL TICKET: Renderizado dinámico de datos del objeto $entrada -->
        <div style="text-align: left; background: #f8fafc; padding: 15px; border-radius: 8px;">
            <!-- Muestra el ID autogenerado desde la BD -->
            <p><strong>Código de Ticket:</strong> <?= $entrada->getId(); ?></p>
            
            <!-- Sanitización de cadenas con htmlspecialchars para evitar ataques XSS -->
            <p><strong>Cliente:</strong> <?= htmlspecialchars($entrada->getNombreCliente()); ?></p>
            <p><strong>DNI:</strong> <?= htmlspecialchars($entrada->getDni()); ?></p>
            
            <!-- Datos de la transacción comercial -->
            <p><strong>Cantidad de Entradas:</strong> <?= $entrada->getCantidadEntradas(); ?></p>
            
            <!-- Cálculo del total ejecutado mediante el método del modelo y formateado a 2 decimales -->
            <p><strong>Monto Total Pagado:</strong> S/ <?= number_format($entrada->calcularTotal(), 2); ?></p>
        </div>

        <!-- Botón para retornar al flujo inicial -->
        <a href="index.php?action=inicio" class="btn" style="display: inline-block; margin-top: 20px; text-decoration: none;">Volver al Inicio</a>
    </div>
</div>

<!-- Pie de página reutilizable -->
<?php include 'views/partials/footer.php'; ?>
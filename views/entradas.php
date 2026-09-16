<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<section class="contenedor">
    <h2>🎟️ Compra de Entrada Virtual - Mirador El Abra</h2>
    <p class="descripcion">
        Adquiere tu boleto digital antes de visitar el mirador. El precio por persona es de <strong>S/ 5.00</strong>.
    </p>

    <div class="formulario-card">
        <h3>Datos para la Entrada y Pago</h3>
        <form action="index.php?action=procesar_pago" method="POST">
            <div class="grupo-campo">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej. María López">
            </div>

            <div class="grupo-campo">
                <label for="dni">DNI / Documento de Identidad:</label>
                <input type="text" id="dni" name="dni" required placeholder="Ej. 87654321">
            </div>

            <!-- PASARELA DE PAGO SIMULADA -->
            <hr style="margin: 20px 0;">
            <h4>💳 Pasarela de Pago</h4>
            
            <div class="grupo-campo">
                <label for="tarjeta">Número de Tarjeta (Simulación):</label>
                <input type="text" id="tarjeta" name="tarjeta" required placeholder="**** **** **** 1234">
            </div>

            <div class="grupo-campo">
                <label>Monto a Pagar:</label>
                <input type="text" value="S/ 5.00" disabled>
                <input type="hidden" name="monto" value="5.00">
            </div>

            <button type="submit" class="btn btn-pago">Realizar Pago y Generar Entrada</button>
        </form>
    </div>
</section>

<?php include 'views/partials/footer.php'; ?>
<!-- VISTA: Compra de Entradas Virtuales (views/entradas.php) -->

<!-- Requerimos los modelos por si la vista necesita referencias directas a las clases -->
<?php
require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/ReservaEntrada.php';

// Carga las partes comunes del sitio (Encabezado y Navegación)
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor" style="max-width: 800px; margin: 0 auto; padding: 20px 15px;">
    
    <!-- ENCABEZADO DE LA SECCIÓN -->
    <div class="seccion-bienvenida" style="text-align: center; margin-bottom: 25px;">
        <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-bottom: 8px;">Compra de Entradas Virtuales</h2>
        <p style="color: #64748b; font-size: 1.05rem;">Adquiere tus pases de acceso general para el Mirador El Abra.</p>
    </div>

    <!-- TARJETA INFORMATIVA (Beneficios de la entrada) -->
    <div class="tarjeta-informacion" style="background: #ffffff; border-radius: 16px; padding: 25px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; margin-bottom: 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 12px; margin-bottom: 18px; flex-wrap: wrap; gap: 10px;">
            <h3 style="color: #0f172a; font-size: 1.3rem; margin: 0;">¿Qué incluye tu entrada?</h3>
            <span style="background: #e0f2fe; color: #0369a1; padding: 6px 14px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                ⏰ Horario: 9:00 am – 8:00 pm
            </span>
        </div>

        <p style="color: #475569; margin-bottom: 15px; font-size: 0.95rem;">
            Tu ticket general te da acceso a todas las actividades e instalaciones dentro del recinto:
        </p>

        <!-- Grid visual con las 5 actividades principales incluidas -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px;">
            <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border-left: 4px solid #16a34a;">
                <span style="font-size: 1.3rem;">🐄</span>
                <strong style="color: #1e293b; font-size: 0.9rem;">Ordeño de Vaca</strong>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border-left: 4px solid #2563eb;">
                <span style="font-size: 1.3rem;">🌅</span>
                <strong style="color: #1e293b; font-size: 0.9rem;">Vista al Mirador</strong>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border-left: 4px solid #d97706;">
                <span style="font-size: 1.3rem;">🏛️</span>
                <strong style="color: #1e293b; font-size: 0.9rem;">Museo de Sitio</strong>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border-left: 4px solid #9333ea;">
                <span style="font-size: 1.3rem;">🍹</span>
                <strong style="color: #1e293b; font-size: 0.9rem;">Bar Rústico</strong>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 10px 14px; border-radius: 8px; border-left: 4px solid #e11d48;">
                <span style="font-size: 1.3rem;">🎯</span>
                <strong style="color: #1e293b; font-size: 0.9rem;">Juegos Interactivos</strong>
            </div>
        </div>
    </div>

    <!-- TARJETA CON EL FORMULARIO DE REGISTRO -->
    <div class="formulario-card" style="background: #ffffff; border-radius: 16px; padding: 30px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="color: #0f172a; font-size: 1.25rem; margin: 0;">Datos del Titular</h3>
            <!-- Muestra el precio base por entrada fijado en el sistema -->
            <span style="font-size: 1.1rem; font-weight: 700; color: #16a34a;">S/ 8.00 c/u</span>
        </div>

        <!-- FORMULARIO POST: Envía los datos al método procesarEntrada del controlador -->
        <form action="index.php?action=procesarEntrada" method="POST">
            
            <!-- CAMPO: Nombre -->
            <div class="grupo-campo" style="margin-bottom: 18px;">
                <label for="nombre" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Nombre del Titular:</label>
                <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- CAMPO: DNI (Con validación previa en HTML y JS inline) -->
            <div class="grupo-campo" style="margin-bottom: 18px;">
                <label for="dni" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">DNI (8 dígitos):</label>
                <!-- Solo permite 8 números y bloquea letras en tiempo real (oninput) -->
                <input type="text" id="dni" name="dni" maxlength="8" pattern="[0-9]{8}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" title="Ingrese exactamente 8 dígitos numéricos" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- CAMPO: Cantidad de entradas -->
            <div class="grupo-campo" style="margin-bottom: 22px;">
                <label for="cantidad" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Cantidad de Entradas:</label>
                <input type="number" id="cantidad" name="cantidad" min="1" max="20" value="1" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- BOTÓN DE ENVÍO DEL FORMULARIO -->
            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 1rem; font-weight: 600; border-radius: 8px; cursor: pointer;">Realizar Pago e Imprimir Ticket</button>
        </form>
    </div>
</div>

<!-- Pie de página reutilizable -->
<?php include 'views/partials/footer.php'; ?>
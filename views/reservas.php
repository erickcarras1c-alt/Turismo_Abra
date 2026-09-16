<!-- VISTA: Reserva de Cabaña / Hospedaje (views/reservas.php) -->

<!-- Requerimiento de modelos para gestionar las reservas dentro de la vista -->
<?php
require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/ReservaHospedaje.php';

// Inclusión de la cabecera y el menú de navegación general
include 'views/partials/header.php';
include 'views/partials/nav.php';
?>

<div class="contenedor" style="max-width: 800px; margin: 0 auto; padding: 20px 15px;">
    
    <!-- ENCABEZADO DE LA SECCIÓN -->
    <div class="seccion-bienvenida" style="text-align: center; margin-bottom: 25px;">
        <h2 style="color: #1e293b; font-size: 2rem; font-weight: 700; margin-bottom: 8px;">Cabaña Mirador El Abra</h2>
        <p style="color: #64748b; font-size: 1.05rem;">Vive la experiencia completa hospedándote en el corazón de Oxapampa.</p>
    </div>

    <!-- TARJETA INFORMATIVA: DETALLES DE LA CABAÑA -->
    <div class="tarjeta-informacion" style="background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0; margin-bottom: 35px;">
        <!-- Banner visual con la tarifa por día de la cabaña -->
        <div style="position: relative;">
            <img src="https://i.pinimg.com/736x/c1/17/98/c11798f71578646c6e169fad3bb50031.jpg" alt="Cabaña Mirador El Abra" style="width: 100%; height: 320px; object-fit: cover; display: block;">
            <div style="position: absolute; bottom: 12px; right: 12px; background: rgba(15, 23, 42, 0.85); backdrop-filter: blur(4px); color: #ffffff; padding: 6px 14px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                🌲 S/ 800.00 / Día (Cabaña Completa)
            </div>
        </div>

        <!-- Grid de servicios incluidos en la cabaña -->
        <div style="padding: 25px;">
            <h3 style="color: #0f172a; font-size: 1.35rem; margin-bottom: 18px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;">
                Servicios e Instalaciones
            </h3>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                <div style="display: flex; align-items: flex-start; gap: 12px; background: #f8fafc; padding: 12px 15px; border-radius: 10px; border-left: 4px solid #2563eb;">
                    <span style="font-size: 1.4rem;">🛏️</span>
                    <div>
                        <strong style="display: block; color: #1e293b; font-size: 0.95rem;">8 Habitaciones</strong>
                        <span style="color: #64748b; font-size: 0.85rem;">Amplias y completamente equipadas.</span>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 12px; background: #f8fafc; padding: 12px 15px; border-radius: 10px; border-left: 4px solid #0284c7;">
                    <span style="font-size: 1.4rem;">🚿</span>
                    <div>
                        <strong style="display: block; color: #1e293b; font-size: 0.95rem;">Baño y Ducha</strong>
                        <span style="color: #64748b; font-size: 0.85rem;">Servicios de baño dentro de la cabaña.</span>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 12px; background: #f8fafc; padding: 12px 15px; border-radius: 10px; border-left: 4px solid #d97706;">
                    <span style="font-size: 1.4rem;">🔥</span>
                    <div>
                        <strong style="display: block; color: #1e293b; font-size: 0.95rem;">Zona de Asador</strong>
                        <span style="color: #64748b; font-size: 0.85rem;">Espacio privado para parrillas y reuniones.</span>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 12px; background: #f8fafc; padding: 12px 15px; border-radius: 10px; border-left: 4px solid #16a34a;">
                    <span style="font-size: 1.4rem;">🎟️</span>
                    <div>
                        <strong style="display: block; color: #1e293b; font-size: 0.95rem;">Entrada Libre</strong>
                        <span style="color: #64748b; font-size: 0.85rem;">Acceso ilimitado al mirador durante tu estadía.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FORMULARIO DE REGISTRO DE HOSPEDAJE -->
    <div class="formulario-card" style="background: #ffffff; border-radius: 16px; padding: 30px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08); border: 1px solid #e2e8f0;">
        <h3 style="margin-bottom: 20px; color: #0f172a; font-size: 1.25rem;">Completa tus datos de reserva</h3>

        <!-- Envío de datos al Front Controller con la acción procesarReserva vía POST -->
        <form action="index.php?action=procesarReserva" method="POST">
            
            <!-- Campo: Nombre del cliente -->
            <div class="grupo-campo" style="margin-bottom: 18px;">
                <label for="nombre" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- Campo: DNI con limpieza automática de caracteres no numéricos -->
            <div class="grupo-campo" style="margin-bottom: 18px;">
                <label for="dni" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">DNI (8 dígitos):</label>
                <input type="text" id="dni" name="dni" maxlength="8" pattern="[0-9]{8}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" title="Ingrese exactamente 8 dígitos numéricos" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- Campo: Cantidad de huéspedes (Limitado de 1 a 20) -->
            <div class="grupo-campo" style="margin-bottom: 18px;">
                <label for="personas" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Número de Visitantes:</label>
                <input type="number" id="personas" name="personas" min="1" max="20" value="1" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
            </div>

            <!-- Rango de fechas: Check-in y Check-out en layout grid -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 22px;">
                <div class="grupo-campo">
                    <label for="fecha_inicio" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Fecha de Check-in:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                </div>

                <div class="grupo-campo">
                    <label for="fecha_fin" style="display: block; margin-bottom: 6px; font-weight: 600; color: #334155;">Fecha de Check-out:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                </div>
            </div>

            <!-- Botón para enviar la información al backend -->
            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 1rem; font-weight: 600; border-radius: 8px; cursor: pointer;">Confirmar y Guardar Reserva</button>
        </form>
    </div>
</div>

<!-- Pie de página común -->
<?php include 'views/partials/footer.php'; ?>
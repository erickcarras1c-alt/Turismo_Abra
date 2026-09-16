<!-- VISTA: Ruta Turística / Destinos (views/destinos.php) -->

<!-- Carga de componentes reutilizables (Encabezado y Barra de navegación) -->
<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<section class="contenedor-destinos">
    <!-- Encabezado con título principal de la ruta -->
    <div class="encabezado-destinos">
        <h2>Ruta Turística Oxapampa - Villa Rica</h2>
        <p>Explora los atractivos conectados a lo largo de la carretera hacia la capital del café.</p>
    </div>

    <!-- LISTADO DE DESTINOS EN FORMATO DE FILAS -->
    <div class="lista-filas-destinos">

        <!-- FILA 1: MIRADOR EL ABRA (Atracción principal) -->
        <div class="fila-destino azul">
            <!-- Bloque con texto, información de ruta y botón de acción -->
            <div class="bloque-info">
                <h3>🏔️ Mirador El Abra</h3>
                <p class="descripcion-destino">
                    Ubicado en el punto más alto de la salida de Oxapampa. Ofrece una vista panorámica privilegiada de todo el valle oxapampino, alojamiento rústico y el inicio del circuito turístico.
                </p>
                <!-- Datos informativos de distancia y tiempo -->
                <div class="datos-ruta">
                    <span>📍 <strong>Ubicación:</strong> Salida de Oxapampa a Villa Rica</span>
                    <span>⏱️ <strong>Tiempo:</strong> 10 - 15 min desde el centro de Oxapampa</span>
                </div>
                <!-- Botón de acción hacia la reserva de hospedaje -->
                <a href="index.php?action=reservas" class="btn btn-destino">Reservar Hospedaje</a>
            </div>
            <!-- Bloque de imagen representativa del mirador -->
            <div class="bloque-imagen">
                <img src="https://i.pinimg.com/1200x/15/23/52/152352b4583ca2b5df46a4681f079547.jpg" alt="Mirador El Abra">
            </div>
        </div>

        <!-- FILA 2: MANANTIAL DE LA VIRGEN (Punto intermedio) -->
        <div class="fila-destino naranja">
            <div class="bloque-info">
                <h3>💧 Manantial de la Virgen</h3>
                <p class="descripcion-destino">
                    Un apacible rincón natural rodeado de densa vegetación y aguas cristalinas. Es un punto de parada tradicional para refrescarse, fotografiar la naturaleza y conectar con la serenidad del entorno.
                </p>
                <div class="datos-ruta">
                    <span>📏 <strong>Distancia:</strong> ~12 km desde Oxapampa (~8 km desde El Abra)</span>
                    <span>⏱️ <strong>Tiempo:</strong> ~20 min en auto / mototaxi</span>
                </div>
            </div>
            <div class="bloque-imagen">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop" alt="Manantial de la Virgen">
            </div>
        </div>

        <!-- FILA 3: VILLA RICA (Punto final) -->
        <div class="fila-destino amarillo">
            <div class="bloque-info">
                <h3>☕ Villa Rica (Capital del Café más fino del mundo)</h3>
                <p class="descripcion-destino">
                    Famosa por sus fincas cafetaleras, la Laguna Oconal, el avistamiento de aves y sus gastronomía con fusión yanesha y austro-alemana. El destino final perfecto siguiendo la ruta.
                </p>
                <div class="datos-ruta">
                    <span>📏 <strong>Distancia:</strong> ~68 km desde Oxapampa</span>
                    <span>⏱️ <strong>Tiempo:</strong> ~1 hora y 20 min por carretera asfaltada</span>
                </div>
            </div>
            <div class="bloque-imagen">
                <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=800&auto=format&fit=crop" alt="Villa Rica">
            </div>
        </div>

    </div>
</section>

<!-- Carga del pie de página común -->
<?php include 'views/partials/footer.php'; ?>
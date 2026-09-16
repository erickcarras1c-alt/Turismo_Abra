<!-- VISTA: Actividades/Destinos (views/destinos.php) -->

<!-- INCLUSIÓN DE PARCIALES REUTILIZABLES (Modularización) -->
<!-- Carga el encabezado (head, CSS, metadatos) -->
<?php include 'views/partials/header.php'; ?>
<!-- Carga la barra de navegación del sitio web -->
<?php include 'views/partials/nav.php'; ?>

<!-- SECCIÓN PRINCIPAL DE CONTENIDO -->
<section class="contenedor">
    <!-- Título y descripción introductoria de las actividades -->
    <h2>🎯 Actividades en el Mirador El Abra</h2>
    <p class="descripcion">
        Vive una experiencia completa disfrutando de las distintas atracciones y actividades tradicionales que tenemos para ti.
    </p>

    <!-- CONTENEDOR GRID/FLEX: Muestra el catálogo de actividades en tarjetas visuales -->
    <div class="tarjetas-grandes">
        
        <!-- Tarjeta de Actividad 1: Ordeño de Vaca -->
        <div class="tarjeta-actividad">
            <div class="icono-actividad">🥛</div>
            <h3>Ordeño de Vaca</h3>
            <p>Aprende y participa en la tradición ganadera oxapampina realizando el ordeño directo con guía especializada.</p>
        </div>

        <!-- Tarjeta de Actividad 2: Mirador Panorámico -->
        <div class="tarjeta-actividad">
            <div class="icono-actividad">🏔️</div>
            <h3>Mirador Panorámico</h3>
            <p>Sube a nuestras plataformas astronómicas y aprecia todo el esplendor del valle verde de Oxapampa.</p>
        </div>

        <!-- Tarjeta de Actividad 3: Museo Cultural -->
        <div class="tarjeta-actividad">
            <div class="icono-actividad">🏛️</div>
            <h3>Museo Cultural</h3>
            <p>Explora la historia austro-alemana y la herencia nativa Yanesha mediante piezas históricas e iconografía local.</p>
        </div>

        <!-- Tarjeta de Actividad 4: Bar & Coctelería -->
        <div class="tarjeta-actividad">
            <div class="icono-actividad">🍹</div>
            <h3>Bar & Coctelería</h3>
            <p>Prueba tragos regionales exóticos y bebidas preparadas a base de frutas locales, café e insumos de la selva.</p>
        </div>

        <!-- Tarjeta de Actividad 5: Juegos Manuales -->
        <div class="tarjeta-actividad">
            <div class="icono-actividad">🎲</div>
            <h3>Juegos Manuales</h3>
            <p>Zona recreativa con dinámicas de destreza y artesanía participativa pensadas para el entretenimiento familiar.</p>
        </div>
    </div>

    <br><br>
    
    <!-- ENLACE DE NAVEGACIÓN A LA RUTA DEL CONTROLADOR -->
    <!-- Redirige al enrutador (index.php) activando la acción 'entradas' para comprar el pase -->
    <a href="index.php?action=entradas" class="btn btn-pago">Comprar Entrada para las Actividades</a>
</section>

<!-- Carga el pie de página común del sitio web -->
<?php include 'views/partials/footer.php'; ?>
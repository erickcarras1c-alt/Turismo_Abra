<!-- VISTA: Página Principal / Inicio (views/inicio.php) -->

<!-- Carga del encabezado y la barra de navegación compartida -->
<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<!-- HERO BANNER PRINCIPAL (Portada de bienvenida) -->
<header class="hero-inicio">
    <div class="hero-content">
        <h1>Mirador El Abra</h1>
        <p>Disfruta de la mejor vista panorámica del valle de Oxapampa.</p>
        <!-- Enlace de acción rápida que redirige a la vista de destinos usando la URL del Front Controller -->
        <a href="index.php?action=destinos" class="btn-hero">Conocer más</a>
    </div>
</header>

<!-- SECCIÓN DE CONTENIDO PRINCIPAL -->
<main class="contenedor-inicio">
    <!-- Resumen introductorio sobre el mirador -->
    <section class="seccion-bienvenida">
        <h2>¿Qué es el Mirador El Abra?</h2>
        <p class="texto-intro">
            El <strong>Mirador El Abra</strong> es uno de los puntos turísticos más visitados de <strong>Oxapampa</strong> (Pasco). Ubicado a pocos minutos de la ciudad, se encuentra en una zona alta privilegiada desde donde se contempla una impresionante vista panorámica de todo el valle oxapampino, sus extensas áreas verdes y las clásicas viviendas de arquitectura austro-alemana.
        </p>
    </section>

    <!-- GRID DE TARJETAS (Resumen visual de atractivos clave) -->
    <section class="grid-caracteristicas">
        <!-- Tarjeta 1: Paisaje y fotografía -->
        <div class="tarjeta-caracteristica">
            <span class="icono">👁️</span>
            <h3>Vistas Panorámicas</h3>
            <p>Cuenta con varios niveles de observación para capturar fotos espectaculares de la selva alta, los paisajes verdes y el valle en toda su extensión.</p>
        </div>

        <!-- Tarjeta 2: Identidad local e integración cultural -->
        <div class="tarjeta-caracteristica">
            <span class="icono">🏹</span>
            <h3>Cultura Yanesha</h3>
            <p>Sus estructuras rinden homenaje a las comunidades nativas locales integrando elementos culturales como la "Corona Yanesha" y el "Nido del Cueche".</p>
        </div>

        <!-- Tarjeta 3: Gastronomía y productos locales -->
        <div class="tarjeta-caracteristica">
            <span class="icono">🍦</span>
            <h3>Sabores y Gastronomía</h3>
            <p>Además del paisaje, el lugar ofrece helados artesanales elaborados con frutos locales y espacios ideales para el descanso en familia.</p>
        </div>
    </section>
</main>

<!-- Carga del pie de página común -->
<?php include 'views/partials/footer.php'; ?>
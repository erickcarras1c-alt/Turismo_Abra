<?php include 'views/partials/header.php'; ?>
<?php include 'views/partials/nav.php'; ?>

<!-- BANNER PRINCIPAL CON BOTÓN QUE LLEVA A ACTIVIDADES -->
<header class="hero">
    <div class="hero-overlay">
        <div class="hero-texto">
            <h1>Mirador El Abra</h1>
            <p>Disfruta de la mejor vista panorámica del valle de Oxapampa.</p>
            <a href="index.php?action=actividades" class="btn">Conocer más</a>
        </div>
    </div>
</header>

<!-- SECCIÓN INFORMATIVA (TARJETAS AGRANDADAS EN CSS) -->
<section id="que-es" class="contenedor">
    <h2>¿Qué es el Mirador El Abra?</h2>
    <p class="descripcion">
        El <strong>Mirador El Abra</strong> es uno de los puntos turísticos más visitados de <strong>Oxapampa</strong> (Pasco). Ubicado a pocos minutos de la ciudad, se encuentra en una zona alta privilegiada desde donde se contempla una impresionante vista panorámica de todo el valle oxapampino, sus extensas áreas verdes y las clásicas viviendas de arquitectura austro-alemana.
    </p>

    <div class="tarjetas">
        <div class="tarjeta">
            <h3>👁️ Vistas Panorámicas</h3>
            <p>Cuenta con varios niveles de observación para capturar fotos espectaculares de la selva alta, los paisajes verdes y el valle en toda su extensión.</p>
        </div>

        <div class="tarjeta">
            <h3>🏹 Cultura Yanesha</h3>
            <p>Sus estructuras rinden homenaje a las comunidades nativas locales integrando elementos culturales como la "Corona Yanesha" y el "Nido del Cueche".</p>
        </div>

        <div class="tarjeta">
            <h3>🍦 Sabores y Gastronomía</h3>
            <p>Además del paisaje, el lugar ofrece helados artesanales elaborados con frutos locales y espacios ideales para el descanso en familia.</p>
        </div>
    </div>
</section>

<?php include 'views/partials/footer.php'; ?>
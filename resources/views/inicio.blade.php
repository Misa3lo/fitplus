<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Plus Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .bg-yellow
        {
            background-color: #ADBB95;
        }
        .text-dark
        {
            color: #333;
        }
        .hero-section
        {
            background: url('img/fondo.png') no-repeat center center;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .hero-section h1
        {

            font-family: 'Lora',serif;
            font-weight: bold;
            color: #FFFFFF;
            text-align: center;
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
            -webkit-text-stroke: 1.0px black;
            font-size: 80px;
            padding: 15px 0;
        }

    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container text-center">
        <h1 class="display-3">Transforma tu cuerpo, transforma tu vida</h1>
        <a href="#servicios" class="btn btn-lg btn-dark">Descubre más</a>
    </div>
</section>

<!-- Sobre nosotros -->
<section id="sobre" class="py-5 text-center">
    <div class="container">
        <h2 class="display-4 text-misa">Sobre Fit Plus</h2>
        <p class="lead text-dark">En Fit Plus, nos apasiona ayudarte a alcanzar tu máximo potencial. Con entrenadores altamente calificados y planes de nutrición hechos a medida, estamos comprometidos con tu bienestar.</p>
    </div>
</section>

<!-- Servicios -->
<section id="servicios" class="bg-yellow py-5 text-dark">
    <div class="container text-center">
        <h2 class="display-4">Nuestros Servicios</h2>
        <div class="row">
            <!-- Servicio 1 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="service-image1.jpg" class="card-img-top" alt="Entrenamiento Personalizado">
                    <div class="card-body">
                        <h5 class="card-title">Entrenamiento Personalizado</h5>
                        <p class="card-text">Nuestros entrenadores crearán un plan de entrenamiento adaptado a tus necesidades y objetivos específicos.</p>
                    </div>
                </div>
            </div>
            <!-- Servicio 2 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="service-image2.jpg" class="card-img-top" alt="Nutrición Deportiva">
                    <div class="card-body">
                        <h5 class="card-title">Nutrición Deportiva</h5>
                        <p class="card-text">Recibe asesoría nutricional para complementar tus entrenamientos y mejorar tus resultados.</p>
                    </div>
                </div>
            </div>
            <!-- Servicio 3 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="service-image3.jpg" class="card-img-top" alt="Clases Grupales">
                    <div class="card-body">
                        <h5 class="card-title">Clases Grupales</h5>
                        <p class="card-text">Únete a nuestras clases grupales y disfruta de un ambiente motivador mientras trabajas en tu fitness.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonios -->
<section id="testimonios" class="py-5 text-center">
    <div class="container">
        <h2 class="display-4 text-yellow">Testimonios</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="blockquote">
                    <p>"Fit Plus me ayudó a perder 10 kilos en solo 3 meses. Gracias a su plan de entrenamiento y nutrición, me siento mejor que nunca."</p>
                    <footer>- Ana Rodríguez</footer>
                </div>
            </div>
            <div class="col-md-6">
                <div class="blockquote">
                    <p>"Los entrenadores son muy profesionales y siempre están motivándome a seguir adelante. ¡Recomiendo Fit Plus totalmente!"</p>
                    <footer>- Juan Pérez</footer>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contactos -->
<section id="contactos" class="bg-yellow py-5 text-dark">
    <div class="container text-center">
        <h2 class="display-4">Contáctanos</h2>
        <p class="lead">¡Estamos aquí para ayudarte!</p>
        <a href="mailto:contacto@fitplus.com" class="btn btn-dark btn-lg">Enviar un correo</a>
    </div>
</section>

<!-- Pie de pagina -->
<footer class="bg-dark text-white text-center py-4">
    <p>&copy; 2025 Fit Plus | Todos los derechos reservados</p>
</footer>

<!-- Dependencias -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

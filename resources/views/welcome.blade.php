<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Foreslab - Inicio</title>
    <meta
        content="Foreslab es una empresa líder en la producción masiva de plantas nativas forestales, frutales y ornamentales utilizando la biotecnología vegetal. Nuestro enfoque se centra en la sostenibilidad y el desarrollo, brindando diversidad genética nativa para reforestación, restauración ecológica, compensación ambiental y actividades productivas sostenibles. Con nuestra experiencia y conocimiento técnico, ofrecemos servicios personalizados a instituciones públicas y privadas, asociaciones, proyectos de inversión, comunidades y la sociedad civil. Nos diferenciamos por nuestro compromiso con el uso responsable y ético de la biotecnología, así como por nuestros procesos ecológicos."
        name="description">
    <!-- Favicons -->
    <link href="assets/img/favicon.webp" rel="icon">
    <link href="assets/img/favicon.webp" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!--icon for quotes-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

</head>

@if (session('message'))
    <div class="col-md-4 bg-secondary">
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
            aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-warning modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-warning">
                    <div class="modal-header border-0">
                        <h6 class="modal-title" id="modal-title-notification">Foreslab</h6>

                    </div>
                    <div class="modal-body border-0">
                        <div class="py-3 text-center">
                            <i class="ni ni-active-40 ni-3x"></i>
                            <h4 class="heading mt-4">Ya puedes empezar!</h4>
                            <p>{{ session('message') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-link text-white ml-auto"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<body>

    @php
        $user = Auth::user();
    @endphp
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="https://test.foreslab.com/" class="logo"><img src="assets/img/logo2.webp" alt=""
                    class="img-fluid"></a>
            <!-- <h1 class="logo"><a href="index.html">Foreslab</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/#hero">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="/#about">Nosotros</a></li>

                    {{-- <li><a class="nav-link scrollto " href="/blog/">Blog</a></li> --}}

                    <!--<li><a class="nav-link scrollto" href="#team">Equipo</a></li>-->
                    <!-- <li><a class="nav-link scrollto" href="/#contact">Blog</a></li> -->
                    @guest
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">Iniciar Sesion</a></li>
                    @endguest
                    @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img alt="Image Avatar" class="avatar avatar-sm rounded-circle me-2"
                                    src="{{ 'https://ui-avatars.com/api/?name=' . $user->name }}"
                                    style="width: 40px; height: 40px;">
                                <span class="nav-link-inner--text">{{ $user->name }}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="{{ route('home') }}" class="dropdown-item">Perfil</a></li>
                                <li><a href="{{ route('recommend.system') }}" class="dropdown-item">Sistema</a></li>
                                @if ($user->instructor)
                                    <li><a href="https://admin.biosofhus.org.pe/" class="dropdown-item"
                                            target="_blank">Administración</a></li>
                                @endif
                                <li><a href="#" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                        sesión</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endauth


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <div class="animated-text">
                        <h1>Herramientas de IA para</h1>
                        <h1>la selección de cultivos</h1>
                        <h2>Transformando la agricultura con ciencia y tecnología avanzada.</h2>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('recommend.system') }}" class="btn-get-started scrollto">Empezar ... </a>
                        <a href="https://www.youtube.com/watch?v=6rTwjPq4qvk&t=113s"
                            class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Video</span></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="assets/img/hero-img.webp" class="img-fluid animated" alt="hero" loading="lazy">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="assets/img/about.webp" class="img-fluid" alt="about" loading="lazy">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Innovación en IA para la agricultura</h3>
                        <p class="fst-italic">
                            Foreslab desarrolla herramientas de inteligencia artificial para recomendar cultivos
                            adecuados según condiciones climáticas y regiones específicas, contribuyendo así a la
                            sostenibilidad y eficiencia en la agricultura.
                        </p>
                        <h4>¿Por qué elegirnos?</h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Expertise en IA y biotecnología</li>
                            <li><i class="bi bi-check-circle"></i> Soluciones personalizadas para agricultura</li>
                            <li><i class="bi bi-check-circle"></i> Compromiso con la sostenibilidad agrícola</li>
                        </ul>
                        <p>
                            Nos enfocamos en el desarrollo ético y responsable de la IA, ofreciendo soluciones
                            adaptadas a instituciones públicas y privadas, proyectos de inversión y comunidades
                            agrícolas.
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->


        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <span>Contactanos</span>
                    <h2>Contactanos</h2>
                    <p>Para obtener mas información de nuestros <b>servicios o productos</b> <br>
                        escribanos a través de este formulario o los datos de contacto.</p>
                </div>
                <div class="cotainer-fluid">
                    <div class="row d-flex">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="info d-flex">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="address">
                                            <div class="icon-box">
                                                <i class="bi bi-geo-alt"></i>
                                                <h3>Trabajamos:</h3>
                                                <p>Madre de Dios, Amazonas, Ucayali,<br>San Martín, Cusco.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="phone">
                                            <div class="icon-box">
                                                <i class="bi bi-telephone"></i>
                                                <h3>Telefonos</h3>
                                                <p>+51 985 153 678<br>+51 902 295 669</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="email">
                                            <div class="icon-box">
                                                <i class="bi bi-envelope"></i>
                                                <h3>Correos</h3>
                                                <p>info@foreslab.com<br>ventas@foreslab.com</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="address">
                                            <div class="info-box">
                                                <i class="bi bi-clock"></i>
                                                <h3> Atención</h3>
                                                <p>Lunes - Viernes<br>9:00 am - 05:00 pm</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <form action="https://formspree.io/f/xpzejdrn" method="POST" class="php-email-form"
                                target="_blank">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nombres y Apellidos" required>
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email" required>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Asunto" required>
                                    </div>

                                    <div class="col-md-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Mensaje" required></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <div class="loading">Cargando</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Tu mensaje fue enviado.
                                            Gracias por comunicarte con Foreslab!</div>
                                        <button type="submit">Enviar Mensaje</button>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
            </div>
        </section><!-- End Contact Section -->




        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">

                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <img src="/assets/img/footer_img.webp" class="img-fluid" alt="footer">
                        </div>
                        <div class="col-lg-3 justify-content-center">
                            <h3>Foreslab</h3>
                            <p>Biotecnología para la conservaciòn de la naturaleza.</p>
                            <div class="social-links">
                                <!-- <a href="" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                                <a href="https://www.facebook.com/profile.php?id=100090484663194" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/foreslab.peru/?igshid=YmMyMTA2M2Y%3D"
                                    class="instagram"><i class="bx bxl-instagram"></i></a>
                                <!-- <a href="" class="google-plus"><i class="bx bxl-github"></i></a> -->
                                <a href="https://www.linkedin.com/company/foreslab/" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>Foreslab</span></strong>. Todos los derechos reservados
                </div>
                <div class="credits">
                    Diseñado por el <a href="https://github.com/FranciscoAscue">Equipo Foreslab</a>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var modalNotification = document.getElementById('modal-notification');
                if (modalNotification) {
                    var modal = new bootstrap.Modal(modalNotification);
                    modal.show();
                }
            });
        </script>

        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

        <!-- Template Main JS File -->
        <script src="/assets/js/main.js"></script>

</body>

</html>

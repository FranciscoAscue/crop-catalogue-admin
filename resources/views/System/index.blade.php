<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistema de recomendacion - Foreslab</title>
    <meta
        content="Foreslab es una empresa líder en la producción masiva de plantas nativas forestales, frutales y ornamentales utilizando la biotecnología vegetal. Nuestro enfoque se centra en la sostenibilidad y el desarrollo, brindando diversidad genética nativa para reforestación, restauración ecológica, compensación ambiental y actividades productivas sostenibles. Con nuestra experiencia y conocimiento técnico, ofrecemos servicios personalizados a instituciones públicas y privadas, asociaciones, proyectos de inversión, comunidades y la sociedad civil. Nos diferenciamos por nuestro compromiso con el uso responsable y ético de la biotecnología, así como por nuestros procesos ecológicos."
        name="description">
    <meta
        content="Foreslab, biotecnología, sostenibilidad, desarrollo, producción masiva, plantas nativas forestales, frutales, ornamentales, diversidad genética, reforestación, restauración ecológica, compensación ambiental, actividades productivas sostenibles, experiencia, conocimiento técnico, personalización de servicios, uso de procesos ecológicos, instituciones públicas, instituciones privadas, asociaciones, proyectos de inversión, comunidades, sociedad civil, responsabilidad, ética"
        name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.webp" rel="icon">
    <link href="/assets/img/favicon.webp" rel="apple-touch-icon">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--icon for quotes-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <style>
        ::placeholder {
            color: #272020;
            text-align: center;
        }

        input {
            color: #333;
        }

        .select2-container .select2-selection--single {
            border: none;
            box-shadow: 1px 2px 2px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1rem;
            height: auto;
        }



        .btn-primary {
            background-color: #16df7e;
            border-color: #16df7e;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #6b90b1ff;
            border-color: rgb(241, 236, 236);
        }
    </style>

</head>


<body>
    <!-- ======= Header ======= -->

    @php
        $user = Auth::user();
    @endphp

    <header id="header" class=" bg-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="https://test.foreslab.com/" class="logo"><img src="/assets/img/logo2.webp" alt=""
                    class="img-fluid"></a>
            <!-- <h1 class="logo"><a href="index.html">Foreslab</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="/#about">Nosotros</a></li>

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

    <section class="login">
        <div class="container-fluid px-6 py-5 mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-8 col-md-8 col-10 text-center">
    
                    <div class="card card_ia bg-light">
                        <h2 class="text-center mb-4 text-secondary">Sistema de recomendación de cultivos</h2>
                        <form id="recommendationForm" class="form-card" action="{{ route('clones.recommend') }}"
                            method="POST">
                            @csrf
                            <div class="row justify-content-center ">
                                <div class="form-group col-sm-5 p-1">
                                    <select class="form-control border-0 shadow-sm m-2 p-2 rounded" id="purpose" name="purpose">
                                        <option value="" selected disabled>Propósito</option>
                                        <option value="Agriculture">Agricultura</option>
                                        <option value="Breeding">Mejoramiento</option>
                                        <option value="Commercial Sector">Sector Comercial</option>
                                        <option value="Education">Educación</option>
                                        <option value="Research">Investigación</option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-5 p-1">
                                    <select class="form-control border-0 shadow-sm m-2 p-2 rounded" id="order" name="order">
                                        <option value="" selected disabled>Criterio de Orden</option>
                                        <option value="Rendimiento">Rendimiento</option>
                                        <option value="Materia Seca">Materia Seca</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-5">
                                    <label for="quantity">Número de Familias Recomendación</label>
                                    <input class="form-control border-0 shadow-sm m-2 p-2 rounded text-center" type="number" id="quantity"
                                        name="quantity" max="10" min="2" value="5" placeholder="Número de Familias Recomendadas">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-10">
                                    <label class="form-control-label px-3">¿Para qué país será el envío?<span
                                            class="text-danger"> *</span></label>
                                    <div class="form-group col-12 m-2 p-2">
                                        <select class="col-xl-12 col-lg-12 col-md-8 col-sm-6 js-example-theme-single" required name="country" id="country">
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->country_name }}">{{ $item->country_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-6 p-4">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm rounded-pill">Recomendación</button>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer" class="">
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Foreslab</span></strong>. Todos los derechos reservados
            </div>
            <div class="credits">
                Diseñado por el <a href="https://github.com/FranciscoAscue">Equipo Foreslab</a>
            </div>
        </div>
    </footer><!-- End Footer -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Inicializar Select2 -->
    <script>
        $(document).ready(function() {
            $('.js-example-theme-single').select2({
                placeholder: "Selecciona un país",
                allowClear: true
            });
        });
    </script>


    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

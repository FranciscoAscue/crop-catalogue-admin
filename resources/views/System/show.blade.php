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

    <header id="header" class="fixed-top bg-transparent">
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
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">

                    


                    <div class="card_ia card bg-light p-2 m-6">
                        <div class="p-2 row">
                            <div class="col-10">
                                <h2 class="text-center mb-4 text-secondary">Cultivos Caracterizados</h2>
                            </div>

                            <div class="col-2">
                                <a href="{{ route('recommend.system') }}" class="btn btn-secondary btn-lg btn-block shadow-sm rounded-pill">
                                    <i class="bi bi-arrow-return-left"></i> Regresar</a>
                            </div>
                        </div>
                        @if ($results && count($results) > 0)
                        <table class="table table-striped" id="tabla_id">
                            <thead>
                                <tr>
                                    <th scope="col">Cod.</th>
                                    <th scope="col">Parental Hembra</th>
                                    <th scope="col">Parental Macho</th>
                                    <th scope="col">Rendimiento (Tn/Ha)</th>
                                    <th scope="col">Acciones <i class="bi bi-info-circle me-1"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($results as $item)
                                    <tr>

                                        <td scope="row">CIP<b>{{ $item->family }}</b>.{{ $item->clone_number }}</td>
                                        <td scope="row">
                                            {{ $item->parent_female }}
                                        </td>
                                        <td scope="row">
                                            {{ $item->parent_male }}
                                        </td>
                                        <td scope="row">
                                            {{ $item->tuber_yield }}
                                        </td>
                                        <td>
                                            <a href=" " class="btn btn-primary">
                                                <i class="bi bi-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-warning">No hay familias caracterizadas!!!</p>
                        @endif

                        <div class="p-2 row">
                            <div class="col-10">
                                <h2 class="text-center mb-4 text-secondary">Familias No Caracterizadas</h2>
                            </div>

                            <div class="col-2">
                                 
                            </div>
                        </div>


                        @if ($difference && count($difference) > 0)
                            <div class="d-flex flex-wrap align-items-center justify-content-center">
                                @foreach ($difference as $item)
                                    <div class="p-2 m-2 bg-info">
                                        <b>{{ htmlspecialchars($item) }}</b>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-warning">No hay familias no caracterizadas.</p>
                        @endif

                    </div>
                </div>
            </div>
            <br>
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

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

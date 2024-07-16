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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="/assets/css/style.css" rel="stylesheet">

    <!--icon for quotes-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <style>
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

        .photo img {
            width: 100%;
            /* Ajusta esto al tamaño deseado */
            height: auto;
            /* Mantiene la proporción de la imagen */
            max-width: 300px;
            /* Tamaño máximo deseado */
            border-radius: 10px;
            /* Opcional: redondea las esquinas */
        }


        .star-rating {
            direction: rtl;
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 2em;
            padding: 0 5px;
        }

        .rating-star {
            color: #ffd700;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #ffd700;
        }

        .rating-star {
            animation: starAppear 0.5s ease-in-out;
        }

        .link-muted {
            color: #aaa;
        }

        .link-muted:hover {
            color: #1266f1;
        }

        .fade-out {
            transition: opacity 5s ease-out, transform 5s ease-out;
            opacity: 0.5;
            transform: translateX(-100%);
        }
    </style>

</head>


<body>
    <!-- ======= Header ======= -->

    @php
        $user = Auth::user();
    @endphp

    <header id="header" class="">
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

    <section class="sectionia">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">


                    <div class="card shadow p-3 m-3">
                        <div class="col-2">
                            <a href="{{ url()->previous() }}"
                                class="btn btn-primary btn-lg btn-block shadow-sm rounded-pill">
                                <i class="bi bi-arrow-return-left"></i></a>
                        </div>
                        <div class="photo">
                            <img src="/assets/Fotos/{{ $foto->photo }}">
                        </div>
                        <div>
                            <h2></h2>
                            <h4>{{ $clone->catalogue }} {{ $clone->population_group }}</h4>
                            <p><b>Parent Female :</b> {{ $clone->parent_female }} &emsp; <b>Parent Male:</b>
                                {{ $clone->parent_male }} </p>
                            <button class="btn btn-success">Add to shipment</button>
                            <button id="activarAlerta" class="btn btn-warning"><i class="bi bi-star"></i></button>
                        </div>
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

    <script>
        document.getElementById('activarAlerta').addEventListener('click', function() {
            Swal.fire({
                title: "Califica esta Acession (Clone)",
                html: `
                <div class="star-rating">
                    <input type="radio" id="5-stars" name="rating" value="5" />
                    <label for="5-stars" class="star">&#9733;</label>
                    <input type="radio" id="4-stars" name="rating" value="4" />
                    <label for="4-stars" class="star">&#9733;</label>
                    <input type="radio" id="3-stars" name="rating" value="3" />
                    <label for="3-stars" class="star">&#9733;</label>
                    <input type="radio" id="2-stars" name="rating" value="2" />
                    <label for="2-stars" class="star">&#9733;</label>
                    <input type="radio" id="1-star" name="rating" value="1" />
                    <label for="1-star" class="star">&#9733;</label>
                </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Enviar calificación',
                preConfirm: () => {
                    let rating = document.querySelector('input[name="rating"]:checked').value;
                    return rating;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/stars/{{ $user->id }}/{{ $clone->id }}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                rating: result.value
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const starsSection = document.getElementById('activarAlerta');
                            // Eliminar el contenido existente y agregar un icono de check
                            starsSection.innerHTML = '&#10003;'; // Código Unicode para el check mark
                            // Cambiar el color y estilo del botón si es necesario
                            starsSection.style.backgroundColor = '#4CAF50'; // Verde para indicar éxito
                            starsSection.style.color = '#fff'; // Texto blanco
                        })
                        .catch(error => {
                            Swal.fire('Error', 'No se pudo enviar la calificación', 'error');
                        });
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

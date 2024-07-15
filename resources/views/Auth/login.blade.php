<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Inicio de Sesion - Foreslab</title>
    <meta
        content="Foreslab es una empresa líder en la producción masiva de plantas nativas forestales, frutales y ornamentales utilizando la biotecnología vegetal. Nuestro enfoque se centra en la sostenibilidad y el desarrollo, brindando diversidad genética nativa para reforestación, restauración ecológica, compensación ambiental y actividades productivas sostenibles. Con nuestra experiencia y conocimiento técnico, ofrecemos servicios personalizados a instituciones públicas y privadas, asociaciones, proyectos de inversión, comunidades y la sociedad civil. Nos diferenciamos por nuestro compromiso con el uso responsable y ético de la biotecnología, así como por nuestros procesos ecológicos."
        name="description">
    <meta
        content="Foreslab, biotecnología, sostenibilidad, desarrollo, producción masiva, plantas nativas forestales, frutales, ornamentales, diversidad genética, reforestación, restauración ecológica, compensación ambiental, actividades productivas sostenibles, experiencia, conocimiento técnico, personalización de servicios, uso de procesos ecológicos, instituciones públicas, instituciones privadas, asociaciones, proyectos de inversión, comunidades, sociedad civil, responsabilidad, ética"
        name="keywords">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!--icon for quotes-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

</head>


<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top bg-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="https://test.foreslab.com/" class="logo"><img src="assets/img/logo2.webp" alt=""
                    class="img-fluid"></a>
            <!-- <h1 class="logo"><a href="index.html">Foreslab</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="/#about">Nosotros</a></li>

                    {{-- <li><a class="nav-link scrollto " href="/blog/">Blog</a></li> --}}

                    <!--<li><a class="nav-link scrollto" href="#team">Equipo</a></li>-->
                    <!-- <li><a class="nav-link scrollto" href="/#contact">Blog</a></li> -->
                    <li><a class="getstarted scrollto" href="/">Regresar a Home</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>

    </header><!-- End Header -->

    <section class="login">

        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Iniciar Sesion </span><span> Crear Cuenta</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Iniciar Sesion</h4>
                                                <form action='{{ route('authenticate') }}' method="POST"
                                                    role="form">
                                                    @csrf

                                                    <div class="form-group">
                                                        <input type="email" name="email"
                                                            class="form-style bg-secondary @if ($errors->has('email')) bg-danger @endif"
                                                            placeholder="Email" id="email" autocomplete="off"
                                                            value="{{ old('email') }}">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="password" name="password"
                                                            class="form-style bg-secondary  @if ($errors->has('password')) bg-danger @endif"
                                                            placeholder="Password" id="password" autocomplete="off">
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="btn btn-secondary mt-4 shadow">Iniciar
                                                            Sesion</button>
                                                        <p class="mb-0 mt-4 text-center"><a onclick="edit()"
                                                                class="link">Olvidaste tu contraseña?</a></p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <div class="section text-center pt-1 pb-2">
                                                <h4 class="mb-4 pb-3">Crear Cuenta</h4>



                                                <form action="{{ route('store') }}" role="form" method="POST">
                                                    @csrf
                                                    <div class="row form-group">
                                                        <input type="text" name="cname"
                                                            class="form-style bg-secondary  @if ($errors->has('cname')) bg-danger @endif"
                                                            placeholder="Nombre" id="cname" autocomplete="off"
                                                            value="{{ old('cname') }}">
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="email" name="cemail"
                                                            class="form-style bg-secondary @if ($errors->has('cemail')) bg-danger @endif"
                                                            placeholder="Email" id="cemail" autocomplete="off"
                                                            value="{{ old('cemail') }}">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="cpassword"
                                                            class="form-style bg-secondary  @if ($errors->has('cpassword')) bg-danger @endif"
                                                            placeholder="Password" id="passwordField"
                                                            autocomplete="off" onkeyup="checkPasswordStrength();">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>

                                                    <div class="form-group mt-2">
                                                        <input type="password" name="cpassword_confirmation"
                                                            class="form-style bg-secondary @if ($errors->has('cpassword')) bg-danger @endif"
                                                            placeholder="@if ($errors->has('cpassword')) {{ $errors->first('cpassword') }} @else Confirmar password @endif"
                                                            id="cpassword_confirmation" autocomplete="off">
                                                        <i class="input-icon uil uil-lock-alt"></i>
                                                    </div>
                                                    <div class="text-muted font-italic"><small>Seguridad de password :
                                                            <span id="passwordStrength"
                                                                class="text-success font-weight-700"></span></small>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="btn btn-secondary mt-4 shadow">Crear
                                                            Cuenta</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                @if ($errors->has('cname') || $errors->has('cemail') || $errors->has('cpassword'))
                    document.getElementById('reg-log').checked = true;
                @endif
            @endif
        });
    </script>

    <script>
        document.getElementById('passwordField').addEventListener('keyup', function() {
            var strengthBadge = document.getElementById('passwordStrength');
            var password = document.getElementById('passwordField').value;
            if (password.length === 0) {
                strengthBadge.innerHTML = '';
                strengthBadge.classList.remove('text-success', 'text-warning', 'text-danger');
            } else if (password.length < 6) {
                strengthBadge.innerHTML = 'muy débil';
                strengthBadge.classList.add('text-danger');
                strengthBadge.classList.remove('text-warning', 'text-success');
            } else if (password.length < 8) {
                strengthBadge.innerHTML = 'débil';
                strengthBadge.classList.add('text-warning');
                strengthBadge.classList.remove('text-success', 'text-danger');
            } else {
                strengthBadge.innerHTML = 'fuerte';
                strengthBadge.classList.add('text-success');
                strengthBadge.classList.remove('text-warning', 'text-danger');
            }
        });
    </script>

    <script>
        function edit() {

            Swal.fire({
                title: "Ingrese Email",
                input: "text",
                inputValue: email,
                showCancelButton: true,
                confirmButtonText: 'Recuperar Contraseña',
                preConfirm: (email) => {
                    return email;
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    fetch(`/password-recovery`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                email: result.value
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('No cumple criterios de cambio de contraseña');
                            }
                            return response.json();
                        })
                        .then(data => {
                            Swal.fire({
                                title: '¡Éxito!',
                                text: 'Se ha enviado un email para recuperar tu contraseña.',
                                icon: 'success'
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Correo No Encontrado',
                                text: 'No pudimos encontrar una cuenta asociada a ese correo electrónico. Por favor, verifica que lo has ingresado correctamente o regístrate si aún no tienes una cuenta.',
                                icon: 'warning',
                                confirmButtonText: 'Intentar de Nuevo'
                            });
                        });
                }
            });
        }
    </script>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

</body>

</html>

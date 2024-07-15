<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Recuperar Contraseña</title>
    <meta
        content="Foreslab es una empresa líder en la producción masiva de plantas nativas forestales, frutales y ornamentales utilizando la biotecnología vegetal. Nuestro enfoque se centra en la sostenibilidad y el desarrollo, brindando diversidad genética nativa para reforestación, restauración ecológica, compensación ambiental y actividades productivas sostenibles. Con nuestra experiencia y conocimiento técnico, ofrecemos servicios personalizados a instituciones públicas y privadas, asociaciones, proyectos de inversión, comunidades y la sociedad civil. Nos diferenciamos por nuestro compromiso con el uso responsable y ético de la biotecnología, así como por nuestros procesos ecológicos."
        name="description">
     <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.webp') }}" rel="icon">
    <link href="{{ asset('assets/img/favicon.webp') }}" rel="apple-touch-icon">

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

@if (session('status'))
    <div class="col-md-4">
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
            aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Foreslab</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Antención!</h4>
                            <p>{{ session('status') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link text-white ml-auto"
                            data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<body class="index-page login">
    <div class="container my-0 card recovery">
        <header class="text-center">
            <h2 class="p-3">Recuperación de contraseña</h2>
        </header>

        <section class="lead mt-0">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 text-center">
                    <p>Ingrese su contraseña y su confirmación</p>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
        
                        <div class="mb-3 row">
                            <label for="password" class="col-md-3 col-form-label text-md-end"> </label>
                             <div class="col-md-6">
                                <input type="email" id="email_address" class="form-control" placeholder="Email" name="email" required autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="mb-3 row">
                            <label for="password" class="col-md-3 col-form-label text-md-end"> </label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control"  placeholder="Password" name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-end"> </label>
                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="form-control" placeholder="Confirmar Password" name="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="mb-12 row">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        


    </div>

    
    <footer id="footer" class="bg-transparent">

        <div class="footer-top">

            <div class="container">

                <div class="row justify-content-center">
     
                    <div class="col-lg-3 justify-content-center">
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
     <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    
</body>

</html>

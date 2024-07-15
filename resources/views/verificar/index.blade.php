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


    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <div class="animated-text">
                        <h1>Verificación de Email Requerida</h1>
                        <h2> Antes de continuar, por favor verifica tu dirección de correo electrónico. Hemos enviado un
                            enlace de verificación a tu correo electrónico</h2>
                            <div style="display: flex; align-items: center;">
                                <h2 style="margin-right: 10px; flex: 0.9;">Si no has recibido el correo electrónico:</h2>
                                <form action="{{ route('verification.resend') }}" method="POST" style="flex: 0.3;">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Solicitar Otro</button>
                                </form>
                            </div>
                                          
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="assets/img/login.webp" class="img-fluid animated" alt="hero" loading="lazy">
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
</div>
  
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

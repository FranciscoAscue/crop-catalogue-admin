<?php
session_set_cookie_params([
    'lifetime' => 7200, // Tiempo de vida de la cookie en segundos (2 horas)
    'path' => '/system/',
    'domain' => 'https://foreslab.com/',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
  ]);
session_start();
include("./database.php");
if ($_POST) {


    $sentencia = $conn->prepare("SELECT * FROM `users` 
    WHERE `correo`=:usuario AND `password`=:pass ;");

    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":pass", $pass);
    $sentencia->execute();
    $lista_usuario = $sentencia->fetch(PDO::FETCH_LAZY);
    if ($lista_usuario["correo"] != "") {
        $_SESSION['usuario'] = $lista_usuario['correo'];
        $_SESSION['logueado'] = true;
        header("Location:index.php");
    } else {
        $mensaje = "El usuario o contraseña es incorrecto";
    }
}


?>



<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/favicon.png" rel="apple-touch-icon">

    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <header>
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center justify-content-between">

                <a href="../" class="logo"><img src="../assets/img/logo2.png" alt="" class="img-fluid"></a>
                <!-- <h1 class="logo"><a href="index.html">Foreslab</a></h1> -->
                <!-- Uncomment below if you prefer to use an image logo -->

                <nav id="navbar" class="navbar">
                    <ul>

                        <!--<li><a class="nav-link scrollto" href="#team">Equipo</a></li>-->
                        <!-- <li><a class="nav-link scrollto" href="<?php echo $url_base; ?>#contact">Blog</a></li> -->
                        <li><a class="getstarted scrollto" href="../">Regresar</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </header><!-- End Header -->
    </header>
    <main>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="../assets/img/login.png" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-4">
                        <form method="post">

                            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3"> </p>

                                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                    <p class="lead fw-normal mb-0 me-3">Ingrese al Sistema</p>



                                </div>

                            </div>
                            <br />
                            <?php if (isset($mensaje)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong><?php echo $mensaje; ?></strong>
                                </div>
                            <?php } ?>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Ingrese un usuario valido" />
                                <label class="form-label" for="usuario">Usuario</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Ingrese contraseña" />
                                <label class="form-label" for="password">Contraseña</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->


                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Ingresar</button>

                                </div>

                        </form>
                    </div>
                </div>
            </div>




</body>

</html>

</section>


</main>
<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>Foreslab</span></strong>. Todos los derechos reservados
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
            Diseñado por el <a href="https://github.com/FranciscoAscue">Equipo Foreslab</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
<!-- place footer here -->
</footer>
<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>
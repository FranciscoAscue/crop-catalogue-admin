<?php
error_reporting(0);

$url_base = 'https://foreslab.com/';
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location:" . $url_base . "system/login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>System Foreslab</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="<?php echo $url_base; ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo $url_base; ?>assets/img/favicon.png" rel="apple-touch-icon">
    <link href="<?php echo $url_base; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url_base; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo $url_base; ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo $url_base; ?>assets/css/style.css" rel="stylesheet">


    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <nav id="navbar" class="navbar">
        <ul>
            <li class="nav-item">
            <a href="<?php echo $url_base; ?>system" class="logo"><img width="150px" style="padding : 20px;" src="<?php echo $url_base; ?>assets/img/logo2.png" alt="" ></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>system/modules/registro/index.php">Blog Entradas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>system/modules/tag/index.php">Tag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>system/modules/user/index.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base; ?>system/cerrar.php"">Cerrar Sesion</a>
            </li>
        </ul>
    </nav>
    <br />
    <main class=" container">

                    <?php if (isset($_GET['mensaje'])) { ?>
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "<?php echo $_GET['mensaje']; ?>"
                            });
                        </script>
                    <?php } ?>
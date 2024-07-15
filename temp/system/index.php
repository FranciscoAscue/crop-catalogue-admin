<?php include("templates/header.php"); ?>

  <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Bienvenid@ al sistema</h1>
          <p class="col-md-8 fs-4"> <?php echo $_SESSION['usuario'];?></p>
          <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>system/modules/registro/build.php"
            role="button">Agregar Nuevo Blog</a>
            <a name="" id="" class="btn btn-info" href=""
            role="button">Agregar Nuevo Producto</a>
        </div>
      </div>

<?php include("templates/footer.php"); ?>

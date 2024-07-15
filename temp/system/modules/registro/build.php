<?php include("../../database.php");
$sentencia2 = $conn->prepare("SELECT * FROM `tag`;");
$sentencia2->execute();
$lista_tags = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conn->prepare("SELECT * FROM `users`;");
$sentencia->execute();
$lista_autores = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_POST) {

  $titulo = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
  $foto = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "");
  $tag = (isset($_POST['tag']) ? $_POST['tag'] : "");
  $autor = (isset($_POST['autor']) ? $_POST['autor'] : "");
  $blog = (isset($_POST['editor1']) ? $_POST['editor1'] : "");
  $date = (isset($_POST['date']) ? $_POST['date'] : "");

  $sentencia = $conn->prepare("INSERT INTO 
    `registro` (`id`, `titulo`, `foto`, `tag`, `autor`, `blog`, `fecha`)
    VALUES (null,:titulo,:foto,:tag,:autor,:blog,:fecha );");

  $fecha = new DateTime();
  $nombre_archivo_foto = ($foto != '') ? $fecha->getTimestamp() . "_" . $_FILES['foto']['name'] : "";
  $tmp_foto = $_FILES["foto"]["tmp_name"];
  if ($tmp_foto != "") {
    move_uploaded_file($tmp_foto, "../../../assets/img/blog/" . $nombre_archivo_foto);
  }

  $sentencia->bindParam(":titulo", $titulo);
  $sentencia->bindParam(":foto", $nombre_archivo_foto);
  $sentencia->bindParam(":tag", $tag);
  $sentencia->bindParam(":autor", $autor);
  $sentencia->bindParam(":blog", $blog);
  $sentencia->bindParam(":fecha", $date);

  $sentencia->execute();
  
  $mensaje = "Blog creado!";
  header("Location:index.php?mensaje=" . $mensaje);
}
?>


<?php include("../../templates/header.php"); ?>

<div class="card">
  <div class="card-header">
    Datos de entrada de Blog
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId">
      </div>
      <div>
        <textarea name="editor1" name="editor1" id="editor1" rows="30" \
        cols="100" require></textarea>
        <script src="../../ckeditor/build/ckeditor.js"></script>
        <script>
          ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
              console.error(error);
            });
        </script>
  
      </div>
      <br>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
      </div>

      <div class="mb-3">
        <label for="tag" class="form-label">Tag</label>
        <select class="form-select form-select-sm" name="tag" id="tag">
          <option value="NULL" selected><i>Seleccionar Uno</i></option>
          <?php foreach ($lista_tags as $tags) { ?>
            <option value="<?php echo $tags["tag"]; ?>">
              <?php echo $tags["tag"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <select class="form-select form-select-sm" name="autor" id="autor">
          <option value="NULL" selected>Seleccionar Uno</option>
          <?php foreach ($lista_autores as $autores) { ?>
            <option value="<?php echo $autores["nombre"]; ?>">
              <?php echo $autores["nombre"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="date" class="form-label">Fecha</label>
        <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelpId" placeholder="abc@mail.com">
      </div>

      <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>system/modules/registro/index.php" role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
    Blogs
  </div>
</div>
<br>  
<?php include("../../templates/footer.php"); ?>
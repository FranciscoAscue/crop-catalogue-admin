<?php
include("../../database.php");

$sentencia = $conn->prepare("SELECT * FROM `users`");
$sentencia->execute();
$lista_usuario = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia2 = $conn->prepare("SELECT * FROM `tag`;");
$sentencia2->execute();
$lista_tags = $sentencia2->fetchAll(PDO::FETCH_ASSOC);

// recuperar datos de la base de datos para mostrar en el formulario
if (isset($_GET['textID'])) {
  $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
  $sentencia = $conn->prepare("SELECT * FROM `registro` where id = :id ;");

  $sentencia->bindParam(":id", $textID);
  $sentencia->execute();
  $registro = $sentencia->fetch(PDO::FETCH_LAZY);

  $titulo = $registro["titulo"];
  $foto = $registro["foto"];
  $tag = $registro["tag"];
  $autor = $registro["autor"];
  $blog = $registro["blog"];
  $fecha = $registro["fecha"];
}

// Guardar nuesvos datos (UPDATE)

if ($_POST) {

  $titulo_up = (isset($_POST['titulo']) ? $_POST['titulo'] : "");
  $tag_up = (isset($_POST['tag']) ? $_POST['tag'] : "");
  $autor_up = (isset($_POST['autor']) ? $_POST['autor'] : "");
  $blog_up = (isset($_POST['editor1']) ? $_POST['editor1'] : "");
  $date_up = (isset($_POST['date']) ? $_POST['date'] : "");

  
  $sentencia = $conn->prepare("UPDATE `registro` SET `titulo` = :titulo,
   `tag` = :tag, `autor` = :autor, `blog` = :blog, `fecha` = :fecha 
   WHERE `registro`.`id` = :id;");

  $sentencia->bindParam(":titulo", $titulo_up);
  $sentencia->bindParam(":tag", $tag_up);
  $sentencia->bindParam(":autor", $autor_up);
  $sentencia->bindParam(":blog", $blog_up);
  $sentencia->bindParam(":fecha", $date_up);
  $sentencia->bindParam(":id", $textID);
  $sentencia->execute();


  $foto_post = (isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "");
  $fecha_name = new DateTime();
  
  $nombre_archivo_foto = ($foto_post != '') ? $fecha_name->getTimestamp() . "_" . $_FILES['foto']['name'] : "";
  $tmp_foto = $_FILES["foto"]["tmp_name"];
  if ($tmp_foto != "") {
    move_uploaded_file($tmp_foto, "../../../assets/img/blog/" . $nombre_archivo_foto);
    
    $sentencia = $conn->prepare("SELECT foto FROM `registro` WHERE id=:id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $foto_file_name = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($foto_file_name["foto"]) && $foto_file_name["foto"]!=""){
        if(file_exists("../../../assets/img/blog/".$foto_file_name["foto"])){
            unlink("../../../assets/img/blog/".$foto_file_name["foto"]);
        }
    }

    $sentencia = $conn->prepare("UPDATE `registro` SET `foto` = :foto 
    WHERE `registro`.`id` = :id;");
    $sentencia->bindParam(":foto", $nombre_archivo_foto);
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();

  }

  $mensaje="Blog actualizado!";
  header("Location:index.php?mensaje=".$mensaje);
}

?>

<?php include("../../templates/header.php"); ?>

<div class="card">
  <div class="card-header">
    Editar Blog
  </div>
  <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" value="<?php echo $textID; ?>" class="form-control" readonly name="id" id="id"
          aria-describedby="helpId" placeholder="">
      </div>
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" value="<?php echo $titulo; ?>" class="form-control" name="titulo" id="titulo"
          aria-describedby="helpId" placeholder="">
      </div>

      <div>
        <textarea name="editor1" name="editor1" id="editor1" rows="30" cols="100" require>
          <?php echo $blog;?>
        </textarea>
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
        <label for="foto" class="form-label">Foto : </label>
        <img width="40" src="../../../assets/img/blog/<?php echo $foto; ?>" alt="">
        <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
      </div>


      <div class="mb-3">
        <label for="puesto" class="form-label">tag</label>
        <select class="form-select form-select-sm" name="tag" id="tag">
          <?php foreach ($lista_tags as $tags) { ?>
            <option <?php echo ($tag == $tags["tag"]) ? "selected" : ""; ?>
              value="<?php echo $tags["tag"]; ?>">
              <?php echo $tags["tag"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="puesto" class="form-label">Autor</label>
        <select class="form-select form-select-sm" name="autor" id="autor">
          <?php foreach ($lista_usuario as $usuario) { ?>
            <option <?php echo ($autor == $usuario["nombre"]) ? "selected" : ""; ?>
              value="<?php echo $usuario["nombre"]; ?>">
              <?php echo $usuario["nombre"]; ?>
            </option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Fecha</label>
        <input type="date" class="form-control" value="<?php echo $fecha; ?>" name="date" id="date" aria-describedby=""
          placeholder="">
      </div>

      <button type="submit" class="btn btn-success">Agregar</button>
      <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>system/modules/registro/index.php"
        role="button">Cancelar</a>
    </form>
  </div>
  <div class="card-footer text-muted">
    Blogs
  </div>
</div>
<br>
<?php include("../../templates/footer.php"); ?>
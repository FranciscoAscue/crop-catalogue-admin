<?php include("../../database.php");
error_reporting(0);

if($_POST){

    $nombretag = (isset($_POST['tag'])?$_POST['tag']:"");

    $sentencia = $conn -> prepare("INSERT INTO `tag`(`id_tag`, `tag`) 
    VALUES (null,:tag);");

    $sentencia -> bindParam(":tag", $nombretag);
    $sentencia -> execute();
    $mensaje="Tag Agregado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Crear Puesto
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="tag" class="form-label">Nombre Tag</label>
              <input type="text"
                class="form-control" name="tag" id="tag" 
                aria-describedby="helpId" placeholder="Biodiversidad">
            </div>

        
           <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-danger" 
            href="<?php echo $url_base;?>system/modules/tag/index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Tags
    </div>
</div>

<br>
<?php include("../../templates/footer.php"); ?>


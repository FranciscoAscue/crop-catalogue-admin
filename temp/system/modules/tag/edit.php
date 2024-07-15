<?php include("../../database.php");

if (isset($_GET['textID'])) {
    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("SELECT * FROM `tag` where id_tag = :id ;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $tags = $sentencia->fetch(PDO::FETCH_LAZY);
    $tag = $tags["tag"];
}

if ($_POST) {
    $id = (isset($_POST['id']) ? $_POST['id'] : "");
    $tag = (isset($_POST['tag']) ? $_POST['tag'] : "");
    $sentencia = $conn->prepare("UPDATE `tag` SET `tag` = :tag
    WHERE `tag`.`id_tag` = :id;");
    $sentencia->bindParam(":tag", $tag);
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    $mensaje="Tag Actualizado!";
    header("Location:index.php?mensaje=".$mensaje);}

?>


<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Editar tags
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" value="<?php echo $textID; ?>" 
                 class="form-control" readonly name="id"
                    id="id" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="tag" class="form-label">Nombre Tag</label>
                <input type="text" value="<?php echo $tag; ?>" class="form-control" name="tag"
                    id="tag" aria-describedby="helpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-danger" href="<?php echo $url_base; ?>system/modules/tag/index.php"
                role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
        Tags
    </div>
</div>
<br>
<?php include("../../templates/footer.php"); ?>
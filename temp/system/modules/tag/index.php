<?php include("../../database.php");
error_reporting(0);

$sentencia = $conn->prepare("SELECT * FROM `tag`");
$sentencia->execute();
$lista_tags = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if ($_GET['textID']) {

    $textID = (isset($_GET['textID']) ? $_GET['textID'] : "");
    $sentencia = $conn->prepare("DELETE FROM `tag` WHERE id_tag = :id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $mensaje="Tag Eliminado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" 
        href="<?php echo $url_base; ?>system/modules/tag/build.php"
            role="button">Agregar Tag</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Tag</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($lista_tags as $tags) { ?>
                        <tr class="">
                            <td scope="row">
                                <?php echo $tags["id_tag"]; ?>
                            </td>
                            <td>
                                <?php echo $tags["tag"]; ?>
                            </td>
                            <td><a name="" id="" class="btn btn-success" href="edit.php?textID=<?php
                            echo $tags['id_tag']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger"
                                    href="javascript:borrar(<?php echo $tags['id_tag']; ?>)"
                                    role="button">Eliminar</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div class="card-body">
    <div class="card-footer text-muted">
        Tags
    </div>
</div>
<br>
<?php include("../../templates/footer.php"); ?>
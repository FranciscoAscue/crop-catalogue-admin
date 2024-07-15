<?php include("../../database.php");

$sentencia = $conn->prepare("SELECT * FROM `registro`");

$sentencia->execute();
$lista_resgistro = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['textID'])) {

    $textID = (isset($_GET['textID']))?$_GET['textID'] : "";
    $sentencia = $conn->prepare("SELECT foto FROM `registro` WHERE id=:id;");
    $sentencia->bindParam(":id", $textID);
    $sentencia->execute();
    $lista_files_name = $sentencia->fetch(PDO::FETCH_LAZY);
    if(isset($lista_files_name["foto"]) && $lista_files_name["foto"]!=""){
        if(file_exists("../../../assets/img/blog/".$lista_files_name["foto"])){
            unlink("../../../assets/img/blog/".$lista_files_name["foto"]);
        }
    }

    $sentencia_delete = $conn->prepare("DELETE FROM `registro` WHERE id=:id;");
    $sentencia_delete->bindParam(":id", $textID);
    $sentencia_delete->execute();
    $mensaje="Blog Eliminado!";
    header("Location:index.php?mensaje=".$mensaje);
}
?>

<?php include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="<?php echo $url_base; ?>system/modules/registro/build.php"
            role="button">Agregar Nuevo Blog</a>
    </div>
    <div class="table-responsive-sm">
        <table class="table" id="tabla_id">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_resgistro as $registro) { ?>

                    <tr class="">
                        <td scope="row">
                            <?php echo $registro["id"]; ?>
                        </td>
                        <td>
                            <?php echo $registro["titulo"]; ?>
                        </td>
                        <td> <img width="40" 
                        src="<?php echo $url_base; ?>assets/img/blog/<?php 
                        echo $registro["foto"]; ?>" 
                        class="img-fluid rounded" alt=""></td>
                        <td>
                            <?php echo $registro["tag"]; ?></a>
                        </td>
                        <td>
                            <?php echo $registro["autor"]; ?>
                        </td>
                        <td>
                            <?php echo $registro["fecha"]; ?>
                        </td>
                        <td>
            
                            <a name="" id="" class="btn btn-info"
                                href="<?php echo $url_base; ?>system/modules/registro/edit.php?textID=<?php echo $registro["id"]; ?>"
                                role="button">Editar</a>

                            <a name="" id="" class="btn btn-danger"
                                href="javascript:borrar(<?php echo $registro['id']; ?>)"
                                role="button">Eliminar</a>
                        </td>
                    </tr>

                <?php }
                ; ?>

            </tbody>
        </table>
    </div>

    <div class="card-footer text-muted">
        Blogs
    </div>
</div>
<br>

<?php include("../../templates/footer.php"); ?>
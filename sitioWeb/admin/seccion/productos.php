<?php include("../template/cabecera.php");?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtName = (isset($_POST['txtName'])) ? $_POST['txtName'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../config/bd.php");

switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtName);
        $sentenciaSQL->bindParam(':imagen', $txtImagen);
        $sentenciaSQL->execute();
        /*
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre,imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtName);

        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
        $tmpImagen=$_FILES["txtImagen"]["name"];


        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();

        <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>

        */
        break;

    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtName);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if($txtImagen!=""){
            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $txtImagen);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        break;

    case "Cancelar":

        break;
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
        echo $txtName;
        $txtName=$producto['nombre'];
        $txtImagen=$producto['imagen'];
        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        break;


       
}
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de libro
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label>ID: </label>
                    <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>
                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" class="form-control" value="<?php echo $txtName; ?> "name="txtName" id="txtName" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Imagen: </label>
                    <input type="file" class="form-control" value="<?php echo $txtImagen; ?>" name="txtImagen" id="txtImagen">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th> <!-- Nueva columna para botones -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $productos) {
            ?>
            <tr>
                <td><?php echo $productos['id']; ?></td>
                <td><?php echo $productos['nombre']; ?></td>
                <td><?php echo $productos['imagen']; ?></td>
                <td>
                    <!-- Botones para Borrar y Seleccionar -->
                    <form method="POST">
                        <input type="hidden" name="txtID" value="<?php echo $productos['id']; ?>">
                        <button type="submit" name="accion" value="Borrar" class="btn btn-danger btn-sm">Borrar</button>
                        <button type="submit" name="accion" value="Seleccionar" class="btn btn-primary btn-sm">Seleccionar</button>
                    </form>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php");?>

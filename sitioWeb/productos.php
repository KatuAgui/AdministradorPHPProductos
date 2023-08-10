<?php
include("template/cabecera.php");
include("obtener_productos.php"); // Incluimos el archivo que obtiene los productos de la BD
?>

<div class="row">
    <?php foreach($listaProductos as $productos) { ?>
    <div class="col-md-3">
        <div class="card">
            <img class="card-img-top" src="./img/<?php echo $productos['imagen']; ?>" alt="">
            <div class="card-body">
                <h4 class="card-title"><?php echo $productos['nombre']; ?></h4>
                <p class="card-title"><?php echo $productos['imagen']; ?></p>
                <a name="" id="" class="btn btn-primary" href="#" role="button">Ver más</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include("template/pie.php"); ?>


</div>
<div class="col-md-3">

</div>

<?php include("template/pie.php");?>
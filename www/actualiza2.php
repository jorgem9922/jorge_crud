<?php 
include "header.php";
include "conexion.php";

mysqli_Select_db($conexion, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT * FROM productos WHERE id_producto='$productoactualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de un producto
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $productoactualizar;?>&nombreimagen==<?php echo $registro[4];?>" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Identificador</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required value="<?php echo $registro[0];?>" aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required value="<?php echo $registro[1];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Descripcion</label>
                          <textarea class="form-control" name="descripcion" id="descripcion" rows="3"> <?php echo $registro[2];?> </textarea>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Precio</label>
                          <input type="number" class="form-control" name="precio" id="precio" required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce el precio">
                          <small id="helpId" class="form-text text-muted">Precio</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Imagen Antigua</label>
                          <?php  echo '<img width="100px" height="100px" src="imagenes/'.$registro[4].'">';?>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Imagen Nueva</label>
                          <input type="file"
                            class="form-control" name="imagen" id="imagen" required accept="image/*">
                          <small id="helpId" class="form-text text-muted">Imagen</small>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </div>

                        

                        </form>

                    </div>
                </div>

            <a href="actualiza.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "footer.php"
?>

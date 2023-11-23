<?php include "conexion.php";?>
<?php
    mysqli_select_db($conexion, "dreams3");
    $id_fabricante=$_POST["id_fabricante"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $codigo_postal = $_POST["codigo_postal"];
    $correo_electronico =$_POST ["correo_electronico"];
    //var_dump ($_FILES['imagen']);
    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    if(isset($_FILES['fotografia'])){
        $errores=0;
        $nombreArchivo = $_FILES['fotografia']['name'];
        $filesize = $_FILES['fotografia']['size'];
        $directorioTemp = $_FILES['fotografia']['tmp_name'];
        $tipoArchivo = $_FILES['fotografia']['type'];
        $arrayArchivo = pathinfo ($nombreArchivo);
        $extension = $arrayArchivo['extension'];

       
        if(!in_array($extension, $extensionesValidas)) {
            echo "Extensión no válida";
            $errores=1;
        }
        if($filesize > $max_file_size){
            echo "La imagen debe de tener un tamaño inferior";
            $errores= 1;
        }

        if ($errores == 0 ){

            $nombreCompleto = $directorioSubida.$nombreArchivo;
            //echo "Miguel: " . $nombreCompleto;
            move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }
    $insertar="INSERT INTO `fabricantes` (`id_fabricante`, `nombre`, `telefono`, `codigo_postal`, `correo_electronico`,`fotografia`) VALUES ($id_fabricante,'$nombre', $telefono, $codigo_postal, '$correo_electronico', '$nombreArchivo')";
    mysqli_query($conexion, $insertar);
   
     header("Location:alta_ok.php");?>

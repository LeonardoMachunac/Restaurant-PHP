<?php 

include ("../../bd.php");

if(isset($_GET['txtID'])){  //preguntamos

    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:""; //si es asi buscamos ese ID

    //proceso de borrado que busque la imagen y la pueda borrar
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_menu` WHERE ID=:id"); //seleccionamos estos colaboradores
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);  //aislamos ese resultado //2recupera el archivo

    if(isset($registro_foto['foto'])){ //1 valida si hay algo si existe el archivo
        if(file_exists("../../../img/menu/".$registro_foto['foto'])){ //3. si existe en la carpeta
            unlink("../../../img/menu/".$registro_foto['foto']);//4 borramos
        }

    }



//borrado en la base de datos
$sentencia=$conexion->prepare("DELETE  FROM  tbl_menu  WHERE ID=:id");
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();

header("Location:index.php"); //redireccionamos


}    

$sentencia=$conexion->prepare("SELECT *  FROM  `tbl_menu`");
$sentencia->execute();
$lista_menu= $sentencia->fetchAll(PDO::FETCH_ASSOC);



?>

<?php include ("../../templates/header.php"); ?>

<br/>
    <div class="card">
        <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Menu</a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ingredientes</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista_menu as $registro){?>

                        <tr class="">
                            <td><?php echo $registro["ID"];?></td>
                            <td><?php echo $registro["nombre"];?></td>
                            <td><?php echo $registro["ingredientes"];?></td>
                            <td>
                            <img src="../../../img/menu/<?php echo $registro["foto"];?>" alt="" width="50" srcset="">
                            </td>
                            <td><?php echo $registro["precio"];?></td>
                            <td>
                            <a name=""id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['ID'] ?>"  role="button">Editar</a>
                            <a name=""id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registro['ID']; ?>" role="button">Borrar</a>
                        </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
    




<?php include ("../../templates/footer.php"); ?>
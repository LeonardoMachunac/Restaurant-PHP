<?php  
    include ("../../bd.php");

    $sentencia=$conexion->prepare("SELECT * FROM `tbl_banners`");
    $sentencia->execute();
    $lista_banners= $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // print_r($lista_banners);


    include  ("../../templates/header.php");
?>

</br>

    <div class="card">

        <div class="card-header">
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
        </div>

        <div class="card-body">
            <div
                class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Enlace</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php
                            foreach ($lista_banners as $key => $value) {  ?>
                                <tr class="">

                            <td scope="row">1</td>
                            <td><?php echo $value['titulo']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['link']; ?></td>
                            <td>
                                <a name=""id="" class="btn btn-info" href="editar.php"  role="button">Editar</a>
                                <a name=""id="" class="btn btn-danger" href="#" role="button">Borrar</a>
                                
                            </td>
                            </tr>
                                <?php } ?>

                        
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    


<?php include ("../../templates/footer.php"); ?>





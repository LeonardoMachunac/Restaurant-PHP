<?php 
    include ("../../bd.php");

    if($_POST){

        $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";

        $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
        $ingredientes=(isset($_POST["ingredientes"]))?$_POST["ingredientes"]:"";
        // $foto=(isset($_POST["foto"]))?$_POST["foto"]:"";
        $precio=(isset($_POST["precio"]))?$_POST["precio"]:"";

        $sentencia=$conexion->prepare("UPDATE tbl_menu 
                SET 
                nombre=:nombre, 
                ingredientes=:ingredientes,
                -- foto=:foto,
                precio=:precio
                WHERE id=:id");

        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":ingredientes",$ingredientes);
        $sentencia->bindParam(":precio",$precio);
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();



            //proceso de actualizacion de foto
            $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
            $tmp_foto=$_FILES["foto"]["tmp_name"];
            
            if($foto!=""){

                $fecha_foto= new DateTime();
                $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
                move_uploaded_file($tmp_foto,"../../../img/menu/".$nombre_foto);
    
    
                $sentencia=$conexion->prepare("SELECT * FROM `tbl_menu` WHERE ID=:id"); //seleccionamos estos colaboradores
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
    
                $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);  //aislamos ese resultado //2recupera el archivo
    
                if(isset($registro_foto['foto'])){ //1 valida si hay algo si existe el archivo
                    if(file_exists("../../../img/menu/".$registro_foto['foto'])){ //3. si existe en la carpeta
                        unlink("../../../img/menu/".$registro_foto['foto']);//4 borramos
                    }
                }

                $sentencia=$conexion->prepare("UPDATE `tbl_menu` 
                SET 
                foto=:foto 
                WHERE ID=:id");

                $sentencia->bindParam(":foto",$nombre_foto);
                $sentencia->bindParam(":id",$txtID);
                $sentencia->execute();
                
    }
    header("Location:index.php");
}

    if(isset($_GET['txtID'])){
        $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

        $sentencia=$conexion->prepare("SELECT * FROM  `tbl_menu` WHERE ID=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        //recuoperacion  de datos (asignar al formulario)
        $nombre=$registro["nombre"];
        $ingredientes=$registro["ingredientes"];
        $foto=$registro["foto"];
        $precio=$registro["precio"];
    }
    include ("../../templates/header.php"); 

    ?>

<br/>

<div class="card">
    <div class="card-header">
        Menu del Dia

    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
        <label for="" class="form-label">ID:</label>
        <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID"id="txtID"aria-describedby="helpId" placeholder=""/>
        
    </div>
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text"class="form-control" value="<?php echo $nombre; ?>" name="nombre"id="nombre"aria-describedby="helpId"placeholder="Nombre:"/>
            
        </div>

        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes   (Separados por Comas):</label>
            <input type="text"class="form-control" value="<?php echo $ingredientes; ?>"  name="ingredientes"id="ingredientes"aria-describedby="helpId"placeholder="Ingredientes:"/>
            
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <br/>
            <img width="50" src="../../../img/menu/<?php echo $foto;?>"/>
            <input type="file" class="form-control" value="<?php echo $foto; ?>" name="foto"id="foto"placeholder=""aria-describedby=""/>
            
        </div>


        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="text"class="form-control" value="<?php echo $precio; ?>" name="precio"id="precio"aria-describedby="helpId"placeholder="Precio:"/>
            
        </div>


        <button type="submit" class="btn btn-success">Modificar Comida </button> 
        <a name=""id=""class="btn btn-primary"href="index.php"role="button">Cancelar</a>
        
        

        </form>
        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>






<?php include ("../../templates/footer.php"); ?>
<?php 
include ("../../bd.php");
    if($_POST){

        $txtID=(isset($_POST["txtID"]))?$_POST["txtID"]:"";
        $titulo=(isset($_POST['titulo']))?$_POST['titulo']:""; 
        $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:""; 
        $linkfacebook=(isset($_POST['linkfacebook']))?$_POST['linkfacebook']:""; 
        $linkinstagram=(isset($_POST['linkinstagram']))?$_POST['linkinstagram']:""; 
        $linklinkedin=(isset($_POST['linklinkedin']))?$_POST['linklinkedin']:"";
        
        $sentencia=$conexion->prepare("UPDATE `tbl_colaboradores` 
                SET 
                titulo=:titulo, 
                descripcion=:descripcion,
                linkfacebook=:linkfacebook,
                linkinstagram=:linkinstagram,
                linklinkedin=:linklinkedin
                WHERE ID=:id");

        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":descripcion",$descripcion);
        $sentencia->bindParam(":linkfacebook",$linkfacebook);
        $sentencia->bindParam(":linkinstagram",$linkinstagram);
        $sentencia->bindParam(":linklinkedin",$linklinkedin);
        $sentencia->bindParam(":id",$txtID);

        $sentencia->execute();


             //proceso de actualizacion de foto
                $foto=(isset($_FILES['foto']["name"]))?$_FILES['foto']["name"]:"";
                $tmp_foto=$_FILES["foto"]["tmp_name"];
                
                if($foto!=""){

                    $fecha_foto= new DateTime();
                    $nombre_foto=$fecha_foto->getTimestamp()."_".$foto;
                    move_uploaded_file($tmp_foto,"../../../img/colaboradores/".$nombre_foto);
        
        
                    $sentencia=$conexion->prepare("SELECT * FROM `tbl_colaboradores` WHERE ID=:id"); //seleccionamos estos colaboradores
                    $sentencia->bindParam(":id",$txtID);
                    $sentencia->execute();
        
                    $registro_foto=$sentencia->fetch(PDO::FETCH_LAZY);  //aislamos ese resultado //2recupera el archivo
        
                    if(isset($registro_foto['foto'])){ //1 valida si hay algo si existe el archivo
                        if(file_exists("../../../img/colaboradores/".$registro_foto['foto'])){ //3. si existe en la carpeta
                            unlink("../../../img/colaboradores/".$registro_foto['foto']);//4 borramos
                        }
                    }

                    $sentencia=$conexion->prepare("UPDATE `tbl_colaboradores` 
                    SET 
                    foto=:foto 
                    WHERE ID=:id");
    
                    $sentencia->bindParam(":foto",$nombre_foto);
                    $sentencia->bindParam(":id",$txtID);
                    $sentencia->execute();
        }
    }





    if(isset($_GET['txtID'])){
        $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";

        $sentencia=$conexion->prepare("SELECT * FROM  `tbl_colaboradores` WHERE ID=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        //recuoperacion  de datos (asignar al formulario)
        $titulo=$registro["titulo"];
        $descripcion=$registro["descripcion"];
        $foto=$registro["foto"];

        $linkfacebook=$registro["linkfacebook"];
        $linkinstagram=$registro["linkinstagram"];
        $linklinkedin=$registro["linklinkedin"];
    }

include ("../../templates/header.php"); ?>

<br/>
<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data"> <!--para adjuntar la foto-->

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text"class="form-control" value="<?php echo $txtID;?>" name="txtID"id="txtID" aria-describedby="helpId"placeholder="Escribe el titulo del banner"/>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label><br/>
                <img width="50" src="../../../img/colaboradores/<?php echo $foto;?>"/>
                <input type="file" class="form-control" name="foto" id="foto"placeholder=" "aria-describedby="fileHelpId"/>
            
            </div>
            
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control"name="titulo" value="<?php echo $txtID;?>" id="titulo" aria-describedby="helpId" placeholder=""/>
            
            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input type="text"class="form-control"name="descripcion" value="<?php echo $descripcion;?>" id="descripcion"aria-describedby="helpId"placeholder=""/>
                
            </div>
            
            <div class="mb-3">
                <label for="linkfacebook" class="form-label">Facebook:</label>
                <input type="text"class="form-control"name="linkfacebook" value="<?php echo $linkfacebook;?>" id="linkfacebook"aria-describedby="helpId" placeholder=""/>
                
            </div>
            
            <div class="mb-3">
                <label for="linkinstagram" class="form-label">Instagram:</label>
                <input type="text"class="form-control"name="linkinstagram" value="<?php echo $linkinstagram;?>" aria-describedby="helpId" placeholder=""/>
                
            </div>

            <div class="mb-3">
                <label for="linklinkedin" class="form-label">Linkedin:</label>
                <input type="text"class="form-control"name="linklinkedin" value="<?php echo $linklinkedin;?>"aria-describedby="helpId" placeholder=""/>
                
            </div>

            <button type="submit" class="btn btn-success">Modificar Colaborador </button> </br></br>
            <a name=""id=""class="btn btn-primary"href="index.php"role="button">Cancelar</a>
            
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include ("../../templates/footer.php"); ?>
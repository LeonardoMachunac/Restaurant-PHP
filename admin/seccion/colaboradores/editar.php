<?php 
include ("../../bd.php");
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
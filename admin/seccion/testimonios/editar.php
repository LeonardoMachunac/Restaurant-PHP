<?php 

include ("../../bd.php");

if(isset($_GET["txtID"])){
    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_testimonio` WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    $opinion=$registro["opinion"];
    $nombre=$registro["nombre"];
    
    }




include ("../../templates/header.php"); ?>



<br/>

<div class="card">
    <div class="card-header">
            Testimonios

    </div>
    <div class="card-body">


    <form action="" method="post" enctype="multipart/form-data"> <!--para adjuntar la foto-->

    <div class="mb-3">
        <label for="" class="form-label">Opinion:</label>
        <input type="text"class="form-control" value="<?php echo $opinion; ?>" name="opinion"id="opinion"aria-describedby="helpId"placeholder="Opinion"/>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text"class="form-control" value="<?php echo $nombre; ?>"name="nombre"id="nombre"aria-describedby="helpId"placeholder="Nombre"/>
    </div>

    <button type="submit" class="btn btn-success">Agregar Testimonios </button> 
            <a name=""id=""class="btn btn-primary"href="index.php"role="button">Cancelar</a>
            
    


</form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>



<?php include ("../../templates/footer.php"); ?>
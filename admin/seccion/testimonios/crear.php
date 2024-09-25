<?php 
include ("../../bd.php");


    if($_POST){
        print_r($_POST);

        $sentencia=$conexion->prepare("INSERT INTO 
        `tbl_testimonio` (`ID`, `opinion`, `nombre`) 
        VALUES (NULL, 'todo estubo rico', 'carlos');");
        
        $sentencia->execute();

    }



include ("../../templates/header.php"); 


?>




<br/>

<div class="card">
    <div class="card-header">
            Testimonios

    </div>
    <div class="card-body">


    <form action="" method="post" enctype="multipart/form-data"> <!--para adjuntar la foto-->

    <div class="mb-3">
        <label for="" class="form-label">Opinion:</label>
        <input type="text"class="form-control"name="opinion"id="opinion"aria-describedby="helpId"placeholder="Opinion"/>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre;</label>
        <input type="text"class="form-control"name="nombre"id="nombre"aria-describedby="helpId"placeholder="Nombre"/>
    </div>

    <button type="submit" class="btn btn-success">Agregar Testimonios </button> 
            <a name=""id=""class="btn btn-primary"href="index.php"role="button">Cancelar</a>
            
    


</form>

    </div>
    <div class="card-footer text-muted">

    </div>
</div>



<?php include ("../../templates/footer.php"); ?>
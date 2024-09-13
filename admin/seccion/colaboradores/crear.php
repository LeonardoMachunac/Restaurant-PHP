<?php
if($_POST){
    print_r($_POST);

    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:""; 
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:""; 
    $linkfacebook=(isset($_POST['linkfacebook']))?$_POST['linkfacebook']:""; 
    $linkinstagram=(isset($_POST['linkinstagram']))?$_POST['linkinstagram']:""; 
    $linklinkedin=(isset($_POST['linklinkedin']))?$_POST['linklinkedin']:"";
    $foto=(isset($_POST['foto']))?$_POST['foto']:"";

}


include ("../../templates/header.php");
?>
<br/>
<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data"> <!--para adjuntar la foto-->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control"name="foto"id="foto"placeholder=""aria-describedby="fileHelpId"/>
            
            </div>
            
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" class="form-control"name="titulo" id="titulo" aria-describedby="helpId" placeholder=""/>
            
            </div>


            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input type="text"class="form-control"name="descripcion"id="descripcion"aria-describedby="helpId"placeholder=""/>
                
            </div>
            
            <div class="mb-3">
                <label for="linkfacebook" class="form-label">Facebook:</label>
                <input type="text"class="form-control"name="linkfacebook"id="linkfacebook"aria-describedby="helpId" placeholder=""/>
                
            </div>
            
            <div class="mb-3">
                <label for="linkinstagram" class="form-label">Instagram:</label>
                <input type="text"class="form-control"name="linkinstagram"id="linkinstagram"aria-describedby="helpId" placeholder=""/>
                
            </div>

            <div class="mb-3">
                <label for="linklinkedin" class="form-label">Lnkedin:</label>
                <input type="text"class="form-control"name="linklinkedin"id="linklinkedin"aria-describedby="helpId" placeholder=""/>
                
            </div>

            <button type="submit" class="btn btn-success">Agregar Colaboradores </button> </br></br>
            <a name=""id=""class="btn btn-primary"href="index.php"role="button">Cancelar</a>
            
            
            


            
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>








<?php include ("../../templates/footer.php"); ?>
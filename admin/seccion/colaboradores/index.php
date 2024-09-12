<?php
include ("../../bd.php");
include ("../../templates/header.php");
?>
</br>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registros</a>
    </div>


    <div class="card-body">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">titulo</th>
                        <th scope="col">foto</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">linkfacebook</th>
                        <th scope="col">linkinstagram</th>
                        <th scope="col">linklinkedin</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class="">
                        <td scope="row">1</td>
                        <td>pedro chef</td>
                        <td>img.jpg</td>
                        <td>el cachudo</td>
                        <td>facebook</td>
                        <td>IG</td>
                        <td>linkedin</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        



   
    </div>
    <div class="card-footer text-muted"></div>
</div>



<?php include ("../../templates/footer.php"); ?>
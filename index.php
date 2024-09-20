<?php
include("admin/bd.php");


$sentencia=$conexion->prepare("SELECT * FROM  tbl_banners ORDER BY id ASC limit 1"); //DESC
$sentencia->execute();
$lista_banners= $sentencia->fetchAll(PDO::FETCH_ASSOC);



$sentencia=$conexion->prepare("SELECT * FROM  tbl_colaboradores ORDER BY id DESC  "); //DESC
$sentencia->execute();
$lista_colaboradores= $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="#"> <i class="fas fa-utensils"></i>   Restaurante La Sombra</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                        
                <li class="nav-item">
                    <a class="nav-link" href="#inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu del dia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#chefs">Chefs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonios">Testimonio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contacto">Contacto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#horarios">Horarios</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
        <section id="inicio" class="container-fluid p-0">
            <div class="banner-img" style="position: relative; background:url('img/slider-image1.jpg') center/cover no-repeat; height:400px;" >
                <div class="banner-text" style="position:absolute;top:50%; left:50%; transform: translate(-50%,-50%); text-align:center; color:#fff;">

                    <?php foreach($lista_banners as $banner) { ?>

                    <h1><?php echo $banner['titulo'];?></h1>
                    <p><?php echo $banner['descripcion'];?></p>
                    <a href="<?php echo $banner['link'];?>" class="btn btn-primary">Ver Menú</a>
                        <?php  }
                        
                        ?>


                </div>

            </div>
        </section>


        <section id="id" class="container mt-4 text-center">
            
                <div class="jumbotron bg-dark text-white">
                    <br/>
                        <h2>Bienvendo al Restaurante</h2>
                        <p>Descubre una experiencia culinaria unica.</p>
                    <br/>
                </div>

        </section>
                <!--Inicio de Chefs-->
        <section id="chefs" class="container mt-4 text-center">
            <h2>Nuestros Chefs</h2>
                <div class="row">

                        <?php foreach($lista_colaboradores as $colaborador){?>
                        
                    <div class="col-md-4">

                        <div class="card">
                            <img src="img/colaboradores/<?php echo $colaborador["foto"];?>" class="card-img-top" alt="Chef 3"/>

                            <div class="card-body">
                        <h5 class="card-title"><?php echo $colaborador["titulo"];?></h5>
                            <p class="card-text"><?php echo $colaborador["descripcion"];?></p>

                            <div class="social-icons mt-3">
                                <a href="<?php echo $colaborador["linkfacebook"];?>" class="text-dark me-2"><i class="fab fa-facebook"></i></a>
                                <a href="<?php echo $colaborador["linkinstagram"];?>" class="text-dark me-2"><i class="fab fa-instagram"></i></a>
                                <a href="<?php echo $colaborador["linklinkedin"];?>" class="text-dark me-2"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>

                    <?php } ?>
                    </div>

                
        </section>
                    <!--Fin de testimonios-->

                    <!--Inicio de testimonios-->
            <section id="testimonios" class="bg-light py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Testimonios</h2>
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="card mb-4 w-100">
                                <div class="card-body">
                                    <p class="card-text">Muy buena comida</p>
                                </div>
                                <div class="card-footer text-muted">
                                    Oscar Uh

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 d-flex">
                            <div class="card mb-4 w-100">
                                <div class="card-body">
                                    <p class="card-text">Excelte  comida</p>
                                </div>
                                <div class="card-footer text-muted">
                                    Luis AF
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                    <!--Fin de testimonios-->

                    <!--Inicio de menu-->
            <section id="menu" class="container mt-4">
                <h2 class="text-center">Menu (nuestra recomendacion) </h2>
                <br/>
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col d-flex">
                        <div class="card">
                            <img src="img/menu/menu-image1.jpg" class="card-img-top" alt="Tortillas de maiz con carne y flijoles negros">
                            <div class="card-body">
                                <h5 class="card-title">Tortillas de maiz con carne y frijoles negros</h5>
                                <p class="card-text small"> <strong>Ingredientes:</strong> Arroz,frijoles </p>
                                <p class="card-text"> <strong> Precio: </strong> $3.99</p>
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex">
                        <div class="card">
                            <img src="img/menu/menu-image2.jpg" class="card-img-top" alt="Tortillas de maiz con carne y flijoles negros">
                            <div class="card-body">
                                <h5 class="card-title">Tortillas de maiz con carne y frijoles negros</h5>
                                <p class="card-text"> <strong> Precio: </strong> $3.99</p>
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex">
                        <div class="card">
                            <img src="img/menu/menu-image3.jpg" class="card-img-top" alt="Tortillas de maiz con carne y flijoles negros">
                            <div class="card-body">
                                <h5 class="card-title">Tortillas de maiz con carne y frijoles negros</h5>
                                <p class="card-text"> <strong> Precio: </strong> $3.99</p>
                            </div>
                        </div>
                    </div>

                    <div class="col d-flex">
                        <div class="card">
                            <img src="img/menu/menu-image3.jpg" class="card-img-top" alt="Tortillas de maiz con carne y flijoles negros">
                            <div class="card-body">
                                <h5 class="card-title">Tortillas de maiz con carne y frijoles negros</h5>
                                <p class="card-text"> <strong> Precio: </strong> $3.99</p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

                <!--Fin  de testimonios-->
            </br>
            </br>


                <!--Inicio de contacto-->

            <section id="contacto" class="container mt-4">
                <h2>Contacto</h2>
                    <p> Estamos aqui para servirle.</p>

                    <form action="#" method="post">
                        <div class="mb-3">
                        <label for="name">Nombre:</label><br/>
                        <input type="text" class="form-control"  name="nombre" placeholder="Escribe tu nombre..." required>
                        <br/>
                        </div>


                        
                            <div class="mb-3">
                        <label for="email">Correo electronico: </label><br/>
                        <input type="email" class="form-control" name="correo" placeholder="Escribe tu correo electronico" required/>
                        <br/>

                        </div>

                        <div class="mb-3">
                        <label for="message">Mensaje:</label><br/>
                        <textarea id="message" class="form-control" name="mensaje" id="message" rows="6" cols="50"></textarea>
                        <br/>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Enviar mensaje">

                    </form>

            </section>

                <br/> <br/>
                    <!--Fin de contacto-->

                <div id="horarios" class="text-center bg-light p-4">
                    <h3 class="mb-4"> Horario de atencion</h3>

                    <div>
                        <p> <strong>Lunes a Viernes </strong></p>
                        <p> <strong>11:00 a.m. - 10:00 p.m. </strong></p>
                    </div>

                    <div>
                        <p> <strong> Sabado </strong></p>
                        <p> <strong>12:00 a.m. - 05:00 p.m. </strong></p>
                    </div>

                    <div>
                        <p> <strong>Domingo </strong></p>
                        <p> <strong> 7:00 a.m. - 2:00 p.m. </strong></p>
                    </div>

                </div>


        <footer class="bg-dark text-light text-center py-3">

            <p> &copy; 2024 Restaurant La Sombra, todos los derechos reservados.</p>

            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"crossorigin="anonymous"></script>

    </body>
</html>

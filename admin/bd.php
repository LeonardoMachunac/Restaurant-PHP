<?php

    $servidor="localhost";
    $baseDatos="restaurante";
    $usuario="root";
    $contraseña="";

    try{

        $conexion= new PDO ("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contraseña);
        // echo "Conexion establecida";
    }catch(Exception $error){
        echo $error->getMessage();
    }   


?>
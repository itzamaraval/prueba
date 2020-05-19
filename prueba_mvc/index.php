<?php

// EN EL INDEX MOSTRAREMOS LA SALIDA DE LAS VISTAS AL USUARIO Y A TRAVÉS DE ÉL ENVIAREMOS LAS DISTINTAS ACCIONES QUE EL USUARIO ENVIE AL CONTROLADOR


//Invocación a los métodos
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "models/crudProd.php";

//Controlador
//Creación de los objetos, que es la lógica del negocio
require_once "controllers/controller.php";


//muestra la función o método "página" que se encuentra en controllers/controller.php
$mvc = new MvcController();
$mvc->pagina();


?>
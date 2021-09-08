<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ubicaciones.controlador.php";
require_once "controladores/equipos.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ubicaciones.modelo.php";
require_once "modelos/equipos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
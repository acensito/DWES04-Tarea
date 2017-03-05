<?php

/* 
 * 2017 Felipe Rodríguez Gutiérrez
 *
 * CODIGO CREADO BAJO LICENCIA CREATIVE COMMONS
 *
 * Reconocimiento - NoComercial - CompartirIgual (by-nc-sa): 
 *
 * No se permite un uso comercial de la obra original ni de las posibles obras 
 * derivadas, la distribución de las cuales se debe hacer con una licencia igual
 * a la que regula la obra original.
 */

/* 
 * Módulo: Desarrollo Web Entorno Servidor
 * Tema  4: Programacion orientada a objetos en PHP
 * Tarea 4: Diodos Bank (vol. 2)
 * Alumno: Felipe Rodríguez Gutiérrez
 */

//Requerimos las funciones de inicio y auxiliares
require 'includes/inc.init.php';
//Iniciamos la sesion
session_start();
//Instanciamos un nuevo template
$template = new SmartyExt();
//Comprobamos en la sesion si existe el cliente logueado, en caso contrario lo
//que procederemos es a redireccionar a la página de inicio.
if (isset($_SESSION['cliente'])){
    $user = $_SESSION['cliente'];
    //Obtenemos el login de usuario
    $login = $_SESSION['cliente']->getlogin();
    //Si hay una cookie con el nombre de login
    if (filter_has_var(INPUT_COOKIE, $login)) {
        //Obtenemos el valor del theme que se haya establecido y lo asignamos
        $template->assign('theme', $theme = filter_input(INPUT_COOKIE, $login));
    } else {
        //Asignamos un valor por defecto
        $template->assign('theme', 'estilos');
    }
} else {
    //Si no hay sesion iniciada, redigimos al index
    header("Location: index.php");
}

//Volcamos todos los movimientos del usuario
$movimientos = Operativa::movimientos();

//Se asigna el array de movimientos a su etiqueta
$template->assign('movimientos', $movimientos); 

//Obtenemos el nombre de usuario y la hora de inicio de sesion para mostrarlo
//en el mensaje de bienvenida.
//Asignamos a la variable del usuario de la plantilla
$template->assign('nombre', $user->getNombre() );
//Asignamos a la variable de la hora de la plantilla
$template->assign('hora', date("H:i", $_SESSION['hora']));

//Dibujamos la web usando el template seleccionado
$template->display('movimientos.tpl');
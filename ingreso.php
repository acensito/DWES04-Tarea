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

//Si se ha pulsado en el botón de ingresar
if(filter_has_var(INPUT_POST, "Ingresar")){
    //Recolectamos los datos introducidos
    $fecha = filter_input(INPUT_POST, 'fecha');
    $concepto = filter_input(INPUT_POST, 'concepto');
    $cantidad = filter_input(INPUT_POST, 'cantidad');
    
    //Llamamos al método de ingreso, pasandole los parametros recogidos
    $resultado = Operativa::ingreso($fecha, $concepto, $cantidad);
    
    //Si el resultado es positivo(true), es que existen errores que subsanar, 
    //por lo que se lanzan los errores y se dejan rellenas los campos input
    if ($resultado) {
        //Muestra los errores obtenidos
        $template->assign('info', $resultado);
        //Rellenamos los campos que ya estaban rellenos salvo los de password
        $template->assign('fecha', $fecha);
        $template->assign('concepto', $concepto);
        $template->assign('cantidad', $cantidad);
    
    //En el caso de no existir problemas, se lanza mensaje de info    
    } else {
        $template->assign('info', '<p class="perfect">Se ha efectuado el ingreso correctamente, será redirigido a movimientos.</p>');
        header("refresh:1;url=movimientos.php");
    }
}

//Obtenemos el nombre de usuario y la hora de inicio de sesion para mostrarlo
//en el mensaje de bienvenida.
//Asignamos a la variable del usuario de la plantilla
$template->assign('nombre', $user->getNombre() );
//Asignamos a la variable de la hora de la plantilla
$template->assign('hora', date("H:i", $_SESSION['hora']));

//Asignamos el valor de patrón de expresión regular para que introduzca el mismo
//en el formulario y evitar problemas de compatibidad con firefox
$template->assign('patron', "(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))");

//Dibujamos la web usando el template seleccionado
$template->display('ingreso.tpl');


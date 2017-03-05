<?php
//Llamamos a los archivos de inicio
require 'includes/inc.init.php';

//Iniciamos la sesion
session_start();
//Comprobamos en la sesion si existe el cliente logueado, en caso contrario lo
//que procederemos es a redireccionar a la página de inicio.
if (isset($_SESSION['cliente'])){
    header("Location: banca.php");
}

//Instanciamos un nuevo template
$template = new SmartyExt();

//Asignamos el valor por defecto del theme, que en esta página siempre sera igual
$template->assign('theme', 'estilos');

//Si se ha pulsado el boton de acceder
if (filter_has_var(INPUT_POST, 'ingresar')) {
    //Rescatamos el usuario y clave enviados
    $user = filter_input(INPUT_POST, 'usuario');  //$_POST['usuario'];
    $pass = filter_input(INPUT_POST, 'password'); //$_POST['password'];

    //Si la clave o la pass estan vacias
    if (empty($user)|| empty($pass)) {
            //Asignamos el mensaje de error feedback
            $template->assign('error', "<p class='errcon'>Debe rellenar todos los campos</p>");
            //Establecemos el valor del campo usuario si ya lo introdujo
            $template->assign('user', $user);
    } else {
        //Conectamos por singleton a la base de datos
        $con = DB::conexion();
        //Comprobamos si existe usuario con dicho login
        $resultado = $con->getLogin($user);

        //Si existe usuario localizado
        if ($resultado){
            //Recuperamos el hash de la clave
            $hash = $resultado['password'];
            //Comparamos el hash con la clave enviada
            $clave_validada = password_verify($pass, $hash);
            
            //Si la clave mandada es válida
            if($clave_validada){
                //Recuperamos el nombre del usuario para pasarlo al objeto
                $nombre = $resultado['nombre'];
                //Creamos el objeto usuario y lo pasamos a la variable de sesion
                $_SESSION['cliente'] = new Usuario($user, $nombre);
                //Establecemos la hora de inicio de la sesion
                $_SESSION['hora'] = time();
                //Redirigimos a la página de inicio del usuario
                header("Location: banca.php");    
            //En caso contrario, asignamos un valor de error feedback
            } else {
                $template->assign('error', "<p class='errcon'>Clave de usuario incorrecta</p>");
                //Establecemos el valor del campo usuario para un nuevo intento
                $template->assign('user', $user );
            }
        //Si no existe el usuario, devolvemos mensaje de error feedback
        } else {
            $template->assign('error', "<p class='errcon'>No existe el usuario. Por favor, registrese</p>");
        }
    }
}

//Si se ha pulsado el botón de registro, redireccionamos a la página de registro
if (filter_has_var(INPUT_POST, 'registro')){
    header("Location: registro.php");
}

//Dibujamos la web usando el template seleccionado
$template->display('index.tpl');
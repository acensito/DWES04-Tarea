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

$template = new SmartyExt();

//Asignamos el valor por defecto del theme, que en esta página siempre sera igual
$template->assign('theme', 'estilos');

//Si se ha pulsado el boton de registrarse
if (filter_has_var(INPUT_POST, 'registrarse')){ 

    //Recabamos los datos obtenidos por formulario
    $user  = filter_input(INPUT_POST, 'usuario');   //$_POST['usuario'];
    $fecha = filter_input(INPUT_POST, 'fechaNac');  //$_POST['fechaNac'];
    $nombre= filter_input(INPUT_POST, 'nombre');    //$_POST['nombre'];
    $pass  = filter_input(INPUT_POST, 'password');  //$_POST['password'];
    $pass2 = filter_input(INPUT_POST, 'password2'); //$_POST['password2'];

    // Valida los datos recibidos, volcandolos en un flag de control
    $flag = Usuario::validar_usuario($user, $nombre, $pass, $pass2, $fecha);

    //Si el flag obtiene errores (true)
    if ($flag) {
        //Muestra los errores obtenidos
        $template->assign('info', $flag);
        //Rellenamos los campos que ya estaban rellenos salvo los de password
        $template->assign('user', $user);
        $template->assign('nombre', $nombre);
        $template->assign('fechaNac', $fecha);
    } else {
        //Procedemos a insertar el usuario en la base de datos
        //Previamente encriptamos la clave facilitada por el usuario
        $pass = crypt($pass, '$1$H0nXwAHv$Db/qca/Yq.hubsry5S7bf1');

        try {
            // Preparamos la consulta con parámetros
            $sql = "INSERT INTO usuarios (login, password, nombre, fNacimiento) VALUES (?, ?, ?, ?)";

            //Conectamos por singleton a la base de datos
            $con = DB::conexion();
            //Comprobamos si existe usuario con dicho login
            $resultado = $con->prepare($sql);
            
            // Parámetros de la consulta
            $resultado->bindParam(1, $user);
            $resultado->bindParam(2, $pass);
            $resultado->bindParam(3, $nombre);
            $resultado->bindParam(4, $fecha);

            //Ejecutamos la consulta, añadimos el usuario
            $resultado->execute();
            
            //Mensaje feeedback
            $template->assign('info', "<p class='perfect'>Se ha creado el usuario " . $user . " correctamente. Va a ser redireccionado tras 5s.</p>");
            header("refresh:5;url=index.php");
        } catch (PDOException $e) { //En caso de errores
            //Se captura el error y se muestra
            echo "<p class='errcon'>Se ha producido error " . $e->getMessage() . "</p>";
        }
    }    
}

// Mostramos la plantilla de la página de registro
$template->display('registro.tpl');


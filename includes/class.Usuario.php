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
 * Tema  04: Programación Orientada a Objetos en PHP
 * Tarea 04: Diodos Bank
 * Alumno: Felipe Rodríguez Gutiérrez
 */

//Para la ejecución de las consultas necesitará conectarse a la base de datos,
//por lo que le incluimos una llamada a la clase DB.
require_once 'class.DB.php';

/**
 * Clase Usuario. Contendrá el usuario activo y a su vez posee metodos estaticos
 * para trabajar con usuarios.
 *
 * @author felipon
 */
class Usuario {
    //Propiedades del objeto, necesarias para el control del usuario logueado
    private $login;
    private $nombre;
    
    //Propiedad para obtener la conexión a la BD.
    private $con;
    
    /**
     * Constructor de la clase. Se le pasa un valor por defecto en el caso de
     * que usemos la clase como clase estática, asi no requerirá valor alguno.
     * 
     * @param type $login Parametro login con valor por defecto.
     */
    public function __construct($login = null, $nombre = null) {
        $this->con = DB::conexion();
        $this->login = $login;
        $this->nombre = $nombre;
    }
    
    /**
     * Metodos mágicos, al crear objeto Usuario, solo almacena el login y nombre
     * @return type
     */
    public function __sleep() {
        return array('login', 'nombre');
    }
    
    /**
     * Metodos mágicos. Levanta el constructor de nuevo en el caso que se necesite
     * usar los métodos estaticos.
     */
    public function __wakeup() {
        $this->con = DB::conexion();
    }
    
    /* GETTERS (En este caso no modificaremos el usuario con estos metodos) */
    /************************************************************************/
    
    /**
     * Getter del login de usuario
     * 
     * @return type
     */
    public function getLogin() {
        return $this->login;
    }
    
    /**
     * Getter del nombre del usuario
     * 
     * @return type
     */
    public function getNombre() {
        return $this->nombre;
    }

    /* METODOS ESTATICOS DE VALIDACION DE DATOS REGISTRO */
    /*****************************************************/
    
    /**
     * Método al que se le pasa el valor de un campo formulario e indica si el 
     * campo esta vacio(true) o lleno(false).
     * 
     * @param  string $campo
     * @return boolean
     */
    private static function comprueba_campo_vacio($campo){
        $comprobacion = empty($campo) ? true:false;
        return $comprobacion;
    }
    
    /**
     * Método para comprobar si el usuario ya se encuentra registrado
     * 
     * @param  string $usuario
     * @return boolean
     */
    private static function comprueba_usuario_duplicado($usuario) {
        if (!empty($usuario)) {
            //Conectamos por singleton a la base de datos
            $sql = DB::conexion();
            //Comprobamos si existe usuario con dicho login
            return $sql->getLogin($usuario) ? true:false;
        }
    }

    /**
     * Método que comprueba si los campos password son iguales. Devuelve false si
     * son iguales y true en el caso de no coincidir.
     * 
     * @param  string $password
     * @param  string $password2
     * @return boolean
     */
    private static function comprueba_pass ($password, $password2){
        $comprobacion = ($password != $password2) ? true:false;
        return $comprobacion;
    }

    /**
     * Metodo generico para comprobar el tamaño de un campo pasandole como un
     * parametro el tamaño máximo que puede tener dicho campo. Retornará false
     * si esta validado y true en el caso de no cumplir requisitos
     * 
     * @param  string $campo
     * @param  int $tam_max
     * @return boolean
     */
    private static function longitud_campo($campo, $tam_max){
        $comprobacion = strlen($campo) > $tam_max ? true:false;
        return $comprobacion;
    }

    /**
     * Funcion que utiliza las funciones anteriores para validar el usuario y mandar
     * los mensajes de feedback con los errores recogidos.
     * No es necesario comprobar la fecha dado que el mismo campo lo hace ya de
     * manera automática.
     * 
     * @param type $usuario     Parametro del usuario
     * @param type $password    Parametro del password
     * @param type $password2   Parametro del password2
     * @param type $fechaNac    Parametro de fecha de nacimiento
     * 
     * @return string Devuelve un mensaje con los errores obtenidos
     */
    public static function validar_usuario($usuario, $nombre, $password, $password2, $fechaNac) {
        //Creamos una cadena vacia donde se concatenarán los errores que aparezcan
        $error = "";
        //Control de errores de campos vacios
        $error .= self::comprueba_campo_vacio($usuario) ? "<p class='errcon'><strong>ERROR: </strong>El campo USUARIO no puede estar vacio</p>":false;
        $error .= self::comprueba_campo_vacio($nombre) ? "<p class='errcon'><strong>ERROR: </strong>El campo NOMBRE no puede estar vacio</p>":false;
        $error .= self::comprueba_campo_vacio($password) ? "<p class='errcon'><strong>ERROR: </strong>El campo PASSWORD no puede estar vacio</p>":false;
        $error .= self::comprueba_campo_vacio($fechaNac) ? "<p class='errcon'><strong>ERROR: </strong>El campo FECHA NACIMIENTO no puede estar vacio</p>":false;
        //Control de errores de usuario existente
        $error .= self::comprueba_usuario_duplicado($usuario) ? "<p class='errcon'><strong>ERROR: </strong>El usuario " . $usuario . " ya existe, pruebe con otro.</p>":false;
        //Comprobando las longitudes de los campos
        $error .= self::longitud_campo($usuario, 10) ? "<p class='errcon'><strong>ERROR: </strong>El usuario no puede superar los 10 caracteres</p>":false;
        $error .= self::longitud_campo($password, 20) ? "<p class='errcon'><strong>ERROR: </strong>El password no puede superar los 20 caracteres</p>":false;
        $error .= self::longitud_campo($nombre, 30) ? "<p class='errcon'><strong>ERROR: </strong>El nombre no puede superar los 30 caracteres</p>":false;
        //Comprobando si las contraseñas coinciden
        $error .= self::comprueba_pass($password, $password2) ? "<p class='errcon'><strong>ERROR: </strong>El password no coincide</p>":false;
        
        //Devolvemos los resultados de las comprobaciones
        return $error;
    }
}




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

/**
 * Descripción: Clase DB de conexión a la base de datos usando patrón singleton.
 * También se incluyen las funciones esenciales de consulta a la base de datos y
 * de comprobacion de usuario.
 *
 * @author Felipe Rodríguez Gutiérrez
 */
class DB {
    private static $instancia;
    private $con;
    
    /**
     * Constructor de la clase con los datos de conexión a la base de datos
     */
    private function __construct(){
        
        $db_host   = '192.168.0.250';    //  hostname por defecto: localhost/127.0.0.1 - 192.168.0.250 en red
        $db_name   = 'banca_electronica';//  nombre base datos
        $db_user   = 'dwes';             //  usuario
        $user_pw   = 'dwes';             //  contraseña

        try {
            $this->con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);
            $this->con->exec("set names utf8");
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { //Se capturan los mensajes de error
            exit("<p class='errcon'>No se ha conectado a la DB. " . $e->getMessage() . "</p>");
            die();
        }
    }
    
    /**
     * Método estático que devuelve la conexión a la base de datos. En caso de
     * no haberse realizado la conexión se instancia el constructor a si mismo.
     * 
     * En el caso de haber sido ya instanciada devuelve el valor de la instancia
     * 
     * @return Objeto
     */
    public static function conexion(){
        if(!isset(self::$instancia)){
            self::$instancia = new DB;
        }
        return self::$instancia;
    }
   
    /**
     * Método que devuelve una consulta preparada
     * 
     * @param  string $sql
     * @return consulta
     */
    public static function prepare($sql){
        return self::$instancia->con->prepare($sql);
    }
    
    /**
     * Metodo que devuelve si existe un usuario en la base de datos. Devuelve un
     * array con el usuario si existiera. Booleano (false) en caso contrario.
     * 
     * @param  string $user
     * @return array
     */
    public static function getLogin($user){
        //Realizamos la consulta preparada
        $sql = "SELECT login, password, nombre FROM usuarios WHERE login= ?";
        //Llamamos a la preparacion de la consulta a la funcion correspondiente
        $resultado = self::$instancia->prepare($sql);
        //Introducimos los correspondientes parametros de la consulta
        $resultado->bindParam(1,$user);
        //Ejecutamos la consulta
        $resultado->execute();
        //Flag de control de usuario. Valor devuelto si no aparecen resultados.
        $usuario = false;
        
        //Si existe un resultado
        if ($resultado->rowCount() == 1){
            //Guardamos los resultados para devolver
            $usuario = $resultado->fetch();
        }
        return $usuario;
    }
    
    /**
     * Metodo que devuelve una consulta preparada
     * @param type $sql
     */
    public static function ejecutaConsulta($sql){
        $resultado = self::$instancia->prepare($sql);
        $resultado->execute();
    }
    
    /**
     * Método que evita que por seguridad el objeto sea clonado
     */
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}

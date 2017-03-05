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
 * Clase Operativa con las operaciones del banco
 */
class Operativa {
    
    //*******************
    //OPERATIVA DEL BANCO
    //*******************

    /**
     * Metodo ingreso. Se le pasarán los parametros de ingreso, concepto y cantidad
     * y realizará el inserto en la base de datos al usuario activo, que lo tomará 
     * de la sesión actual.
     * 
     * @param date   $fecha  
     * @param string $concepto
     * @param number $cantidad
     * @return type string con los errores o booleano false si ha salido todo correctamente
     */
    public static function ingreso($fecha, $concepto, $cantidad) {
        //Obtenemos el usuario actual, el usuario que está logueado de la sesion
        $usuario = $_SESSION['cliente']->getLogin();
        
        //Validamos los datos obtenidos
        $flag = self::validar_movimiento($fecha, $concepto, $cantidad);

        //Si han existido errores
        if ($flag) {
            //Devolverá los valores de retorno con los mensajes de validación
            return $flag;
        //Si no existen errores
        } else {
            //Se prepara la consulta
            try {
                //Primero se obtiene el número siguiente de movimiento que corresponderia
                $codigoMov = self::numero_movimiento();
                //Creamos la sentencia sql correspondiente
                $sql = "INSERT INTO MOVIMIENTOS (codigoMov, loginUsu, fecha, concepto, cantidad) VALUES (:codigoMov, :login, :fecha, :concepto, :cantidad)";
                //Creamos una conexión a la DB
                $con = DB::conexion();
                //Preparamos la consulta
                $resultado = $con->prepare($sql);
                //Pasamos los parametros
                $resultado->bindParam(':codigoMov', $codigoMov);
                $resultado->bindParam(':login', $usuario);
                $resultado->bindParam(':fecha', $fecha);
                $resultado->bindParam(':concepto', $concepto);
                $resultado->bindParam(':cantidad', $cantidad);
                //Ejecutamos la consulta
                $resultado->execute();
            //En caso de existir errores, los capturamos y los mostramos
            } catch (Exception $e) {
                echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Capturamos el error y mostramos el mensaje
            }
        }
    }
    
    /**
     * Metodo ingreso, similar al anterior, cambia que negativiza el signo de la
     * cantidad ingresada. Este método se podría integrar con el anterior, pero
     * por motivos de claridad del código, he preferido repetirlo y no mezclar.
     * 
     * @param date   $fecha
     * @param string $concepto
     * @param number $cantidad
     * @return type string con los errores o booleano false si ha salido todo correctamente
     */
    public static function pago($fecha, $concepto, $cantidad) {
        //Obtenemos el usuario actual, el usuario que está logueado de la sesion
        $usuario = $_SESSION['cliente']->getLogin();
        
        //Validamos los datos obtenidos
        $flag = self::validar_movimiento($fecha, $concepto, $cantidad);
        
        //Negativizamos la cantidad introducida
        $importe = -$cantidad;
        
        //Si han existido errores
        if ($flag) {
            //Devolverá los valores de retorno con los mensajes de validación
            return $flag; 
        //Si no existen errores
        } else {
            //Preparamos la consulta
            try {
                //Primero se obtiene el número siguiente de movimiento que corresponderia
                $codigoMov = self::numero_movimiento(); 
                //Creamos la sentencia sql correspondiente
                $sql = "INSERT INTO MOVIMIENTOS (codigoMov, loginUsu, fecha, concepto, cantidad) VALUES (:codigoMov, :login, :fecha, :concepto, :cantidad)";
                //Creamos una conexión a la DB
                $con = DB::conexion();
                //Preparamos la consulta
                $resultado = $con->prepare($sql);
                //Pasamos los parametros
                $resultado->bindParam(':codigoMov', $codigoMov);
                $resultado->bindParam(':login', $usuario);
                $resultado->bindParam(':fecha', $fecha);
                $resultado->bindParam(':concepto', $concepto);
                $resultado->bindParam(':cantidad', $importe);
                //Ejecutamos la consulta
                $resultado->execute();
            //En caso de existir errores, los capturamos y los mostramos
            } catch (Exception $e) { //En caso de errores
                echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Capturamos el error y mostramos el mensaje
            }
        }
    }
    
    /**
     * Metodo estatico movimientos. Devuelve un array con objetos Movimiento los cuales
     * contienen los datos de cada movimiento.
     * 
     * @return array de objetos Movimiento
     */
    public static function movimientos(){
        //Obtenemos el usuario activo
        $usuario = $_SESSION['cliente']->getLogin();
        //Preparamos la consulta
        try {
            //Creamos la sentencia sql correspondiente
            $sql = "SELECT codigoMov, fecha, concepto, cantidad FROM movimientos WHERE loginUsu = :user";
            //Creamos una conexión a la DB
            $con = DB::conexion();
            //Preparamos la consulta
            $resultado = $con->prepare($sql);
            //Le pasamos los parametros
            $resultado->bindParam(':user', $usuario);
            //Ejecutamos la consulta
            $resultado->execute();
            //Recuperamos las filas
            $row = $resultado->fetch();
            
            //Si existen filas/resultados
            while ($row != null) {
                //Pasamos una fila a un objeto Movimiento y lo insertamos en el array movimientos
                $movimientos[] = new Movimiento($row);
                $row = $resultado->fetch();
            }
            
            //Devuelve el listado de objetos movimientos si existe y el booleano false si se encuentra vacio
            return !empty($movimientos) ? $movimientos : false;
        //En caso de existir errores, los capturamos y los mostramos
        } catch (PDOException $e) {
            echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Se captura el error y se lanza mensaje
        } 
    }
    
    /**
     * Método estatico recibos. Similar al anterior, pero únicamente devuelve un
     * array con los recibos.
     * 
     * @return type array de objetos Movimiento
     */
    public static function recibos(){
        //Obtenemos el usuario activo
        $usuario = $_SESSION['cliente']->getLogin();
        //Preparamos la consulta
        try {
            //Creamos la sentencia sql correspondiente
            $sql = "SELECT codigoMov, fecha, concepto, cantidad FROM movimientos WHERE loginUsu = :user AND cantidad < 0";
            //Creamos una conexión a la DB
            $con = DB::conexion();
            //Preparamos la consulta
            $resultado = $con->prepare($sql);
            //Le pasamos los parametros
            $resultado->bindParam(':user', $usuario);
            //Ejecutamos la consulta
            $resultado->execute();
            //Recuperamos las filas
            $row = $resultado->fetch();
            
            //Si existen filas/resultados
            while ($row != null) {
                //Pasamos una fila a un objeto Movimiento y lo insertamos en el array movimientos
                $recibos[] = new Movimiento($row);
                $row = $resultado->fetch();
            }
            //Devuelve el listado de objetos movimientos si existe y el booleano false si se encuentra vacío
            return !empty($recibos) ? $recibos : false;
        //En caso de existir errores, los captutramos y los mostramos    
        } catch (PDOException $e) {
            echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Se captura el error y se lanza mensaje
        }
    }
    
    /**
     * metodo estatico devolver. Recibe el codigo del movimiento a devolver y lo
     * elimina de la base de datos. Se usará a la vez el usuario activo con tal 
     * de conseguir una mejor persistencia de datos.
     * 
     * @param type $codigoMov
     */
    public static function devolver($codigoMov){
        //Recibimos el usuario activo
        $usuario = $_SESSION['cliente']->getLogin();
        //Preparamos la consulta
        try {
            //Creamos la sentencia sql correspondiente
            $consulta = "DELETE FROM MOVIMIENTOS WHERE loginUsu = :user AND codigoMov = :codigoMov";
            //Creamos una conexión a la DB
            $con = DB::conexion();
            //Preparamos la consulta
            $resultado = $con->prepare($consulta);
            //Pasamos los parametros
            $resultado->bindParam(':user', $usuario);
            $resultado->bindParam(':codigoMov', $codigoMov);
            //Ejecutamos la consulta
            $resultado->execute();
        //En caso de existir errores, los capturamos y los mostramos
        } catch (PDOException $e) {
            echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Capturamos el error y lanzamos un mensaje
        }
    }
    
    //********************
    //FUNCIONES AUXILIARES
    //********************
    
    /**
     * Función que obtiene el numero del ultimo movimiento y genera el siguiente 
     * numero a modo de autonumérico. Es único por cada movimiento.
     * 
     * @return Valor String de cuatro cifras 0000
     */
    private static function numero_movimiento() {
        try { 
            //Preparamos la consulta, obtiene el mayor valor real de la tabla movimiento de codigoMov como un numero
            $sql = "SELECT MAX(convert(codigoMov,unsigned)) AS codigo FROM movimientos";
            //Creamos una conexión a la base de datos
            $con = DB::conexion();
            //Preparamos la consulta
            $resultado = $con->prepare($sql);
            //Ejecutamos la consulta,
            $resultado->execute();
            //Recuperamos la fila
            $registro = $resultado->fetch(PDO::FETCH_ASSOC);

            //Si no existen registros
            if ($registro['codigo'] == "") {
                //Se le asigna el valor inicial
                $codigoMov = "0000";
            //Si existieran registros
            } else {
                //Obtenemos el valor del ultimo registro
                $ultimoMov = $registro['codigo'];
                //Le añadimos una posición más
                $ultimoMov++;
                //Rellenamos de ceros a la izquierda hasta cuatro
                $codigoMov = str_pad($ultimoMov, 4, '0', \STR_PAD_LEFT);
            }
        //En caso de existir errores, los capturamos y los mostramos
        } catch (PDOException $e) {
            echo "<div class='errcon'><p>Se ha producido error " . $e->getMessage() . "</p></div>"; //Captura el error y lo muestra como mensaje
        }
        //Devolvemos el código generado
        return $codigoMov; 
    }
    
    //******************************************
    //METODOS VALIDACION INGRESO O PAGO BANCARIO
    //******************************************
    
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
     * Metodo generico para comprobar el tamaño de un campo pasandole como un
     * parametro el tamaño máximo que puede tener dicho campo. Retornará false
     * si esta validado y true en el caso de no cumplir requisitos
     * 
     * @param  string $campo a comprobar
     * @param  int $tam_max tamaño máximo que puede tener
     * @return boolean resultado verdader/falso
     */
    private static function longitud_campo($campo, $tam_max){
        return strlen($campo) > $tam_max ? true:false;
    }
    
    /**
     * Función independiente que valida el importe
     * 
     * @param type $importe importe a validar
     * @return boolean devuelve true o false dependiendo si esta validado o no
     */
    private static function validar_importe ($importe) {
        //Si el importe esta vacío, no es numerico o es menor de cero
        return (empty($importe) OR (!is_numeric($importe)) OR ($importe < 0)) ? true:false;
    }
    
    /**
     * Funcion independiente que valida una fecha en el formato especificado o 
     * en cualquiera que le espeficiquemos.
     * 
     * @param  type date    $fecha fecha a pasar
     * @param  type string  $formato formato preestablecido, modificable p.e: 'd-m-Y'
     * 
     * @return type boolean Retorna la fecha si es correcta, false si es incorrecta
     */
    private static function validar_fecha($fecha, $formato = 'Y-m-d') {
        //Reformateamos usando el formato (modificable si queremos)
        $d = DateTime::createFromFormat($formato, $fecha);
        //Devolvemos la fecha si es correcto, false si es incorrecto
        return $d && $d->format($formato) == $fecha; 
    }
    
    /**
     * Funcion que utiliza las funciones anteriores para validar el usuario y mandar
     * los mensajes de feedback con los errores recogidos.
     * No es necesario comprobar la fecha dado que el mismo campo lo hace ya de
     * manera automática.
     * 
     * @param type $fecha     Parametro de fecha de ingreso/pago
     * @param type $concepto  Parametro del concepto del ingreso/pago
     * @param type $importe   Parametro de importe del ingreso/pago
     * 
     * @return string Devuelve un mensaje con los errores obtenidos
     */
    private static function validar_movimiento($fecha, $concepto, $importe) {
        //Creamos una cadena vacia donde se concatenarán los errores que aparezcan
        $error = "";
        //Control de errores de campos vacios
        $error .= self::comprueba_campo_vacio($fecha) ? "<p class='errcon'><strong>ERROR: </strong>El campo FECHA no puede estar vacio</p>":false;
        $error .= self::comprueba_campo_vacio($concepto) ? "<p class='errcon'><strong>ERROR: </strong>El campo CONCEPTO no puede estar vacio</p>":false;
        $error .= self::comprueba_campo_vacio($importe) ? "<p class='errcon'><strong>ERROR: </strong>El campo IMPORTE no puede estar vacio</p>":false;
        //Control de errores de fecha introducida incorrecta
        $error .= self::validar_fecha($fecha) ? false:"<p class='errcon'><strong>ERROR: </strong>La fecha introducida es incorrecta.</p>";
        //Comprobando las longitudes del campo concepto
        $error .= self::longitud_campo($concepto, 20) ? "<p class='errcon'><strong>ERROR: </strong>El concepto no puede superar los 20 caracteres</p>":false;
        //Comprobando si el importe es correcto
        $error .= self::validar_importe($importe) ? "<p class='errcon'><strong>ERROR: </strong>El importe es inválido. Recuerde que tiene que ser un número positivo</p>":false;
        
        //Devolvemos los resultados de las comprobaciones
        return $error;
    }
    
}


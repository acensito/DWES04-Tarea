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

/* Funciones auxiliares */
/************************/

/**
 * Método __autoloader.
 * 
 * Con este sistema se autocargarán las clases necesarias, no teniendo que incluir
 * multiples lineas include o require en los cabeceros y limitandose únicamente a
 * una sola linea. Recibe el nombre de la clase y lo carga.
 * 
 * Resuelto problema carga smarty: http://www.smarty.net/forums/viewtopic.php?p=91334
 */
function autocarga($NombreClase){
    //Si las clases requeridas son Smarty, salvo SmartyExt, le indicamos la ruta
    //donde puede encontrar dichas clases.
    if ((substr($NombreClase, 0, 6) == "Smarty") && ($NombreClase != "SmartyExt")) {
        //Ruta donde hallarlas
        $NombreClase = "libs/sysplugins/" . strtolower($NombreClase);
        //Requiere la clase
        require_once $NombreClase . ".php"; 
    } else {
        //Para el resto de clases, se hallan en la ruta especificada a continuación
        include_once 'includes/class.' . $NombreClase . '.php';
    }
}
//Iniciamos el metodo de autocarga
spl_autoload_register('autocarga');

/**
 * Metodo comprobación inicio sesión. Con este método comprobaremos si existe una
 * variable de sesión. Si no existe una sesión de usuario iniciada, se redirigira
 * a la página de inicio.
 */
//function compruebaSesion(){
//    //En el caso de no existir una variable de usuario iniciada
//    if(!filter_has_var($_SESSION, 'user')){
//        //Se redirige a la página de inicio 
//        header('index.php');
//    }
//}


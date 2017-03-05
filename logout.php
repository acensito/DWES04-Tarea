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

//Destruimos completamente la sesion
session_start();
session_unset();
session_destroy();
//Redireccionamos a la pagina de inicio
header("Location: index.php");
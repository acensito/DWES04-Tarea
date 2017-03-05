<!DOCTYPE html>
<!-- Felipe Rodríguez Gutiérrez -->
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema:  04 Programacion orientada a objetos en PHP -->
<!-- Tarea: 04 Diodos Bank -->
<html>
    
<head>
    <meta charset="utf-8">
    <title>DWES - Tarea 4 - Felipe Rodríguez Gutiérrez</title>
    {* El valor $theme será el que reciba dependiendo del theme elegido *}
    <link type="text/css" href="css/{$theme}.css" rel="stylesheet" />
</head>

<body>
    <h1 class="centrado">TAREA 4: Diodos Bank</h1>
    {* Mensaje de bienvenida a la página web que se mostrará si existe nombre de usuario *}
    {if isset($nombre)}<h3>Bienvenido {$nombre}, ultima sesión a las {$hora} </h3>{/if}
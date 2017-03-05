<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:44:16
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb5f601b42e2_76968007',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c053079ed472bc4c9788b378e10ae16236777127' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\header.tpl',
      1 => 1488674523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58bb5f601b42e2_76968007 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!-- Felipe Rodríguez Gutiérrez -->
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema:  04 Programacion orientada a objetos en PHP -->
<!-- Tarea: 04 Diodos Bank -->
<html>
    
<head>
    <meta charset="utf-8">
    <title>DWES - Tarea 4 - Felipe Rodríguez Gutiérrez</title>
    
    <link type="text/css" href="css/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
.css" rel="stylesheet" />
</head>

<body>
    <h1 class="centrado">TAREA 4: Diodos Bank</h1>
    
    <?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {?><h3>Bienvenido <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
, ultima sesión a las <?php echo $_smarty_tpl->tpl_vars['hora']->value;?>
 </h3><?php }
}
}

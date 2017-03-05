<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:52:57
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\registro.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb61695833d5_38532249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e4dde919c311f9a59678baff893734748262a98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\registro.tpl',
      1 => 1488674062,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:smarty/templates/header.tpl' => 1,
    'file:smarty/templates/footer.tpl' => 1,
  ),
),false)) {
function content_58bb61695833d5_38532249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
<form id="signup" action="registro.php" method="post">
    <div class="header">
        <h3>Registro</h3>
        <p>Debes rellenar este formulario para registrarte</p>
    </div>

    
    <?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {
echo $_smarty_tpl->tpl_vars['info']->value;
}?>

    <div class="inputs">
        
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {
echo $_smarty_tpl->tpl_vars['user']->value;
}?>" autofocus />
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" value="<?php if (isset($_smarty_tpl->tpl_vars['nombre']->value)) {
echo $_smarty_tpl->tpl_vars['nombre']->value;
}?>" />
        <label>Fecha de nacimiento</label>
        <input type="date" name="fechaNac" placeholder="Fecha de Nacimiento" value="<?php if (isset($_smarty_tpl->tpl_vars['fechaNac']->value)) {
echo $_smarty_tpl->tpl_vars['fechaNac']->value;
}?>" />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" />
        <label>Repita password</label>
        <input type="password" name="password2" placeholder="Repita Password" />     
        <input id="submit" type="submit" name="registrarse" value="REGISTRARSE"/>
    </div>
</form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}

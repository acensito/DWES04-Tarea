<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:44:31
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb5f6f8ba9c5_68168290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2581517bdc0c926f2466a0ebae9f4c7d4d914619' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\index.tpl',
      1 => 1488673472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:smarty/templates/header.tpl' => 1,
    'file:smarty/templates/footer.tpl' => 1,
  ),
),false)) {
function content_58bb5f6f8ba9c5_68168290 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
<form id="signup" action="index.php" method="post" class="pure-form pure-form-stacked">
    <div class="header">
        <h3>Acceso</h3>
        <p>Debes rellenar este formulario para acceder</p>
    </div>

    
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo $_smarty_tpl->tpl_vars['error']->value;
}?>

    <div class="inputs">
        <label>Usuario</label>
        
        <input type="text" name="usuario" placeholder="Usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {
echo $_smarty_tpl->tpl_vars['user']->value;
}?>" autofocus />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" />
        <input id="submit" type="submit" name="ingresar" value="INGRESAR"/>
        <input id="submit" type="submit" name="registro" value="Registrarse"/>
    </div>
</form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

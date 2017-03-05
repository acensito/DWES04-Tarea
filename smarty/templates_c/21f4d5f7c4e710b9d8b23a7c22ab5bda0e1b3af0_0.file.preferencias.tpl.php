<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:46:12
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\preferencias.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb5fd4e3e893_96777792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21f4d5f7c4e710b9d8b23a7c22ab5bda0e1b3af0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\preferencias.tpl',
      1 => 1488674015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:smarty/templates/header.tpl' => 1,
    'file:smarty/templates/menu.tpl' => 1,
    'file:smarty/templates/footer.tpl' => 1,
  ),
),false)) {
function content_58bb5fd4e3e893_96777792 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h4 class='centrado'>Ajustes de preferencias de usuario</h4>

<?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {
echo $_smarty_tpl->tpl_vars['info']->value;
}?>

<form name="preferencias" action='preferencias.php' method='post'>
    <fieldset class="menu">
    <label>Elige un theme</label></br>
    <select name="combo">
        <option value="estilos">Theme por defecto</option>
        <option value="estilos1">Theme verde</option>
        <option value="estilos2">Theme azul</option>
    </select></br>
    <button type="submit" name="restablecer">Restablecer cambios</button>
    <button type="submit" name="guardar">Guardar cambios</button>
    </fieldset>
</form>


<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

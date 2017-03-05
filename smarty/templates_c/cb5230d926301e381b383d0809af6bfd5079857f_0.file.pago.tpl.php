<?php
/* Smarty version 3.1.30, created on 2017-03-05 02:27:10
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\pago.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb696e2ac137_89647474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb5230d926301e381b383d0809af6bfd5079857f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\pago.tpl',
      1 => 1488677213,
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
function content_58bb696e2ac137_89647474 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {
echo $_smarty_tpl->tpl_vars['info']->value;
}?>

<h4 class='centrado'>Realizar un pago</h4>

<form action="pago.php" method="post">
    <fieldset class="menu"> 
        <legend>Pago</legend>
        
        <label>Fecha: </label><input type="date" pattern="<?php echo $_smarty_tpl->tpl_vars['patron']->value;?>
" name="fecha" value="<?php if (isset($_smarty_tpl->tpl_vars['fecha']->value)) {
echo $_smarty_tpl->tpl_vars['fecha']->value;
}?>"/>
        <label>Concepto: </label><input type="text" name="concepto" value="<?php if (isset($_smarty_tpl->tpl_vars['concepto']->value)) {
echo $_smarty_tpl->tpl_vars['concepto']->value;
}?>"/>
        <label>Cantidad: </label><input type="text" name="cantidad" value="<?php if (isset($_smarty_tpl->tpl_vars['cantidad']->value)) {
echo $_smarty_tpl->tpl_vars['cantidad']->value;
}?>"/>
        <input type="submit" name="Pagar" value="Pagar">
    </fieldset>
</form>


<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:46:11
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\devoluciones.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb5fd36f71b8_38085051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '573c61f9d1b17c0cd35b870af0ef25c788a2c114' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\devoluciones.tpl',
      1 => 1488673370,
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
function content_58bb5fd36f71b8_38085051 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h4 class='centrado'>Recibos de su cuenta</h4>


<?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {
echo $_smarty_tpl->tpl_vars['msg']->value;
}?>

<form action="devoluciones.php" method="post">
    <table>
    <tr class='encabezado'><th>#</th><th>Fecha</th><th>Concepto</th><th>Cantidad</th></tr>
    
    <?php if ($_smarty_tpl->tpl_vars['recibos']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recibos']->value, 'recibo', false, 'indice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indice']->value => $_smarty_tpl->tpl_vars['recibo']->value) {
?>
            <tr>
                <td class='centrado'><input type='radio' name='indice' value='<?php echo $_smarty_tpl->tpl_vars['recibo']->value->getCodigoMov();?>
'></td>
                <td><?php echo $_smarty_tpl->tpl_vars['recibo']->value->getFecha();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['recibo']->value->getConcepto();?>
</td>
                <td class='negativo'><?php echo number_format($_smarty_tpl->tpl_vars['recibo']->value->getCantidad(),2,',','.');?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        
        </table>
        <div class='centrado'><input type='submit' name='devolver' value='Devolver'> <input type='reset' name='cancelar' value='Cancelar'></div>
    <?php } else { ?>
        
        <tr class='centrado'><td colspan='4'>No existen recibos que visualizar</td></tr>
        </table>
    <?php }?>     
</form>


<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

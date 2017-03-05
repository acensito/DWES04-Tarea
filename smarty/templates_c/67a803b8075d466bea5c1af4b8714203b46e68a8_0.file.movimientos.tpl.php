<?php
/* Smarty version 3.1.30, created on 2017-03-05 01:46:12
  from "C:\xampp\htdocs\DWES04-Tarea\smarty\templates\movimientos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58bb5fd42a26e8_01138085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67a803b8075d466bea5c1af4b8714203b46e68a8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES04-Tarea\\smarty\\templates\\movimientos.tpl',
      1 => 1488673956,
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
function content_58bb5fd42a26e8_01138085 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h4 class='centrado'>Movimientos de su cuenta</h4>  
<table>
    <tr class='encabezado'><th>Fecha</th><th>Concepto</th><th>Cantidad</th><th>Saldo contable</th></tr>


<?php if ($_smarty_tpl->tpl_vars['movimientos']->value) {?> 
    
    <?php $_smarty_tpl->_assignInScope('saldo', 0);
?>
    
    <?php $_smarty_tpl->_assignInScope('saldo_contable', 0);
?> 
    
    <?php $_smarty_tpl->_assignInScope('ultimo_movimiento', (count($_smarty_tpl->tpl_vars['movimientos']->value)-10));
?> 

    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['movimientos']->value, 'movimiento', false, 'indice');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indice']->value => $_smarty_tpl->tpl_vars['movimiento']->value) {
?>
        
        <?php $_smarty_tpl->_assignInScope('saldo_contable', $_smarty_tpl->tpl_vars['saldo']->value+$_smarty_tpl->tpl_vars['movimiento']->value->getCantidad());
?>
        
        <?php $_smarty_tpl->_assignInScope('saldocontable_final', number_format($_smarty_tpl->tpl_vars['saldo_contable']->value,2,',','.'));
?>
        
        <?php if ($_smarty_tpl->tpl_vars['indice']->value >= $_smarty_tpl->tpl_vars['ultimo_movimiento']->value) {?>
            <tr><td class='centrado'><?php echo $_smarty_tpl->tpl_vars['movimiento']->value->getFecha();?>
</td><td><?php echo $_smarty_tpl->tpl_vars['movimiento']->value->getConcepto();?>
</td>
            
            <?php if ($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad() > 0) {?> 
                <td class='contable'><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,',','.');?>
 €</td>
            <?php } else { ?>
                <td class='negativo'><?php echo number_format($_smarty_tpl->tpl_vars['movimiento']->value->getCantidad(),2,',','.');?>
 €</td>
            <?php }?>
            
            <?php if ($_smarty_tpl->tpl_vars['saldo_contable']->value > 0) {?>
                <td class='contable'><?php echo $_smarty_tpl->tpl_vars['saldocontable_final']->value;?>
 €</td></tr>
            <?php } else { ?>
                <td class='negativo'><?php echo $_smarty_tpl->tpl_vars['saldocontable_final']->value;?>
 €</td></tr>
            <?php }?>
        <?php }?>
        
        <?php $_smarty_tpl->_assignInScope('saldo', $_smarty_tpl->tpl_vars['saldo']->value+$_smarty_tpl->tpl_vars['movimiento']->value->getCantidad());
?>
        
        <?php $_smarty_tpl->_assignInScope('saldo_final', number_format($_smarty_tpl->tpl_vars['saldo']->value,2,',','.'));
?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    
    <?php if ($_smarty_tpl->tpl_vars['saldo_final']->value > 0) {?>
        <tr class='saldoFinal'><td colspan='3'>Saldo total: </td><td><?php echo $_smarty_tpl->tpl_vars['saldo_final']->value;?>
 €</td></tr>
    <?php } else { ?>
        <tr class='saldoFinal'><td colspan='3'>Saldo total: </td><td class='negativo'><?php echo $_smarty_tpl->tpl_vars['saldo_final']->value;?>
 €</td></tr>
    <?php }?>
           
<?php } else { ?>
    <tr class='centrado'><td colspan='4'>No existen recibos que visualizar</td></tr>    
<?php }?>
</table>


<?php $_smarty_tpl->_subTemplateRender("file:smarty/templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}

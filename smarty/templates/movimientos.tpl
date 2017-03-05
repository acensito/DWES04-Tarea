{* Incluimos el encabezado de página de la web *}
{include file="smarty/templates/header.tpl"}

{* Incluimos el menu de la web *}
{include file="smarty/templates/menu.tpl"}

<h4 class='centrado'>Movimientos de su cuenta</h4>  
<table>
    <tr class='encabezado'><th>Fecha</th><th>Concepto</th><th>Cantidad</th><th>Saldo contable</th></tr>

{* Dibujamos la tabla con los movimientos *}
{if $movimientos} 
    {* Definimos la variable del saldo *}
    {$saldo = 0}
    {* Definimos la variable del saldo contable *}
    {$saldo_contable = 0} 
    {* Marcamos que deseamos ver los 10 últimos movimientos *}
    {$ultimo_movimiento = (count($movimientos)-10)} 

    {* Recorremos el array de movimientos *}
    {foreach $movimientos as $indice => $movimiento}
        {* Obtenemos el saldo contable en cada movimiento *}
        {$saldo_contable = $saldo + $movimiento->getCantidad()}
        {* Saldo contable, en formato número y con dos decimales *}
        {$saldocontable_final = number_format($saldo_contable, 2, ',', '.')}
        {* Si el indice es mayor o igual que el ultimo movimiento, hay que mostrarlo *}
        {if $indice >= $ultimo_movimiento}
            <tr><td class='centrado'>{$movimiento->getFecha()}</td><td>{$movimiento->getConcepto()}</td>
            {* Dependiendo de la cantidad, se mostrará en rojo o normal *}
            {if $movimiento->getCantidad() > 0} 
                <td class='contable'>{number_format($movimiento->getCantidad(), 2, ',', '.')} €</td>
            {else}
                <td class='negativo'>{number_format($movimiento->getCantidad(), 2, ',', '.')} €</td>
            {/if}
            {* Si el saldo_contable es negativo, se mostrará en rojo en caso contrario normal *}
            {if $saldo_contable > 0}
                <td class='contable'>{$saldocontable_final} €</td></tr>
            {else}
                <td class='negativo'>{$saldocontable_final} €</td></tr>
            {/if}
        {/if}
        {* El saldo irá añadiendose el saldo del movimiento actual *}
        {$saldo = $saldo + $movimiento->getCantidad()}
        {* Se muestra en formato numero con dos decimales *}
        {$saldo_final = number_format($saldo, 2, ',', '.')}
    {/foreach}
    {* Si el saldo final es positivo se mostrará normal, en negativo se mostrará en rojo *}
    {if $saldo_final > 0}
        <tr class='saldoFinal'><td colspan='3'>Saldo total: </td><td>{$saldo_final} €</td></tr>
    {else}
        <tr class='saldoFinal'><td colspan='3'>Saldo total: </td><td class='negativo'>{$saldo_final} €</td></tr>
    {/if}
{* En el caso de no existir recibos, se muestra mensaje *}           
{else}
    <tr class='centrado'><td colspan='4'>No existen recibos que visualizar</td></tr>    
{/if}
</table>

{* Incluimos el pie de página de la web *}
{include file="smarty/templates/footer.tpl"}
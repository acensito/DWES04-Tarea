{* Incluimos el encabezado de página de la web *}
{include file="smarty/templates/header.tpl"}

{* Incluimos el menu de la web *}
{include file="smarty/templates/menu.tpl"}

<h4 class='centrado'>Recibos de su cuenta</h4>

{* Mensajes de devoluciones de recibos *}
{if isset($msg)}{$msg}{/if}

<form action="devoluciones.php" method="post">
    <table>
    <tr class='encabezado'><th>#</th><th>Fecha</th><th>Concepto</th><th>Cantidad</th></tr>
    {* Dibujamos las filas si existen recibos *}
    {if $recibos}
        {foreach $recibos as $indice => $recibo}
            <tr>
                <td class='centrado'><input type='radio' name='indice' value='{$recibo->getCodigoMov()}'></td>
                <td>{$recibo->getFecha()}</td>
                <td>{$recibo->getConcepto()}</td>
                <td class='negativo'>{number_format($recibo->getCantidad(), 2, ',', '.')}</td>
            </tr>
        {/foreach}
        {* Al existir recibos, se cierra aqui la tabla, y se muestran los botones de Devolver y Cancelar *}
        </table>
        <div class='centrado'><input type='submit' name='devolver' value='Devolver'> <input type='reset' name='cancelar' value='Cancelar'></div>
    {else}
        {* Al no existir recibos a visualizar, se muestra un mensaje y se cierra la tabla *}
        <tr class='centrado'><td colspan='4'>No existen recibos que visualizar</td></tr>
        </table>
    {/if}     
</form>

{* Incluimos el pie de página de la web *}
{include file="smarty/templates/footer.tpl"}
{* Incluimos el encabezado de página de la web *}
{include file="smarty/templates/header.tpl"}

{* Incluimos el menu de la web *}
{include file="smarty/templates/menu.tpl"}

{* Mensajes de información *}
{if isset($info)}{$info}{/if}

<h4 class='centrado'>Realizar un pago</h4>
{* Dibujamos el formulario de ingreso *}
<form action="pago.php" method="post">
    <fieldset class="menu"> 
        <legend>Pago</legend>
        {* Mantenemos los datos si aparecieran errores *}
        <label>Fecha: </label><input type="date" pattern="{$patron}" name="fecha" value="{if isset($fecha)}{$fecha}{/if}"/>
        <label>Concepto: </label><input type="text" name="concepto" value="{if isset($concepto)}{$concepto}{/if}"/>
        <label>Cantidad: </label><input type="text" name="cantidad" value="{if isset($cantidad)}{$cantidad}{/if}"/>
        <input type="submit" name="Pagar" value="Pagar">
    </fieldset>
</form>

{* Incluimos el pie de página de la web *}
{include file="smarty/templates/footer.tpl"}
{* Incluimos el encabezado de página de la web *}
{include file="smarty/templates/header.tpl"}

{* Incluimos el menu de la web *}
{include file="smarty/templates/menu.tpl"}

{* Mensajes de información *}
{if isset($info)}{$info}{/if}

<h4 class='centrado'>Realizar un ingreso</h4>
{* Dibujamos el formulario de ingreso *}
<form action="ingreso.php" method="post">
    <fieldset class="menu"> 
        <legend>Ingreso</legend>
        {* En el caso de errores, los campos mantendrán los datos para corregirlos *}
        <label>Fecha: </label><input type="date" pattern="{$patron}" name="fecha" value="{if isset($fecha)}{$fecha}{/if}"/>
        <label>Concepto: </label><input type="text" name="concepto" value="{if isset($concepto)}{$concepto}{/if}"/>
        <label>Cantidad: </label><input type="text" name="cantidad" value="{if isset($cantidad)}{$cantidad}{/if}"/>
        <input type="submit" name="Ingresar" value="Ingresar">
    </fieldset>
</form>

{* Incluimos el pie de página de la web *}
{include file="smarty/templates/footer.tpl"}
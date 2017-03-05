{* Incluimos el encabezado de página de la web *}
{include file="smarty/templates/header.tpl"}

{* Incluimos el menu de la web *}
{include file="smarty/templates/menu.tpl"}

<h4 class='centrado'>Ajustes de preferencias de usuario</h4>
{* Mostramos mensajes *}
{if isset($info)}{$info}{/if}

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

{* Incluimos el pie de página de la web *}
{include file="smarty/templates/footer.tpl"}

{include file="smarty/templates/header.tpl"}

<div class="container">
<form id="signup" action="index.php" method="post" class="pure-form pure-form-stacked">
    <div class="header">
        <h3>Acceso</h3>
        <p>Debes rellenar este formulario para acceder</p>
    </div>

    {* En el caso de existir un error será mostrado en este lugar *}
    {if isset($error)}{$error}{/if}

    <div class="inputs">
        <label>Usuario</label>
        {* En el caso de introducir mal un usuario/password, volverá el formulario a cargar con el usuario para un nuevo intento *}
        <input type="text" name="usuario" placeholder="Usuario" value="{if isset($user)}{$user}{/if}" autofocus />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" />
        <input id="submit" type="submit" name="ingresar" value="INGRESAR"/>
        <input id="submit" type="submit" name="registro" value="Registrarse"/>
    </div>
</form>
</div>

{include file="smarty/templates/footer.tpl"}
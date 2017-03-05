{include file="smarty/templates/header.tpl"}

<div class="container">
<form id="signup" action="registro.php" method="post">
    <div class="header">
        <h3>Registro</h3>
        <p>Debes rellenar este formulario para registrarte</p>
    </div>

    {* En el caso de existir información feedback será mostrado en este lugar *}
    {if isset($info)}{$info}{/if}

    <div class="inputs">
        {* En el caso de existir errores, se mantendrán los datos en el formulario *}
        <label>Usuario</label>
        <input type="text" name="usuario" placeholder="Usuario" value="{if isset($user)}{$user}{/if}" autofocus />
        <label>Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" value="{if isset($nombre)}{$nombre}{/if}" />
        <label>Fecha de nacimiento</label>
        <input type="date" name="fechaNac" placeholder="Fecha de Nacimiento" value="{if isset($fechaNac)}{$fechaNac}{/if}" />
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" />
        <label>Repita password</label>
        <input type="password" name="password2" placeholder="Repita Password" />     
        <input id="submit" type="submit" name="registrarse" value="REGISTRARSE"/>
    </div>
</form>
</div>

{include file="smarty/templates/footer.tpl"}

<?php if ($valor == 1):?>
    <p><?php echo $mensaje?></p>
<?php  else :?>
<div id="registro">
        <input type="text" id="nombreN" placeholder="Nombre"/><br>
        <input type="text" id="apellidoN" placeholder="Apellido"/><br>
        <input type="text" id="direccionN" placeholder="Dirección"/><br>
        <input type="text" id="telefonoN" placeholder="Teléfono"/><br>
        <input type="text" id="edadN" placeholder="Edad"/><br>
        <button id="btnRegisto">Registrar</button>
    </div>

<?php endif;?>

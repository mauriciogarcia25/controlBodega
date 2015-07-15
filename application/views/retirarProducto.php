<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <form class="form-group-sm">
        <label>Seleccione Producto</label>
        <select class="dropdown-header" style="width: 260px;" id="inProducto">
            <?php foreach ($resultado as $fila): ?>
                <option value="<?php echo $fila->id_producto ?>"><?php echo $fila->nombre ?></option>
            <?php endforeach; ?>
        </select>
    </form>
<?php endif; ?>
<br>
<label>Motivo</label>
<input type="text" id="inMotivo" class="form-control" style="width: 260px; height: 70px;" placeholder="Ej: Se retira para realizar cambio de alarma en vehiculo de 'juan perez'" required>
<br>
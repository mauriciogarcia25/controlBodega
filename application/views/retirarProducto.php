<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <form class="form-group">
        <h4>Seleccione Producto</h4>
        <select class="dropdown-header">
            <?php foreach ($resultado as $fila): ?>
                <option value="<?php echo $fila->id_producto ?>"><?php echo $fila->nombre ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Motivo</label>
        <input type="text" id="inMotivo" class="form-control" placeholder="Ej: Se retira para realizar cambio de alarma en vehiculo de 'juan perez'" required>
        <br>
        <button class="btn btn-sm btn-warning" id="btnRetira">Retirar Producto</button>
    </form>
<?php endif; ?>
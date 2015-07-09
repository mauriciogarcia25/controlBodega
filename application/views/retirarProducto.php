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
        <textarea class="text-info" title="Descripción Motivo" placeholder="Ingrese Motivo"></textarea>
        <br>
        <button class="btn btn-sm btn-warning">Retirar Producto</button>
    </form>
<?php endif; ?>
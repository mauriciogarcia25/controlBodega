<?php if ($cantidad == 0): ?>
    <p>No Hay Productos almacenados!</p>
<?php else: ?>
    <h3>Productos retirados</h3>
    <div class="table-responsive">
    <table class="table" id="tablaProductos">
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Precio</th>
        <th>motivo</th>
        <th>Responsable</th>
        <th>Fecha</th>
        <?php $i = 0;
        foreach ($resultado as $fila): ?>
            <tr>
                <td><?php echo $fila->nombre ?></td>
                <td><?php echo $fila->descripcion ?></td>
                <td><?php echo $fila->marca ?></td>
                <td><?php echo $fila->modelo ?></td>
                <td><?php echo $fila->precio ?></td>
                <td><?php echo $fila->motivo ?></td>
                <td><?php echo $fila->responsable ?></td>
                <td><?php echo $fila->fecha ?></td>
                <td>
                    <button id='eliminar<?php echo $i ?>' onclick='eliminarPR(<?php echo $fila->id_producto ?>)' class="btn btn-default"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </td>
            </tr>
        <?php $i++;
    endforeach; ?>
    </table>
    <div>
<?php endif; ?>
<input type="hidden" id='ocultoR' value='<?php echo $i ?>'/>
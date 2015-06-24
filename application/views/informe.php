<?php if ($cantidad == 0):?>
	<p><?php echo $mensaje?></p>
<?php  else :?>
<table class="tabla1">
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Direccion</th>
		<th>Edad</th>
<?php for ($i = 0; $i < $cantidad; $i++):?>
<tr>
	<td><?php echo $("nombre".$i)?></td>
	<td><?php echo $("apellido".$i)?></td>
	<td><?php echo $("direccion".$i)?></td>
	<td><?php echo $("edad".$i)?></td>
</tr>
<?endfor;?>
</table>
<?php endif;?>

<?php
class Modelo extends CI_Model {
	function conecta($usuario, $clave) {
/*-----------------------------------------------
Función conecta, esta función consulta a la 
base de datos por un usuario especifico en 
base a su usuario y su clave 
-----------------------------------------------*/
		$this->db->select('*');
		$this->db->where('usuario', $usuario);
		$this->db->where('clave', $clave);
		$respuesta = $this->db->get('usuario');
			if ($respuesta->num_rows() == 0){
				return false;
			} else {
				return true;
		}
	}
	function rescataNombre($usuario, $clave) {
/*------------------------------------------------
función que con el usuario y la clave rescata
información de la tabla usuario en espesifico 
del usuario consultado
-------------------------------------------------*/
		$this->db->select('nombre , apellido');
		$this->db->where('usuario', $usuario);
		$this->db->where('clave', $clave);
		$respuesta = $this->db->get('usuario');
		foreach ($respuesta->result() as $fila) {
			$nombre   = $fila->nombre;
			$apellido = $fila->apellido;
		}
		return $nombre." ".$apellido;
	}

	function guardarRegistro($nombre, $apellido, $direccion, $telefono, $edad, $usuario, $clave) {
		$datos = array(
			"nombre"    => $nombre,
			"apellido"  => $apellido,
			"direccion" => $direccion,
			"telefono"  => $telefono,
			"edad"      => $edad,
			"usuario"   => $usuario,
			"clave"     => $clave,
		);
		$this->db->insert('usuario', $datos);
	}
	function cargarRegistros() {
		//echo "modelo";
		$this->db->select('*');
		return $this->db->get('usuario');
	}
}

/**class Modelo extends CI_Model {
//Consulta si el usuario esta en la BD
funtion conecta($usuario,$clave){
//$Consulta = select * from usuario where usuario = $usuario and clave = $clave;
$this->db->select('*');
$this->db->where('usuario',$usuario);
$this->db->where('clave',$clave);
$respuesta = $this->db->get('usuario');
//$respuesta->num_rows();//numero de filas
//$respuesta->result();//Extraer los datos

if ($respuesta->num_rows()== 0) {
return false;
} else {
return true;
}

}
}**/
?>
<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}
class Controlador extends CI_Controller {
/*---------------------------------------------------------
En esta función se llama a la clase modelo, para
realizar la conexión con la base de datos 
----------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
		$this->load->model("modelo");
	}
/*----------------------------------------------------------
esta parte es el controladdor, donde están las funciones 
necesarias para llamar desde la base de datos a las vista,
como también, de la vista a la base de datos.
----------------------------------------------------------*/
	public function index() {
		$this->load->view("header");
		$this->load->view("footer");
	}
	function login() {
/*---------------------------------------------------------
función que es llamada por la vista para verificar 
la valides del usuario que desea ingresar, para ello
los datos enviados por post se reenvian al modelo,
el que compara los datos y devuelve valores de las
tablas de la base de datos para establecer la sesión del
usuario y determinarle un estado "loggeado"
---------------------------------------------------------*/
		$usuario = $this->input->post("usuario");
		$clave   = $this->input->post("clave");

		if ($this->modelo->conecta($usuario, $clave) == true) {
			$nombre = $this->modelo->rescataNombre($usuario, $clave);
			$datos  = array(
				"usuario"  => $usuario,
				"nombre"   => $nombre,
				"loggeado" => true
			);

		} else {
			$datos = array(
				"usuario"  => "",
				"loggeado" => false
			);
		}
		$this->session->set_userdata($datos);
	}
	function validaLogin() {
/*--------------------------------------------------------
esta función se encarga de validar si existe un usuario
ya activo en el caso de estarlo determina que tipo de 
usuario es, de lo contrario en caso de no estar loggeado
devuelve a la vista login dando así la posibilidad de 
ingresar
--------------------------------------------------------*/
		if ($this->session->userdata("loggeado")) {
			$datos['nombre'] = $this->session->userdata("nombre");
			$this->load->view("bienvenido", $datos);
		} else {
			$this->load->view("login");
		}
	}
	function matarCookie() {
/*--------------------------------------------------------
simple funcion que elimina el usuario que se encuentra 
activo, volviendo la aplicación a su vista login
--------------------------------------------------------*/
		$this->session->sess_destroy();
	}
	function validaSession2() {
		if ($this->session->userdata("loggeado")) {
			echo json_encode(array("mensaje" => "valido"));
		} else {
			echo json_encode(array("mensaje" => "no valido"));
		}
	}
}
/*-------------------------------------------------------------------
---------------------------------------------------------------------
	function cargaRegistro() {

		if ($this->session->userdata("loggeado")) {
			$datos['valor'] = 0;
			$this->load->view("registro", $datos);
		} else {
			$datos['valor']   = 1;
			$datos['mensaje'] = "Usuario no registrado";
			$this->load->view("registro", $datos);
		}
	}
	function cargarInforme() {
		$nombre    = $this->input->post("nombre");
		$apellido  = $this->input->post("apellido");
		$direccion = $this->input->post("direccion");
		$telefono  = $this->input->post("telefono");
		$edad      = $this->input->post("edad");
		$usuario   = $nombre[0].$apellido;
		$clave     = $apellido[0].$nombre;
		//no puedo almacenar al usuario si esta repetido ..
		if ($this->modelo->conecta($usuario, $clave) == false) {
			//ok podemos guardar los daots!
			$this->modelo->guardarRegistro($nombre, $apellido, $direccion, $telefono, $edad, $usuario, $clave);
			$mensaje = "Usuario Almacenado";
		} else {
			//Error usuario repetido
			$mensaje = "Usuario Repetido";
		}
		echo json_encode(array("mensaje" => $mensaje));
		//$this->load->view("informe", $datos);
	}
	
	function cargarRegistros() {
		//echo "hola";
		$respuesta = $this->modelo->cargarRegistros();
		//echo "h";
		$datos['cantidad'] = $respuesta->num_rows();

		if ($respuesta->num_rows() == 0) {
			$mensaje = "No hay datos";
		} else {
			$mensaje = "";

			$i = 0;
			foreach ($respuesta->result() as $fila) {
				$datos['nombre'.$i]    = $fila->nombre;
				$datos['apellido'.$i]  = $fila->apellido;
				$datos['direccion'.$i] = $fila->direccion;
				$datos['edad'.$i]      = $fila->edad;
				$i++;
			}
		}
		$datos['mensaje'] = $mensaje;
		//$this->load->view('informe2', $datos);
		$this->load->view('informe2', $datos);
	}
}
------------------------------------------------------------------
-----------------------------------------------------------------*/
/**$respuesta = $this->modelo->cargarRegistros();
$datos['cantidad'] = $respuesta->num_rows();
if ($respuesta->num_rows() == 0) {
$mensaje = "No datos";
} else {
$mensaje = "";
foreach ($respuesta->result() as $fila) {
$datos['nombre'.$i]    = $fila->nombre;
$datos['apellido'.$i]  = $fila->apellido;
$datos['direccion'.$i] = $fila->direccion;
$datos['edad'.$i]      = $fila->edad;
$i++;
}
}
$datos['mensaje'] = $mensaje;
$this->load->view('informe'$datos);**/
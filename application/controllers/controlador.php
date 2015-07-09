<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("modelo");
    }

    public function index() {
        $this->load->view('inicio');
    }

//    validadores de usuarios---------------------------------
    function usuario() {
        $usuario = $this->input->post("usuario");
        $clave = md5($this->input->post("clave"));

        if ($this->modelo->usuario($usuario, $clave) == true) {
            $nombre = $this->modelo->rescataNombre($usuario, $clave);
            $datos = array(
                "usuario" => $usuario,
                "nombre" => $nombre,
                "loggeado" => true
            );
        } else {
            $datos = array(
                "usuario" => "",
                "nombre" => "",
                "loggeado" => false
            );
        }
        $this->session->set_userdata($datos);
    }

    function validarSesion() {
        if ($this->session->userdata("loggeado")) {
            $datos['nombre'] = $this->session->userdata("nombre");
            $this->load->view("contenido", $datos);
        } else {
            $this->load->view("login");
        }
    }

    function salir() {
        $this->session->sess_destroy();
    }

//    cargadores de tablas------------------------------------
    function actualizaTabla() {
        $datos = $this->modelo->cargaProductos();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("tablaProductos", $data);
    }
    
    function infoProductoRetirados(){
        $datos = $this->modelo->cargaProductosRetirados();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("tablaProductosRetirados", $data);
    }

    function eliminarProducto() {
        $codigo = $this->input->post("codigo");
        $this->modelo->eliminarProducto($codigo);
    }

//    agregar Productos---------------------------------------
    function agregarProducto() {
        $this->load->view("agregarProducto");
    }
    
    function editarProducto(){
        $this->load->view("editarProducto");
    }

    function validaCodigoProducto() {
        $codigo = $this->input->post("codigo");
        $respuesta = $this->modelo->cargaProductoCodigo($codigo)->result();

        $nombre = "";
        $descripcion = "";
        $marca = "";
        $modelo = "";
        $precio = "";
        $stock = "";
        $responsable = "";
        $fecha = "";

        foreach ($respuesta as $fila):
            $nombre = $fila->nombre;
            $descripcion = $fila->descripcion;
            $marca = $fila->marca;
            $modelo = $fila->modelo;
            $precio = $fila->precio;
            $stock = $fila->stock;
            $responsable = $fila->responsable;
            $fecha = $fila->fecha;
        endforeach;
        echo json_encode(array(
            "codigo" => $codigo,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "marca" => $marca,
            "modelo" => $modelo,
            "precio" => $precio,
            "stock" => $stock,
            "responsable" => $responsable,
            "fecha" => $fecha
        ));
    }

    function addProducto() {
        $codigo = $this->input->post("codigo");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $marca = $this->input->post("marca");
        $modelo = $this->input->post("modelo");
        $precio = $this->input->post("precio");
        $stock = $this->input->post("stock");
        $responsable = $this->session->userdata('nombre');

        $this->modelo->addProducto($codigo, $nombre, $descripcion, $marca, $modelo, $precio, $stock, $responsable);
    }

    function retirarProducto() {
        $datos = $this->modelo->cargaProductos();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("retirarProducto", $data);
    }

}

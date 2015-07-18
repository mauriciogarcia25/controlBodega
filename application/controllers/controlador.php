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

    function usuario() {
        $usuario = $this->input->post("usuario");
        $clave = md5($this->input->post("clave"));

        if ($this->modelo->usuario($usuario, $clave) == true) {
            $data = $this->modelo->rescataNombre($usuario, $clave);
            $datos = array(
                "usuario" => $usuario,
                "nombre" => $data['nombre'],
                "apellido" => $data['apellido'],
                "tipo" => $data['tipo'],
                "loggeado" => true
            );
            $msj = "A ingresado con exito, ahora se cargará su pagina";
        } else {
            $datos = array(
                "usuario" => "",
                "nombre" => "",
                "apellido" => "",
                "tipo" => "",
                "loggeado" => false
            );
            $msj = "Usuario no encontrado";
        }
        echo json_encode($msj);
        $this->session->set_userdata($datos);
    }

    function validarSesion() {
        if ($this->session->userdata("loggeado")) {
            if ($this->session->userdata("tipo") == 0) {
                $this->load->view("contenidoRoot");
            } elseif($this->session->userdata("tipo") == 1) {
                $this->load->view("contenidoAdmin");
            }elseif($this->session->userdata("tipo") == 2){
                $this->load->view("contenidoAsis");
            }
        } else {
            $this->load->view("login");
        }
    }

    function salir() {
        $this->session->sess_destroy();
    }

    function actualizaTabla() {
        $datos = $this->modelo->cargaProductos();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("tablaProductos", $data);
    }

    function infoProductoRetirados() {
        $datos = $this->modelo->cargaProductosRetirados();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("tablaProductosRetirados", $data);
    }

    function eliminarProducto() {
        $codigo = $this->input->post("codigo");
        $this->modelo->eliminarProducto($codigo);
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

    function editarUser() {
        $codigo = $this->input->post("codigo");
        $respuesta = $this->modelo->cargaUser($codigo)->result();

        $nombre = "";
        $apellido = "";
        $direccion = "";
        $usuario = "";
        $clave = "";
        foreach ($respuesta as $fila):
            $nombre = $fila->nombre;
            $apellido = $fila->apellido;
            $direccion = $fila->direccion;
            $usuario = $fila->usuario;
            $clave = $fila->clave;
        endforeach;
        echo json_encode(array(
            "nombre" => $nombre,
            "apellido" => $apellido,
            "direccion" => $direccion,
            "usuario" => $usuario,
            "clave" => $clave
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

        if (empty($codigo) || empty($nombre) || empty($descripcion) || empty($marca) || empty($modelo) || empty($stock) || empty($precio)) {
            $msj = "alguno de los campos se encuentra vacios, debe completarlos para completar la acción";
        } else {
            $st = $stock + $stockdb;
            if ($this->modelo->addProducto($codigo, $nombre, $descripcion, $marca, $modelo, $precio, $stock, $responsable) == true) {
                $msj = "Producto Almacenado Correctamente";
            } else {
                $msj = "Se Produjo un Error, intentelo nuevamente";
            }
        }
        echo json_encode(array("mensaje" => $msj));
    }

    function addUser() {
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $direccion = $this->input->post("direccion");
        $tipo = $this->input->post("tipo");
        $usuario = $this->input->post("usuario");
        $clave = md5($this->input->post("clave"));
        if (empty($nombre) || empty($apellido) || empty($direccion) || empty($usuario) || empty($clave)) {
            $msj = "alguno de los campos se encuentran vacios, debe completarlos";
        } else {
            if ($this->modelo->addUser($nombre, $apellido, $direccion, $tipo, $usuario, $clave) == true) {
                $this->modelo->ultimoUser();
                $msj = "Usuario Almacenado";
            } else {
                $msj = "el usuario ya existe";
            }
        }
        echo json_encode(array("mensaje" => $msj));
    }

    function eliminarUser() {
        $codigo = $this->input->post("codigo");
        if ($this->modelo->eliminarUser($codigo) == false) {
            $msj = "no es posible eliminar este usuario";
        } else {
            $msj = "usuario eliminado";
            $this->modelo->ultimoUser();
        }
        echo json_encode(array("mensaje" => $msj));
    }

    function retirar() {
        $codigo = $this->input->post("codigo");
        $cantidad = $this->input->post("cantidad");
        $motivo = $this->input->post("motivo");
        $responsable = $this->session->userdata('nombre');
        if (empty($motivo) || empty($codigo) || empty($cantidad)) {
            $msj = "Contiene Alguno de los campos vacios, debe completarlos para continuar con la acción";
        } else {
            $respuesta = $this->modelo->cargaProductoCodigo($codigo)->result();

            $nombre = "";
            $descripcion = "";
            $marca = "";
            $modelo = "";
            $precio = "";

            foreach ($respuesta as $fila):
                $nombre = $fila->nombre;
                $descripcion = $fila->descripcion;
                $marca = $fila->marca;
                $modelo = $fila->modelo;
                $precio = $fila->precio;
            endforeach;
            $this->modelo->retirar($codigo, $nombre, $descripcion, $marca, $modelo, $precio, $motivo, $responsable);
            $msj = "Producto retirado con exito";
        }
        echo json_encode(array("mensaje" => $msj));
    }

    function listarUsuarios() {
        $datos = $this->modelo->listaUsuarios();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("listaUsuarios", $data);
    }

    function retirarProducto() {
        $datos = $this->modelo->cargaProductos();
        $data['cantidad'] = $datos->num_rows();
        $data['resultado'] = $datos->result();
        $this->load->view("retirarProducto", $data);
    }

    function estadoUsuario() {
        if ($this->session->userdata("loggeado")) {
            $this->load->view("estadoUsuario");
        }
    }

    function eliminarPR() {
        $codigo = $this->input->post(codigo);
        $this->modelo->eliminarPR($codigo);
    }

}

?>
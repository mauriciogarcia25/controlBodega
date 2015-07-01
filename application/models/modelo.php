<?php

class Modelo extends CI_Model {

    function usuario($usuario, $clave) {
        $this->db->select('*');
        $this->db->where('id_usuario', $usuario);
        $this->db->where('clave', $clave);
        $respuesta = $this->db->get('usuarios');

        if ($respuesta->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    function cargaProductos() {
        $this->db->select("*");
        return $this->db->get("productos");
    }

    function eliminarProducto($codigo) {
        $this->db->where("codigo", $codigo);
        $this->db->delete("productos");
    }

    function cargaProductoCodigo($codigo) {
        $this->db->select("*");
        $this->db->where("codigo", $codigo);
        return $this->db->get("productos");
    }

    function insertarProducto($codigo, $nombre, $descripcion, $marca, $modelo, $precio, $stock) {
        $this->db->select("codigo");
        $this->db->where("codigo", $codigo);
        $cant = $this->db->get("productos")->num_rows();

        if ($cant == 0) {
            $datos = array(
                "codigo" => $codigo,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "modelo" => $modelo,
                "precio" => $precio,
                "stock" => $stock
            );
            $this->db->insert("productos", $datos);
        } else {
            $datos = array(
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "modelo" => $modelo,
                "precio" => $precio,
                "stock" => $stock
            );
            $this->db->where("codigo", $codigo);
            $this->db->update("productos", $datos);
        }
    }

}

?>
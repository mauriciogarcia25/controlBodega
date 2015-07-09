<?php

class Modelo extends CI_Model {

    function usuario($usuario, $clave) {
        $this->db->select('*');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $respuesta = $this->db->get('usuarios');

        if ($respuesta->num_rows() == 0) {
            return false;
        } else {
            return true;
        }
    }

    function rescataNombre($usuario, $clave) {
        $this->db->select('nombre, apellido');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $respuesta = $this->db->get('usuarios');

        foreach ($respuesta->result() as $fila) {
            $nombre = $fila->nombre;
            $apellido = $fila->apellido;
        }
        return $nombre . " " . $apellido;
    }

    function cargaProductos() {
        $this->db->select("*");
        return $this->db->get("productos");
    }

    function cargaProductosRetirados() {
        $this->db->select("*");
        return $this->db->get("productos_retirados");
    }

    function eliminarProducto($codigo) {
        $this->db->where("id_producto", $codigo);
        $this->db->delete("productos");
    }

    function cargaProductoCodigo($codigo) {
        $this->db->select("*");
        $this->db->where("id_producto", $codigo);
        return $this->db->get("productos");
    }

    function addProducto($codigo, $nombre, $descripcion, $marca, $modelo, $precio, $stock, $responsable) {
        $this->db->select("id_producto");
        $this->db->where("id_producto", $codigo);
        $cant = $this->db->get("productos")->num_rows();

        if ($cant == 0) {
            $datos = array(
                "id_producto" => $codigo,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "modelo" => $modelo,
                "precio" => $precio,
                "stock" => $stock,
                "responsable" => $responsable
            );
            $this->db->insert("productos", $datos);
        } else {
            $datos = array(
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "marca" => $marca,
                "modelo" => $modelo,
                "precio" => $precio,
                "stock" => $stock,
                "responsable" => $responsable
            );
            $this->db->where("id_producto", $codigo);
            $this->db->update("productos", $datos);
        }
    }

}
?>


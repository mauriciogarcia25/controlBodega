<?php

class Modelo extends CI_Model {

    function usuario($usuario, $clave) {
        $this->db->select('*');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $res = $this->db->get('usuarios');
        foreach ($res->result() as $fila) {
            $estado = $fila->estado;
        }
        if ($estado == 0) {
            return false;
        } else {
            return true;
        }
    }

    function rescataNombre($usuario, $clave) {
        $this->db->select('*');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $res = $this->db->get('usuarios');
        
        $data["nombre"]="";
        $data["apeliido"]="";
        $data["tipo"]="";
        
        foreach ($res->result() as $fila) {
            $data["nombre"] = $fila->nombre;
            $data["apellido"] = $fila->apellido;
            $data["tipo"] = $fila->tipo;
        }
        return $data;
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

    function eliminarPR($codigo){
        $this->db->where("id_producto", $codigo);
        $this->db->delete("productos_retirados");
    }

    function cargaProductoCodigo($codigo) {
        $this->db->select("*");
        $this->db->where("id_producto", $codigo);
        return $this->db->get("productos");
    }

    function cargaUser($codigo) {
        $this->db->select("*");
        $this->db->where("id_usuario", $codigo);
        return $this->db->get("usuarios");
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
            return true;
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
            return true;
        }
    }

    function addUser($nombre, $apellido, $direccion, $tipo, $usuario, $clave) {
        $this->db->select('*');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', $clave);
        $res = $this->db->get('usuarios');

        $estado = 1;

        if ($res->num_rows() == 0) {
            $datos = array(
                "nombre" => $nombre,
                "apellido" => $apellido,
                "direccion" => $direccion,
                "tipo" => $tipo,
                "usuario" => $usuario,
                "clave" => $clave,
                "estado" => $estado
            );
            $this->db->insert("usuarios", $datos);
            return true;
        } else {
            return false;
        }
    }

    function ultimoUser() {
        $this->db->select("*");
        $res = $this->db->get('usuarios');

        if ($res->num_rows() <= 1) {
            $codigo = 1;
            $estado = 1;
            $datos = array(
                "estado" => $estado
            );
            $this->db->where("id_usuario", $codigo);
            $this->db->update("usuarios", $datos);
        } else {
            $codigo = 1;
            $estado = 0;
            $datos = array(
                "estado" => $estado
            );
            $this->db->where("id_usuario", $codigo);
            $this->db->update("usuarios", $datos);
        }
    }

    function eliminarUser($codigo) {
        $this->db->select("*");
        $res = $this->db->get('usuarios');

        if ($res->num_rows() <= 1) {
            return FALSE;
        } else {
            if($codigo == 1){
                return FALSE;
            }else{
                $this->db->where("id_usuario", $codigo);
            $this->db->delete("usuarios");
            return TRUE;
            }
        }
    }

    function retirar($nombre, $descripcion, $marca, $modelo, $precio, $motivo, $responsable) {
        $datos = array(
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "marca" => $marca,
            "modelo" => $modelo,
            "precio" => $precio,
            "motivo" => $motivo,
            "responsable" => $responsable
        );
        $this->db->insert('productos_retirados', $datos);
    }

    function listaUsuarios() {
//select * from `usuarios` where estado != 0
        $this->db->select("*");
        $this->db->from('usuarios');
        $this->db->where('estado != 0');
        return $this->db->get();
    }

}
?>


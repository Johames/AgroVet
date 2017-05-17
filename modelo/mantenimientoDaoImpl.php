<?php

require_once '../database/dataBase.php';

class Mantenimiento {

    function __construct() {
        
    }

    //TODO CATEGORIA

    public static function ListaCategoria($idCat) {
        $query = "SELECT categoria_id, nombre FROM categoria WHERE categoria_id=" . $idCat;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaCategoriaEstado($estado) {
        $query = "SELECT categoria_id, nombre, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM categoria WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarCategoria($nombre, $user) {
        try {
            $query = "INSERT INTO categoria(nombre, estado, usuario_id_reg) VALUES ('" . $nombre . "', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //eliminar un registro de la persona, en realida cambiar el estado a 0 :)
    public static function EliminarCategoria($categoria_id) {
        try {
            $query = "UPDATE categoria SET estado = '0' WHERE categoria_id=$categoria_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //Activar un registro de la categoria, en realida cambiar el estado a 1 :)
    public static function ActivarCategoria($categoria_id) {
        try {
            $query = "UPDATE categoria SET estado = '1' WHERE categoria_id=$categoria_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //Editar los datos de una persona :D
    public static function EditarCategoria($categoria_id, $nombre_cat, $user) {
        try {
            $query = "UPDATE categoria SET nombre='" . $nombre_cat . "', usuario_id_reg=" . $user . " WHERE categoria_id=" . $categoria_id. "";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO ESTADO CIVIL
    public static function ListaEstadoCivil($idec) {
        $query = "SELECT estado_civil_id, nombre_estado FROM estado_civil WHERE estado_civil_id=".$idec."";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaEstadoCivilEstado($estado) {
        $query = "SELECT estado_civil_id, nombre_estado, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM estado_civil WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarEstadCivil($nombre_estado, $user) {
        try {
            $query = "INSERT INTO estado_civil(nombre_estado, estado, usuario_id_reg) VALUES ('" . $nombre_estado . "', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function EliminarEstadoCivil($estado_civil_id) {
        try {
            $query = "UPDATE estado_civil SET estado = '0' WHERE estado_civil_id=$estado_civil_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ActivarEstadoCivil($estado_civil_id) {
        try {
            $query = "UPDATE estado_civil SET estado = '1' WHERE estado_civil_id=$estado_civil_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function EditarEstadoCivil($nombre_estado, $user_id, $estado_civil_id) {
        try {
            $query = "UPDATE estado_civil SET nombre_estado = '" . $nombre_estado . "', usuario_id_reg =".$user_id." WHERE estado_civil_id=".$estado_civil_id."";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO MARCA
    public static function ListaMarca($id) {
        $query = "SELECT marca_id, nombre FROM marca WHERE marca_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaMarcaEstado($estado) {
        $query = "SELECT marca_id, nombre, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM marca WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarMarca($nombre_marca, $user) {
        try {
            $query = "INSERT INTO marca(nombre, estado, usuario_id_reg) VALUES ('" . $nombre_marca . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EditarMarca($nombre_marca, $user_id, $marca_id) {
        try {
            $query = "UPDATE marca SET nombre = '" . $nombre_marca . "', usuario_id_reg =".$user_id." WHERE marca_id=".$marca_id."";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarMarca($marca_id) {
        try {
            $query = "UPDATE marca SET estado = '0' WHERE marca_id=$marca_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarMarca($marca_id) {
        try {
            $query = "UPDATE marca SET estado = '1' WHERE marca_id=$marca_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }


    //TODO GRADO DE INSTRUCCION
    public static function ListaGradoInstruccion($id) {
        $query = "SELECT grado_instruccion_id, nombre_grado FROM grado_instruccion WHERE grado_instruccion_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaGradoInstruccionEstado($estado) {
        $query = "SELECT grado_instruccion_id, nombre_grado, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM grado_instruccion where estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarGradoInstruccion($nombre_grado, $user) {
        try {
            $query = "INSERT INTO grado_instruccion(nombre_grado, estado, usuario_id_reg) VALUES ('" . $nombre_grado . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EditarGradoInstruccion($nombre_instruccion, $user_id, $grado_id) {
        try {
            $query = "UPDATE grado_instruccion SET nombre_grado = '" . $nombre_instruccion . "', usuario_id_reg =".$user_id." WHERE grado_instruccion_id=".$grado_id."";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarGradoInstruccion($grado_instruccion_id) {
        try {
            $query = "UPDATE grado_instruccion SET estado = '0' WHERE grado_instruccion_id=$grado_instruccion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarGradoInstruccion($grado_instruccion_id) {
        try {
            $query = "UPDATE grado_instruccion SET estado = '1' WHERE grado_instruccion_id=$grado_instruccion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }


    //TODO PERSONA
    //
    //obtener lista de la persona por estado
    public static function getPersonaEst($estado) {
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM persona WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    //obtener lista de la persona por id
    public static function getPersonaId($id) {
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac FROM persona WHERE estado=" . $id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    //Agregar los datos de una persona :D
    public static function AgregarPersona($nombres, $apellidos, $procedencia, $nacimiento, $genero, $user) {
        try {
            $query = "INSERT INTO persona(nombres, apellidos, procedencia, fech_nac, genero, estado, usuario_id_reg) "
                    . "VALUES ($nombres, $apellidos, $procedencia, $nacimiento, $genero, '1', $user)";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //eliminar un registro de la persona, en realida cambiar el estado a 0 :)
    public static function deletePersona($persona_id) {
        try {
            $query = "UPDATE persona SET estado=0 WHERE persona_id=" . $persona_id;
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //Editar los datos de una persona :D
    public static function editPersona($persona_id) {
        try {
            $query = "UPDATE persona SET estado=0 WHERE persona_id=" . $persona_id;
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarPersona($persona_id) {
        try {
            $query = "UPDATE persona SET estado = '1' WHERE persona_id=$persona_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO PRODUCTO
    public static function ListaProducto($id) {
        $query = "SELECT producto_id, nombre, descripcion FROM producto WHERE producto_id="+$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaProductoEstado($estado) {
        $query = "SELECT p.producto_id, p.nombre, p.descripcion, p.imagen, case p.estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado, m.marca_id, m.nombre as marca, c.categoria_id, c.nombre as categoria, pr.presentacion_id, pr.nombre_presentacion as presentacion FROM producto p, categoria c, marca m, presentacion pr WHERE p.categoria_id=c.categoria_id AND p.marca_id=m.marca_id AND pr.presentacion_id=p.presentacion_id AND p.estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarProducto($nombre, $descripcion, $categoria_id, $marca_id, $presentacion, $user) {
        try {
            $query = "INSERT INTO producto(nombre, descripcion, estado, categoria_id, marca_id, usuario_id_reg, presentacion_id) VALUES ('" . $nombre . "','" . $descripcion . "', '1', '" . $categoria_id . "','" . $marca_id . "', " . $user . ",'" . $presentacion . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EditarProducto($nombre_instruccion, $descripcion, $marca_id, $categoria_id, $presentacion_id, $user_id, $producto_id) {
        try {
            $query = "UPDATE producto SET nombre = '" . $nombre_instruccion . "', descripcion = '".$descripcion."', marca_id='".$marca_id."', categoria='".$categoria_id."', presentacion_id='".$presentacion_id."', usuario_id_reg =".$user_id." WHERE producto_id=".$producto_id."";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarProducto($producto_id) {
        try {
            $query = "UPDATE producto SET estado = '0' WHERE producto_id=$producto_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarProducto($producto_id) {
        try {
            $query = "UPDATE producto SET estado = '1' WHERE producto_id=$producto_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }


    //TODO UNIDAD MEDIDA

    public static function ListaUnidadMedida($id) {
        $query = "SELECT unidad_medida_id, nomb_uni_med, abreviatura, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM unidad_medida WHERE unidad_medida_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaUnidadMedidaEstado($estado) {
        $query = "SELECT unidad_medida_id, nomb_uni_med, abreviatura, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM unidad_medida WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarUnidadMedida($nombre_unidad, $abreviatura, $user) {
        try {
            $query = "INSERT INTO unidad_medida(nomb_uni_med, abreviatura, estado, usuario_id_reg) VALUES ('" . $nombre_unidad . "', '" . $abreviatura . "', 1, " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
        public static function EliminarUnidadMedida($unidad_medida_id) {
        try {
            $query = "UPDATE unidad_medida SET estado = '0' WHERE unidad_medida_id=$unidad_medida_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EditarUnidadMedida($unidad_medida_id, $nombre_unidad, $abreviatura_id, $usuario_id_reg) {
        try {
            $query = "UPDATE unidad_medida SET nomb_uni_med='".$nombre_unidad."', abreviatura='".$abreviatura_id."', usuario_id_reg='".$usuario_id_reg."' WHERE unidad_medida_id=$unidad_medida_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarUnidadMedida($unidad_medida_id) {
        try {
            $query = "UPDATE unidad_medida SET estado = '1' WHERE unidad_medida_id=$unidad_medida_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }


    //TODO SUCURSAL
    public static function ListaSucursal($id) {
        $query = "SELECT sucursal_id, nombre, direccion, telefono, codigo_postal, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM sucursal WHERE sucursal_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaSucursalEstado($estado) {
        $query = "SELECT sucursal_id,nombre, direccion, telefono, codigo_postal, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM sucursal WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarSucursal($nombre, $direccion, $telefono, $codigo_postal, $user) {
        try {
            $query = "INSERT INTO sucursal(nombre, direccion, telefono, codigo_postal, estado, usuario_id_reg) VALUES ('" . $nombre . "', '" . $direccion . "', '" . $telefono . "', '" . $codigo_postal . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarSucursal($sucursal_id) {
        try {
            $query = "UPDATE sucursal SET estado = '0' WHERE sucursal_id=$sucursal_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarSucursal($sucursal_id) {
        try {
            $query = "UPDATE sucursal SET estado = '1' WHERE sucursal_id=$sucursal_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO TIPO CMPROBANTE
    public static function ListaTipoComprobante($id) {
        $query = "SELECT tipo_comprobante_id, descripcion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_comprobante WHERE tipo_comprobante_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaTipoComprobanteEstado($estado) {
        $query = "SELECT tipo_comprobante_id, descripcion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_comprobante WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarTipoComprobante($descripcion, $user) {
        try {
            $query = "INSERT INTO tipo_comprobante(descripcion, estado, usuario_id_reg) VALUES ('" . $descripcion . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarTipoComprobante($tipo_comprobante_id) {
        try {
            $query = "UPDATE tipo_comprobante SET estado = '0' WHERE tipo_comprobante_id=$tipo_comprobante_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarTipoComprobante($tipo_comprobante_id) {
        try {
            $query = "UPDATE tipo_comprobante SET estado = '1' WHERE tipo_comprobante_id=$tipo_comprobante_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO TIPO MOVIMIENTO
    public static function ListaTipoMovimiento($id) {
        $query = "SELECT tipo_movimiento_id, nombre_movimiento, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_movimiento WHERE tipo_movimiento_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaTipoMovimientoEstado($estado) {
        $query = "SELECT tipo_movimiento_id, nombre_movimiento, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_movimiento WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function AgregarTipoMovimiento($nombre_movimiento, $user) {
        try {
            $query = "INSERT INTO tipo_movimiento(nombre_movimiento, estado, usuario_id_reg) VALUES ('" . $nombre_movimiento . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarTipoMovimiento($tipo_movimiento_id) {
        try {
            $query = "UPDATE tipo_movimiento SET estado = '0' WHERE tipo_movimiento_id=$tipo_movimiento_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarTipoMovimiento($tipo_movimiento_id) {
        try {
            $query = "UPDATE tipo_movimiento SET estado = '1' WHERE tipo_movimiento_id=$tipo_movimiento_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO TIPO DOCUMENTO
    public static function ListaTipoDocumento($id) {
        $query = "SELECT tipo_documento_id, nombre, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_documento WHERE tipo_docuento_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaTipoDocumentoEstado($estado) {
        $query = "SELECT tipo_documento_id, nombre, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_documento WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
     public static function AgregarTipoDocumento($nombre, $user) {
        try {
            $query = "INSERT INTO tipo_documento(nombre, estado, usuario_id_reg) VALUES ('" . $nombre . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarTipoDocumento($tipo_documento_id) {
        try {
            $query = "UPDATE tipo_documento SET estado = '0' WHERE tipo_documento_id=$tipo_documento_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarTipoDocumento($tipo_documento_id) {
        try {
            $query = "UPDATE tipo_documento SET estado = '1' WHERE tipo_documento_id=$tipo_documento_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO TIPO DOCUMENTO
    public static function ListaTipoTransaccion($id) {
        $query = "SELECT tipo_transaccion_id, descripcion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_transaccion WHERE tipo_transaccion_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaTipoTransaccionEstado($estado) {
        $query = "SELECT tipo_transaccion_id, descripcion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM tipo_transaccion WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
     public static function AgregarTipoTransaccion($descripcion, $user) {
        try {
            $query = "INSERT INTO tipo_transaccion(descripcion, estado, usuario_id_reg) VALUES ('" . $descripcion . "', '1', " . $user . ")";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarTipoTransaccion($tipo_transaccion_id) {
        try {
            $query = "UPDATE tipo_transaccion SET estado = '0' WHERE tipo_transaccion_id=$tipo_transaccion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarTipoTransaccion($tipo_transaccion_id) {
        try {
            $query = "UPDATE tipo_transaccion SET estado = '1' WHERE tipo_transaccion_id=$tipo_transaccion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //TODO TIPO DOCUMENTO
    public static function ListaArea($id) {
        $query = "SELECT area_id, nombre_area, case tipo when 1 then 'Principal' when 0 then 'Secundaria' END as tipo, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM area WHERE area_id=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaAreaEstado($estado) {
        $query = "SELECT area_id, nombre_area, case tipo when 1 then 'Principal' when 0 then 'Secundaria' END as tipo, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM area WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    //eliminar un registro de la area, en realida cambiar el estado a 0 :)
    public static function EliminarArea($area_id) {
        try {
            $query = "UPDATE area SET estado = '0' WHERE area_id=$area_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarArea($nombre, $tipo, $user) {
        try {
            $query = "INSERT INTO area(nombre_area, tipo, estado, usuario_id_reg) VALUES('" . $nombre . "','" . $tipo . "', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    //activar un registro de la area, en realida cambiar el estado a 1 :)
    public static function ActivarArea($area_id) {
        try {
            $query = "UPDATE area SET estado = '1' WHERE area_id=$area_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    
    public static function ListaUnidadEmpaqueId($id) {
        $query = "SELECT unidad_empaque_id, nombre_empaque, cantidad, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM unidad_empaque WHERE unidad_empaque_id=" . $id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    
    public static function ListaUnidadEmpaque($estado) {
        $query = "SELECT unidad_empaque_id, nombre_empaque, cantidad, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM unidad_empaque WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function AgregarUnidadEmpaque($nombre_empaque, $cantidad, $user) {
        try {
            $query = "INSERT INTO unidad_empaque(nombre_empaque, cantidad, estado, usuario_id_reg) VALUES('" . $nombre_empaque . "','" . $cantidad . "', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarUnidadEmpaque($unidad_empaque_id) {
        try {
            $query = "UPDATE unidad_empaque SET estado = '0' WHERE unidad_empaque_id=$unidad_empaque_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarUnidadEmpaque($unidad_empaque_id) {
        try {
            $query = "UPDATE unidad_empaque SET estado = '1' WHERE unidad_empaque_id=$unidad_empaque_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaLoteId($id) {
        $query = "SELECT lote_id, numero_lote, fecha_vencimiento, fecha_produccion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM lote WHERE lote_id=" . $id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function ListaLote($estado) {
        $query = "SELECT lote_id, numero_lote, fecha_vencimiento, fecha_produccion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM lote WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function AgregarLote($numero_lote, $fecha_vencimiento, $fecha_produccion, $user) {
        try {
            $query = "INSERT INTO lote(numero_lote, fecha_vencimiento, fecha_produccion, estado, usuario_id_reg) VALUES('" . $numero_lote. "','" . $fecha_vencimiento . "', '".$fecha_produccion."', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarLote($lote_id) {
        try {
            $query = "UPDATE lote SET estado = '0' WHERE lote_id=$lote_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarLote($lote_id) {
        try {
            $query = "UPDATE lote SET estado = '1' WHERE lote_id=$lote_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ListaPresentacionId($id) {
        $query = "SELECT presentacion_id, nombre_presentacion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM presentacion WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ListaPresentacion($estado) {
        $query = "SELECT presentacion_id, nombre_presentacion, case estado when 1 then 'Activo' when 0 then 'Inactivo' END as estado FROM presentacion WHERE estado=" . $estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function AgregarPresentacion($nombre_presentacion, $user) {
        try {
            $query = "INSERT INTO presentacion(nombre_presentacion, estado, usuario_id_reg) VALUES('" . $nombre_presentacion. "', '1', '" . $user . "')";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function EliminarPresentacion($presentacion_id) {
        try {
            $query = "UPDATE presentacion SET estado = '0' WHERE presentacion_id=$presentacion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ActivarPresentacion($presentacion_id) {
        try {
            $query = "UPDATE presentacion SET estado = '1' WHERE presentacion_id=$presentacion_id";
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public static function ListaUbigeoPais() {
        $query = "SELECT ubigeo_id, nombre FROM ubigeo where sububigeo_id=51000000";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
        public static function ListaUbigeoSub($sububigeo_id) {
        $query = "SELECT ubigeo_id, nombre FROM ubigeo where sububigeo_id=".$sububigeo_id."";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
}

?>

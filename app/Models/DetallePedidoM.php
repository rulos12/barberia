<?php

namespace App\Models;

use CodeIgniter\Model;

class DetallePedidoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detalle_pedido';
    protected $primaryKey       = 'id_detalle_pedido';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detalle_pedido', 'id_pedido', 'id_producto', 'cantidad', 'precio_unitario'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getBefore($idCliente)
    {
        // Consulta para obtener el nombre del producto y el estado del pedido mediante la tabla detalle pedido

        $db = db_connect();

        $sql = "select detalle_pedido.*, producto.nombre, pedido.estado
        from detalle_pedido 
        left join producto on detalle_pedido.id_producto = producto.id_producto
        left join pedido on detalle_pedido.id_pedido =pedido.id_pedido
        where id_cliente =" . $idCliente . " and estado = 'pendiente' ";
        $query = $db->query($sql);
        return $query->getResult();
    }
    public function getAfter($idCliente)
    {
        // Consulta para obtener el nombre del producto y el estado del pedido mediante la tabla detalle pedido

        $db = db_connect();

        $sql = "select detalle_pedido.*, producto.nombre, pedido.estado
        from detalle_pedido 
        left join producto on detalle_pedido.id_producto = producto.id_producto
        left join pedido on detalle_pedido.id_pedido =pedido.id_pedido
        where id_cliente =" . $idCliente . " and estado = 'completado' ";
        $query = $db->query($sql);
        return $query->getResult();
    }
}

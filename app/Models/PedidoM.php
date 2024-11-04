<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pedido';
    protected $primaryKey       = 'id_pedido';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_producto', 'id_cliente', 'fecha_pedido', 'estado', 'total', 'fecha_entrega'];

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

    public function getPedidoConCliente()
    {
        // Consultas para obtener solo el nombre del cliente

        return $this->select('pedido.*, cliente.nombreCliente')
            ->join('cliente', 'pedido.id_cliente = cliente.id_cliente',' left')
            ->findAll();
    }

    public function getEstadoPedido($id_pedido)
    {
        $db = db_connect();

        $sql = "select estado
                from pedido where id_pedido = " . $id_pedido;
        $query = $db->query($sql);


        return $query->getResult();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleCompraM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detalle_compra';
    protected $primaryKey       = 'id_detalle_compra';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detalle_compra','id_compra','id_producto','cantidad','precio_unitario'];

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


    public function getDetalleConProducto()
    {
        // Consultas para obtener solo el nombre del producto

        return $this->select('detalle_compra.*, producto.nombre')
                    ->join('producto', 'detalle_compra.id_producto = producto.id_producto')
                    ->findAll();
    }
    public function getDetalleCompraWhere($id_compra){
        $db = db_connect();

        $sql= "select detalle_compra.*, 
                from detalle_compra where id_compra = ". $id_compra;
        $query= $db->query($sql);

       
        return $query->getResult();
    }




}

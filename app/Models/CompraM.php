<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'compra';
    protected $primaryKey       = 'id_compra';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_compra','id_proveedor','fecha_compra','estado','total','fecha_recepcion'];

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

    public function getCompraConProveedor()
    {
        // Consultas para obtener solo el nombre de la marca

        return $this->select('compra.*, proveedor.nombreProveedor')
                    ->join('proveedor', 'compra.id_proveedor = proveedor.id_proveedor')
                    ->findAll();
    }

    public function getEstadoCompra($id_compra){
        $db = db_connect();

        $sql= "select estado
                from compra where id_compra = ". $id_compra;
        $query= $db->query($sql);

       
        return $query->getResult();
    }

    
}

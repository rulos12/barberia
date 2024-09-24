<?php
// Modelo de Producto

namespace App\Models;

use CodeIgniter\Model;

class ProductoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Producto';
    protected $primaryKey       = 'id_producto';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nombre','precio','descripcion','stock','id_marca','id_tipo', 'id_proveedor'];

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

    

    public function getProductosConMarca()
    {
        // Consultas para obtener solo el nombre de la marca

        return $this->select('producto.*, marca.nombreMarca')
                    ->join('marca', 'producto.id_marca = marca.id_marca')
                    ->findAll();
    }

    public function getProductosCon()
    {
        // Consultas para obtener solo el nombre de la marca, proveedor, tipo

        return $this->select('producto.*, marca.nombreMarca, proveedor.nombreProveedor, tipo.nombreTipo')
                ->join('marca', 'producto.id_marca = marca.id_marca' , 'left')
                ->join('proveedor', 'producto.id_proveedor = proveedor.id_proveedor', 'left')
                ->join('tipo', 'producto.id_tipo = tipo.id_tipo', 'left')
                ->findAll(); 

    }

} 

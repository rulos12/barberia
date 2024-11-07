<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empleado';
    protected $primaryKey       = 'id_empleado';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_empleado','nombreEmpleado','direccion','telefono','email','puesto','fecha_contratacion'];

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


    public function getEmpleado(){
        $db = db_connect();

        $sql= "select * 
                from empleado where puesto = 'Barbero' || puesto = 'Estilista'" ;
        $query= $db->query($sql);

       
        return $query->getResult();
        

    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class CitaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cita';
    protected $primaryKey       = 'id_cita';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_cita','id_cliente','id_empleado','fecha_cita','hora_cita','servicio','estado'];

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

    public function getCitasCon()
    {
        // Consultas para obtener solo el nombre de la marca, proveedor, tipo

        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
                ->join('cliente', 'cita.id_cliente = cliente.id_cliente' , 'left')
                ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
                ->findAll(); 

    }
    public function getEstadoCita($id_cita){
        $db = db_connect();

        $sql= "select estado
                from cita where id_cita = ". $id_cita;
        $query= $db->query($sql);

       
        return $query->getResult();
        

    }
}

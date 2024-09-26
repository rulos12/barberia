<?php

namespace App\Models;

use CodeIgniter\Model;

class EventoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'evento';
    protected $primaryKey       = 'id_evento';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_evento','titulo','descripcion','fecha_evento','id_empleado'];

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


    public function getEventoEmpleado()
    {
        // Consultas para obtener solo el nombre de la marca

        return $this->select('evento.*, empleado.nombreEmpleado')
                    ->join('empleado', 'evento.id_empleado = empleado.id_empleado')
                    ->findAll();
    }
}

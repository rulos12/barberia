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
    protected $allowedFields    = ['id_cita', 'id_cliente', 'id_empleado', 'fecha_cita', 'hora_cita', 'servicio', 'estado'];

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

    public function getCitasCon($idEmpleado)
    {
        // Consultas para obtener solo el nombre de la marca, proveedor, tipo

        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->where('cita.id_empleado', $idEmpleado)
            ->findAll();
    }
    public function getCitasAdmin()
    {
        // Consultas para obtener solo el nombre de la marca, proveedor, tipo

        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->findAll();
    }
    public function getCitasConBack($idEmpleado)
    {
        // Consultas para obtener solo el nombre de la marca, proveedor, tipo

        
        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->where('cita.id_empleado', $idEmpleado)
            ->where('estado', 'programada')
            ->findAll();
    }
    public function getCitasOrdenas($ordenBy = 'id_cita', $direction = 'ASC',$idEmpleado)
    {

        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->where('cita.id_empleado', $idEmpleado)
            ->orderBy($ordenBy, $direction)
            ->findAll();
    }
    public function getCitasOrdenasAdmin($ordenBy = 'id_cita', $direction = 'ASC')
    {

        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->orderBy($ordenBy, $direction)
            ->findAll();
    }
    public function getEstadoCita($id_cita)
    {
        $db = db_connect();

        $sql = "select estado
                from cita where id_cita = " . $id_cita;
        $query = $db->query($sql);


        return $query->getResult();
    }
    public function getServicioCita($id_cita)
    {
        $db = db_connect();

        $sql = "select servicio
                from cita where id_cita = " . $id_cita;
        $query = $db->query($sql);


        return $query->getResult();
    }
    public function getCitaBefore($idCliente)
    {
        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->where('cita.id_cliente', $idCliente)
            ->where('estado', 'completada')
            ->findAll();
    }
    public function getCitaAfter($idCliente)
    {
        return $this->select('cita.*, cliente.nombreCliente, empleado.nombreEmpleado')
            ->join('cliente', 'cita.id_cliente = cliente.id_cliente', 'left')
            ->join('empleado', 'cita.id_empleado = empleado.id_empleado', 'left')
            ->where('cita.id_cliente', $idCliente)
            ->where('estado', 'programada')
            ->findAll();
    }
}

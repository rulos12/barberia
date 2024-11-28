<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_usuario', 'email', 'password', 'tipo'];

    // Dates
    protected $useTimestamps = false;
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

    public function validaAdmin($usuario, $password, $tipo)
    {
        $sql = "select * from usuario where email = '" . $usuario . "'
        and password = '" . $password . "' and tipo = '" . $tipo . "' ";
        $db = db_connect();

        $query = $db->query($sql);

        return $query->getResult();
    }
    public function validaCliente($usuario, $password, $tipo)
    {
        $sql = "select u.*, cliente.* from usuario u 
        join cliente on u.id_cliente = cliente.id_cliente
        where u.email = '" . $usuario . "'
        and u.password = '" . $password . "' and u.tipo = '" . $tipo . "' ";
        $db = db_connect();

        $query = $db->query($sql);

        return $query->getResult();
    }
    public function validaEmpleado($usuario, $password, $tipo)
    {
        $sql = "select u.*, empleado.* from usuario u 
        join empleado on u.id_empleado = empleado.id_empleado
        where u.email = '" . $usuario . "'
        and u.password = '" . $password . "' and u.tipo = '" . $tipo . "' ";
        $db = db_connect();

        $query = $db->query($sql);

        return $query->getResult();
    }
}

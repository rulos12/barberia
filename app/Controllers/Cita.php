<?php
// metodos CRUD de Citas
namespace App\Controllers;

use App\Models\CitaM;

class Cita extends BaseController
{
    public function index(): string
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->findAll();
        $citaM = model('CitaM');
        $session = session();

        $id_emplado = $session->get('id_empleado');
        $data['citas']  = $citaM->getCitasCon($id_emplado);
        return
            view('head') .
            view('menu') .
            view('cita/showCita', $data) .
            view('footer');
    }
    public function citaAdmin()
    {

        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->findAll();
        $citaM = model('CitaM');

        $data['citas']  = $citaM->getCitasAdmin();
        return
            view('head') .
            view('menu') .
            view('cita/showCita', $data) .
            view('footer');
    }
    public function add(): string
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->findAll();

        $citaM = model('CitaM');
        $data['cita'] = $citaM->findAll();

        return
            view('head') .
            view('menu') .
            view('cita/addCita', $data) .
            view('footer');
    }

    public function insert()
    {
        $data = [
            "id_cliente" => $_POST['id_cliente'],
            "id_empleado" => $_POST['id_empleado'],
            "fecha_cita" => $_POST['fecha_cita'],
            "hora_cita" => $_POST['hora_cita'],
            "servicio" => $_POST['servicio'],
            "estado" => $_POST['estado'],
        ];

        $citaM = model('CitaM');
        $citaM->insert($data);
        return redirect()->to(base_url('/cita'));
    }

    public function deleteCita($idCita)
    {

        $citaM = model('CitaM');
        $citaM->delete($idCita);
        return redirect()->to(base_url('/cita'));
    }


    public function editarCita($idCita)
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->findAll();



        $idCita = $data['id_cita'] = $idCita;
        $citaM = model('CitaM');

        //Obtenemos el estado dependiendo del id de la citap
        $estadoResultado = $citaM->getEstadoCita($idCita);
        /*agregamos el estado que obtubimos de la consulta 
        a la variable data para que se mande al formulario 
        */
        $data['estados'] = $estadoResultado[0]->estado;

        $servicioResultado = $citaM->getServicioCita($idCita);
        $data['servicio'] = $servicioResultado[0]->servicio;

        $data['citas']  = $citaM->where('id_cita', $idCita)->getCitasCon();

        return
            view('head') .
            view('menu') .
            view('cita/editarCita', $data) .
            view('footer');
    }


    public function update()
    {
        $citaM = model('CitaM');
        $idCita = $_POST['id_cita'];

        $data = [
            "id_cliente" => $_POST['id_cliente'],
            "id_empleado" => $_POST['id_empleado'],
            "fecha_cita" => $_POST['fecha_cita'],
            "hora_cita" => $_POST['hora_cita'],
            "servicio" => $_POST['servicio'],
            "estado" => $_POST['estado'],
        ];

        $citaM->set($data)->where('id_cita', $idCita)->update();

        return redirect()->to(base_url('/cita'));
    }

    public function listaOrdenada()
    {
        $citaM = model('CitaM');
        $ordenBy = 'estado';
        $direction = 'DESC';
        $session = session();

        if ($session->get('tipo') == 'empleado') {
            $id_emplado = $session->get('id_empleado');
            $data['citas']  = $citaM->getCitasOrdenas($ordenBy, $direction, $id_emplado);
            return
                view('head') .
                view('menu') .
                view('cita/showCita', $data) .
                view('footer');
        } elseif ($session->get('tipo') == 'administrador') {
            $data['citas']  = $citaM->getCitasOrdenasAdmin($ordenBy, $direction);
            return
                view('head') .
                view('menu') .
                view('cita/showCita', $data) .
                view('footer');
        }
    }
}

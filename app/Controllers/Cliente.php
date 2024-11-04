<?php
// Meotods de producto
namespace App\Controllers;


class Cliente extends BaseController
{
    //añadí cositos para la validacion 
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {

        $clienteM = model('ClienteM');
        $data['clientes']  = $clienteM->findAll();
        return
            view('head') .
            view('menu') .
            view('cliente/showC', $data) .
            view('footer');
    }

    public function add(): string
    {
        return
            view('head') .
            view('menu') .
            view('cliente/addCliente') .
            view('footer');
    }

    //añado funciones para editar 

    public function edit($id_cliente)
    {   
        $id_cliente = $data['id_cliente'] = $id_cliente;
        $clienteM = model('ClienteM');
        $data['cliente'] = $clienteM->where('id_cliente', $id_cliente)->findAll();
        return view('head') .
            view('menu') .
            view('cliente/editarCliente', $data) .
            view('footer');
    }

    //añado funciones para actualizar 

    public function update()
    {
        $clienteM = model('ClienteM');
        $id_cliente = $_POST['id_cliente'];

        $data = [
            "nombreCliente" => $_POST['nombreCliente'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
             ];

        $clienteM->set($data)->where('id_cliente', $id_cliente)->update();


        return redirect()->to(base_url('/cliente'));
    }

    public function insert()
    { 
        if (! $this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'nombreCliente' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ];

        $data = [
            "nombreCliente" => $_POST['nombreCliente'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
        ];

        if (! $this->validate($rules)) {
            return
                view('head') .
                view('menu') .
                view('cliente/addCliente', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $clienteM = model('ClienteM');
            $clienteM->insert($data);
            return redirect()->to(base_url('/cliente'));
        }
    }


    public function delete($idCliente)
    {

        $clienteM = model('ClienteM');
        $clienteM->delete($idCliente);
        return redirect()->to(base_url('/cliente'));
    }
}

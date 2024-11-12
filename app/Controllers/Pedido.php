<?php
// metodos CRUD de pedido
namespace App\Controllers;

use App\Models\PedidoM;

class Pedido extends BaseController
{
    public function index(): string
    {


        $pedidoM = model('PedidoM');

        $data['pedidos']  = $pedidoM->getPedidoConCliente();
        return
            view('head') .
            view('menu') .
            view('pedido/showPedido', $data) .
            view('footer');
    }
    public function addPedido(): string
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        return
            view('head') .
            view('menu') .
            view('pedido/addPedido', $data) .
            view('footer');
    }

    public function insert()
    {
        $data = [
            "id_cliete" => $_POST['id_cliente'],
            "fecha_pedido" => $_POST['fecha_pedido'],
            "estado" => $_POST['estado'],
            "total" => $_POST['total'],
        ];

        $pedidoM = model('PedidoM');
        $pedidoM->insert($data);
        return redirect()->to(base_url('/pedido'));
    }

    public function deletePedido($idPedido)
    {

        $pedidoM = model('PedidoM');
        $pedidoM->delete($idPedido);
        return redirect()->to(base_url('/pedido'));
    }


    public function editarPedido($idPedido)
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $pedidoM = $data['id_pedido'] = $idPedido;
        $pedidoM = model('PedidoM');


        //Obtenemos el estado dependiendo del id de la cita
        $estadoResultado = $pedidoM->getEstadoPedido($idPedido);
        /*agregamos el estado que obtubimos de la consulta 
        a la variable data para que se mande al formulario 
        */
        $data['estados'] = $estadoResultado[0]->estado;


        $data['pedidos']  = $pedidoM->where('id_pedido', $idPedido)->findAll();

        return
            view('head') .
            view('menu') .
            view('pedido/editarPedido', $data) .
            view('footer');
    }


    public function update()
    {
        $pedidoM = model('PedidoM');

        $idPedido = $_POST['id_pedido'];

        $data = [
            "id_pedido" => $_POST['id_pedido'],
            "id_cliente" => $_POST['id_cliente'],
            "fecha_pedido" => $_POST['fecha_pedido'],
            "estado" => $_POST['estado'],
            "total" => $_POST['total'],
        ];

        $pedidoM->set($data)->where('id_pedido', $idPedido)->update();

        return redirect()->to(base_url('/pedido'));
    }


    
}

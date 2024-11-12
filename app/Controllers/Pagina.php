<?php

/**Metodos de Usuario */

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetallePedidoM;
use CodeIgniter\HTTP\ResponseInterface;

class Pagina extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function valida()
    {
        $session = session();
        $session->has('logged_in');

        if ($session->has('logged_in')) {
            return redirect()->to(base_url('/pagina/inicio'));
        }
    }

    public function index()
    {
        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/inicioUsuario') .
            view('footer');
    }
    public function validaUsuario()
    {
        $session = session();
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];


        $clienteM = model('ClienteM');
        $cliente = $clienteM->valida($usuario, $password);

        if (count($cliente) > 0) {
            $newdata = [
                'id_cliente' => $cliente[0]->id_cliente, // Guarda idCliente en la sesión
                'nombreCliente' => $cliente[0]->nombreCliente,
                'direccion' => $cliente[0]->direccion,
                'telefono' => $cliente[0]->telefono,
                'email' => $cliente[0]->email,
                'logged_in' => TRUE,
                'carrito' => NULL,
                'tipo' => 'CLIENTE'
            ];
            $session->set($newdata);
            return redirect()->to(base_url('/pagina/inicio'));
        } else {
            print "no existe";
        }
    }
    public function inicioSesionU()
    {

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/inicioSesion') .
            view('footer');
    }
    public function salir()
    {

        $array_items = ['nombreCliente', 'email', 'logged_in', 'telefono', 'direccion'];
        $session = session();
        $session->destroy();
        $session->remove($array_items);

        return redirect()->to(base_url('pagina/inicio'));
    }
    /**Visualizar el header */
    public function inicio()
    {

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('footer');
    }
    public function addCuenta()
    {

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/addCuenta') .
            view('footer');
    }
    /**funciones de citas */
    public function addCita()
    {
        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->getEmpleado();


        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/addCita', $data) .
            view('footer');
    }
    public function Historial()
    {
        $session = session();

        $idCliente = $session->get('id_cliente');
        $citaM = model('CitaM');
        $data['citasAntes'] = $citaM->getCitaBefore($idCliente);
        $data['citasDespues'] = $citaM->getCitaAfter($idCliente);

        $detallePedido = model('DetallePedidoM');
        $data['detalleB'] = $detallePedido->getBefore($idCliente);
        $data['detalleA'] = $detallePedido->getAfter($idCliente);

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/historialCita', $data) .
            view('footer');
    }
    public function addCitaUsuario()
    {

        $session = session();

        if (!$session->has('id_cliente')) {
            return redirect()->to(base_url('/cita/registrar'));
        }
        $idCliente = $session->get('id_cliente');

        $citaM = model('CitaM');

        $data = [
            "id_cliente" => $idCliente,
            "id_empleado" => $_POST['id_empleado'],
            "fecha_cita" => $_POST['fecha_cita'],
            "hora_cita" => $_POST['hora_cita'],
            "servicio" => $_POST['servicio'],
            "estado" => 'programada',
        ];

        $citaM->insert($data);
        return redirect()->to(base_url('/pagina/inicio'));
    }
    public function carritoEmpty()
    {
        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/carritoEmpty') .
            view('footer');
    }
    public function cart()
    {
        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/carrito') .
            view('footer');
    }

    public function editar()
    {

        $session = session();

        $data['cliente'] = $session->get('nombreCliente', 'direccion', 'telefono', 'email');
        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/editCuenta', $data) .
            view('footer');
    }
    /**metodos del editar cliente */
    public function update()
    {
        $clienteM = model('ClienteM');
        $id_cliente = $this->request->getPost('id_cliente');

        $data = [
            "nombreCliente" => $this->request->getPost('nombreCliente'),
            "direccion" => $this->request->getPost('direccion'),
            "telefono" => $this->request->getPost('telefono'),
            "email" => $this->request->getPost('email'),
        ];

        $clienteM->set($data)->where('id_cliente', $id_cliente)->update();

        $session = session();
        $session->set($data);

        return redirect()->to(base_url('/cliente'));
    }

    /**funciones para producto */
    public function listaProducto()
    {
        $productoM = model('ProductoM');
        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();

        $data['productos']  = $productoM->getProductosConMarca();

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/listaProducto', $data) .
            view('footer');
    }
    public function detalleProducto($idProducto)
    {
        $productoM = model('ProductoM');
        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();

        $productoM = model('ProductoM');
        $data['producto']  = $productoM->where('id_producto', $idProducto)->getProductosConMarca();
        $data['productos']  = $productoM->getProductosConMarca();

        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/detalleProducto', $data) .
            view('footer');
    }
    /**Funciones para carrito */
    public function insertCart()
    {
        $session = session();
        $idProducto = $_POST['id_producto'];
        $name = $_POST['nombre'];
        $costo = $_POST['costo'];
        $cantidad = $_POST['stock'];
        if ($cantidad != null) {
            $subtotal = $cantidad * $costo;
        }
        $carrito = $session->get('carrito') ?? [];
        $item = [
            "id_producto" => $idProducto,
            "nombre" => $name,
            "cantidad" => $cantidad,
            "costo" => $costo,
            "subtotal" => $subtotal,
            "estado" => 'pendiente'
        ];

        if (isset($carrito[$idProducto])) {
            $carrito[$idProducto]['cantidad'] += $cantidad;
            $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad'] * $costo;
        } else {
            $carrito[$idProducto] = $item;
        }
        $session->set('carrito', $carrito);
        return redirect()->to(base_url('/cart'));
    }
    public function confirmarCompra()
    {

        $session = session();

        if (!$session->has('id_cliente')) {
            return redirect()->to(base_url('/cart'));
        }

        $total = $_POST['total'];
        $estado = $_POST['estado'];
        $pedidoM = model('PedidoM');
        $detallePedido = model('DetallePedidoM');
        $idCliente = $session->get('id_cliente');


        $dataPedido = [
            'id_cliente' => $idCliente,
            'fecha_pedido' => date('Y-m-d'),
            'estado' => $estado,
            'total' => $total
        ];
        $pedidoM->insert($dataPedido);
        $idPedido = $pedidoM->getInsertID();

        foreach ($session->get('carrito') as $item) {
            $dataDetallePedido = [
                'id_pedido' => $idPedido,
                'id_producto' => $item['id_producto'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['costo'],
            ];

            $detallePedido->insert($dataDetallePedido);
        }
        echo "insertado";
        $session->remove('carrito');
        return redirect()->to(base_url('cita/historial'));
    }
}

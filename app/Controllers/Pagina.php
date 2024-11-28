<?php

/**Metodos de Usuario */

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CitaM;
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

    public function usuario()
    {
        return view('usuario/headUsuario') .
            view('usuario/header') .
            view('usuario/inicioUsuario') .
            view('footer');
    }
    public function validaUsuario()
    {
        $session = session();
        $email = $_POST['usuario'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];
        $UsuarioM = model('UsuarioM');

        if ($tipo == 'administrador') {
            $usuario = $UsuarioM->validaAdmin($email, $password, $tipo);
            if (count($usuario) > 0) {
                $newdata = [
                    'id_admin' => $usuario[0]->id_usuario,
                    'nombreAdmin' => 'Administrador',
                    'email' => $email,
                    'logged_in' => TRUE,
                    'tipo' => $tipo
                ];
                $session->set($newdata);
                return redirect()->to(base_url('/producto/listaBack'));
            } else {
                session()->setFlashdata('error', 'El usuario no existe en el sistema.');
                return redirect()->to(base_url('/loginBack'));
            }
        } elseif ($tipo == 'cliente') {
            $usuario = $UsuarioM->validaCliente($email, $password, $tipo);
            if (count($usuario) > 0) {
                $newdata = [
                    'id_cliente' => $usuario[0]->id_cliente,
                    'nombreCliente' => $usuario[0]->nombreCliente,
                    'direccion' => $usuario[0]->direccion,
                    'telefono' => $usuario[0]->telefono,
                    'email' => $usuario[0]->email,
                    'logged_in' => TRUE,
                    'carrito' => NULL,
                    'tipo' => $tipo
                ];
                $session->set($newdata);
                return redirect()->to(base_url('/pagina/inicioU'));
            } else {
                session()->setFlashdata('error', 'El usuario no existe en el sistema.');
                return redirect()->to(base_url('/cuenta/iniciarSesion'));

            }
        } elseif ($tipo == 'empleado') {
            $usuario = $UsuarioM->validaEmpleado($email, $password, $tipo);
            if (count($usuario) > 0) {
                $newdata = [
                    'id_empleado' => $usuario[0]->id_empleado,
                    'nombreEmpleado' => $usuario[0]->nombreEmpleado,
                    'direccion' => $usuario[0]->direccion,
                    'telefono' => $usuario[0]->telefono,
                    'email' => $usuario[0]->email,
                    'puesto' => $usuario[0]->puesto,
                    'fecha_contratacion' => $usuario[0]->fecha_contratacion,
                    'logged_in' => TRUE,
                    'tipo' => $tipo
                ];
                $session->set($newdata);
                return redirect()->to(base_url('/citaBack'));
            } else {
                session()->setFlashdata('error', 'El usuario no existe en el sistema.');
                return redirect()->to(base_url('/loginBack'));
            }
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
        $session = session();
        if ($session->get('tipo') == 'cliente') {
            $array_items = ['nombreCliente', 'email', 'logged_in', 'telefono', 'direccion'];

            $session->destroy();
            $session->remove($array_items);

            return redirect()->to(base_url('pagina/inicioU'));
        }
        if ($session->get('tipo') == 'administrador') {
            $array_items = ['email', 'logged_in', 'tipo'];

            $session->destroy();
            $session->remove($array_items);

            return redirect()->to(base_url('/loginBack'));
        }
        if ($session->get('tipo') == 'empleado') {
            $array_items = ['nombreEmpleado', 'email', 'logged_in', 'telefono', 'direccion', 'puesto', 'fecha_contratacion', 'tipo'];

            $session->destroy();
            $session->remove($array_items);

            return redirect()->to(base_url('/loginBack'));
        }
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
        return redirect()->to(base_url('/cita/historial'));
    }
    public function deleteCita($idCita)
    {

        $citaM = model('CitaM');

        $data = [
            "estado" => 'cancelada',
        ];
        $citaM->set($data)->where('id_cita', $idCita)->update();
        return redirect()->to(base_url('cita/historial'));
    }
    /**funciones para ver vistas de carrito */
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
    public function listaProductoBack()
    {
        $productoM = model('ProductoM');
        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();

        $data['productos']  = $productoM->getProductosConMarca();

        return view('head') .
            view('menu') .
            view('indexBackend/listaProductos', $data) .
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
        $img = $_POST['imagenProducto'];
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
            "estado" => 'pendiente',
            "imagenProducto" => $img
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
    /**función para eliminar productos del carrito */
    public function removerItem($idProducto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];


        if (isset($carrito[$idProducto])) {
            unset($carrito[$idProducto]);
            $session->set('carrito', $carrito);
        }

        if ($session->get('carrito') != null) {
            return redirect()->to(base_url('/cart'));
        }
        return redirect()->to(base_url('/cart/empty'));
    }
    public function showCitaBack()
    {
        $clienteM = model('ClienteM');
        $data['clientes'] = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $data['empleados'] = $empleadoM->findAll();

        $citaM = model('CitaM');

        $session = session();

        $id_emplado = $session->get('id_empleado');
        $data['citas']  = $citaM->getCitasConBack($id_emplado);
        return
            view('head') .
            view('menu') .
            view('indexBackend/showCitaBack', $data) .
            view('footer');
    }
    public function confirmarCita()
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

        return redirect()->to(base_url('/citaBack'));
    }
    public function logBack()
    {
        return view('indexBackend/loginBack');
    }
    public function vistaUsuario()
    {
        $session = session();

        if ($session->get('tipo') == 'administrador') {
            $array_items = ['email', 'logged_in', 'tipo'];

            $session->destroy();
            $session->remove($array_items);
            return redirect()->to(base_url('pagina/inicioU'));
        }
    }
}

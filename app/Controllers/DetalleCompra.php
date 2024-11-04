<?php
// metodos CRUD de Compra
namespace App\Controllers;

use App\Models\CompraM;
use App\Models\DetalleCompraM;
use App\Models\ProveedorM;
use App\Models\ProductoM;


class DetalleCompra extends BaseController
{
    public function index(): string
    {


        $detalleCompraM = model('DetalleCompraM');

        $data['detalleCompras']  = $detalleCompraM->getDetalleConProducto();
        return
            view('head') .
            view('menu') .
            view('detalleCompra/showDcompra', $data) .
            view('footer');
    }
    public function addCompra(): string
    {
        $proveedorM = model('ProveedorM');
        $data['proveedores'] = $proveedorM->findAll();

        $compraM = model('CompraM');
        $data['compras'] = $compraM->findAll();



        $detalleCompraM = model('DetalleCompraM');
        $data['detallecompra'] = $detalleCompraM-> findAll();

        $productoM = model('ProductoM');
        $data['productos']  = $productoM->getProductosConProveedor();

        return
            view('head') .
            view('menu') .
            view('compra/addCompra', $data) .
            view('footer');
    }

    public function insert()
    {
        $data = [
            "id_proveedor" => $_POST['id_proveedor'],
            "fecha_compra" => $_POST['fecha_compra'],
            "estado" => $_POST['estado'],
            "total" => $_POST['total'],
            "fecha_recepcion" => $_POST['fecha_recepcion'],
        ];

        $compraM = model('CompraM');
        $compraM->insert($data);
        return redirect()->to(base_url('/compra'));
    }

    public function deleteCompra($idCompra)
    {

        $compraM = model('CompraM');
        $compraM->delete($idCompra);
        return redirect()->to(base_url('/compra'));
    }


    public function editarCompra($idCompra)
    {
        $proveedorM = model('ProveedorM');
        $data['proveedores'] = $proveedorM->findAll();

        $compraM = $data['id_compra'] = $idCompra;
        $compraM = model('CompraM');


        //Obtenemos el estado dependiendo del id de la cita
        $estadoResultado = $compraM->getEstadoCompra($idCompra);
        /*agregamos el estado que obtubimos de la consulta 
        a la variable data para que se mande al formulario 
        */
        $data['estados'] = $estadoResultado[0]->estado;


        $data['compras']  = $compraM->where('id_compra', $idCompra)->getCompraConProveedor();

        return
            view('head') .
            view('menu') .
            view('compra/editarCompra', $data) .
            view('footer');
    }


    public function update()
    {
        $compraM = model('CompraM');
        $idCompra = $_POST['id_compra'];

        $data = [
            "id_compra" => $_POST['id_compra'],
            "id_proveedor" => $_POST['id_proveedor'],
            "fecha_compra" => $_POST['fecha_compra'],
            "estado" => $_POST['estado'],
            "total" => $_POST['total'],
            "fecha_recepcion" => $_POST['fecha_recepcion'],
        ];

        $compraM->set($data)->where('id_compra', $idCompra)->update();

        return redirect()->to(base_url('/compra'));
    }
}

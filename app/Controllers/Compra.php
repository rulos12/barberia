<?php
// metodos CRUD de Compra
namespace App\Controllers;

use App\Models\CompraM;
use App\Models\DetalleCompraM;
use App\Models\ProveedorM;
use App\Models\ProductoM;


class Compra extends BaseController
{
    public function index(): string
    {


        $detalleCompraM = model('DetalleCompraM');
        $data['detallecomprasWhere'] = $detalleCompraM->findAll();


        $compraM = model('CompraM');

        $data['compras']  = $compraM->getCompraConProveedor();
        return
            view('head') .
            view('menu') .
            view('compra/showCompra', $data) .
            view('footer');
    }
    public function addCompra(): string
    {
        $proveedorM = model('ProveedorM');
        $data['proveedores'] = $proveedorM->findAll();

        $compraM = model('CompraM');
        $data['compras'] = $compraM->findAll();


        $detalleCompraM = model('DetalleCompraM');
        $data['detallecompra'] = $detalleCompraM->findAll();

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
        // Obtener el ID de la compra recién insertada
        $id_compra = $compraM->insertID();

        $Detalledata = [
            "id_compra" => $id_compra,
            "id_producto" => $_POST['id_producto'],
            "cantidad" => $_POST['cantidad'],
            "precio_unitario" => $_POST['precio_unitario'],
        ];


        $detalleCompraM = model('DetalleCompraM');
        $detalleCompraM->insert($Detalledata);



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
        $compraM = $data['id_compra'] = $idCompra;
        $compraM = model('CompraM');
        $data['compras']  = $compraM->where('id_compra', $idCompra)->getCompraConProveedor();
        $proveedorM = model('ProveedorM');
        $data['proveedores'] = $proveedorM->findAll();

        // se obtiene el id del proveedor de la compra
        $id_proveedor = $data['compras'][0]->id_proveedor;

        $detalleCompraM = model('DetalleCompraM');
        $data['detallecompras'] = $detalleCompraM->where('id_compra', $idCompra)->findAll();

        $productoM = model('ProductoM');
        $data['productos'] = $productoM->where('id_proveedor', $id_proveedor)->getProductosConProveedorid($id_proveedor); // Filtra por proveedor



        //Obtenemos el estado dependiendo del id de la cita
        $estadoResultado = $compraM->getEstadoCompra($idCompra);
        /*agregamos el estado que obtubimos de la consulta 
        a la variable data para que se mande al formulario 
        */
        $data['estados'] = $estadoResultado[0]->estado;
        return
            view('head') .
            view('menu') .
            view('compra/editarCompra', $data) .
            view('footer');
    }


    public function update()
    {



        $compraM = model('CompraM');
        $detalleCompraM = model('DetalleCompraM');



        $idCompra = $_POST['id_compra'];
        $idDetalleCompra = $_POST['id_detalle_compra'];

        $data = [
            "id_proveedor" => $_POST['id_proveedor'],
            "fecha_compra" => $_POST['fecha_compra'],
            "estado" => $_POST['estado'],
            "total" => $_POST['total'],
            "fecha_recepcion" => $_POST['fecha_recepcion'],
        ];

        $compraM->set($data)->where('id_compra', $idCompra)->update();

        $Detalledata = [
            "id_producto" => $_POST['id_producto'],
            "cantidad" => $_POST['cantidad'],
            "precio_unitario" => $_POST['precio_unitario'],
        ];

        $detalleCompraM->set($Detalledata)->where('id_detalle_compra', $idDetalleCompra)->update();

        return redirect()->to(base_url('/compra'));
    }
    public function verDetalle($idCompra)
    {

        $id_compra = $idCompra->id_compra;
        $detalleCompraM = model('DetalleCompraM');
        $data['detallecomprasWhere'] = $detalleCompraM->where('id_compra', $id_compra)->getDetalleCompraWhere($id_compra);

        return
            view('head') .
            view('menu') .
            view('compra/showCompra', $data) .
            view('footer');
    }
}

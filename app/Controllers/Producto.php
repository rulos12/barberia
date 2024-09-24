<?php
// metodos CRUD de productos
namespace App\Controllers;

use App\Models\ProductoM;

class Producto extends BaseController
{
    public function index(): string
    {


        $productoM = model('ProductoM');
       
        $data['productos']  = $productoM->getProductosCon();
        return
            view('head') .
            view('menu') .
            view('producto/show', $data) .
            view('footer');
    }
    public function add(): string
    {
        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();

        $tipoM = model('TipoM');
        $data['tipo'] = $tipoM->findAll();

        $proveedorM = model('ProveedorM');
        $data['proveedor'] = $proveedorM->findAll();

        return
            view('head') .
            view('menu') .
            view('producto/add', $data) .
            view('footer');
    }

    public function insert()
    { //post
        echo "aqui insertamos";
        $data = [
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "stock" => $_POST['stock'],
            "descripcion" => $_POST['descripcion'],
            "id_marca" => $_POST['id_marca'],
            "id_tipo" => $_POST['id_tipo'],
            "id_proveedor" => $_POST['id_proveedor']
        ];

        $productoM = model('ProductoM');
        $productoM->insert($data);
        return redirect()->to(base_url('/producto'));
    }

    public function delete($idProducto)
    {

        $productoM = model('ProductoM');
        $productoM->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }


    public function editarP($idProducto)
    {
        $tipoM = model('TipoM');
        $data['tipo'] = $tipoM->findAll();

        $proveedorM = model('ProveedorM');
        $data['proveedor'] = $proveedorM->findAll();

        $marcaM = model('MarcaM');
        $data['marcas'] = $marcaM->findAll();
        

        $idProducto = $data['id_producto'] = $idProducto;
        $productoM = model('ProductoM');
        $data['producto']  = $productoM->where('id_producto', $idProducto)->getProductosConMarca();

        return
            view('head') .
            view('menu') .
            view('producto/editarP', $data) .
            view('footer');
    }


    public function update()
    {
        $productoM = model('ProductoM');
        $idProducto = $_POST['id_producto'];

        $data = [
            "nombre" => $_POST['nombre'],
            "precio" => $_POST['precio'],
            "stock" => $_POST['stock'],
            "descripcion" => $_POST['descripcion'],
            "id_marca" => $_POST['id_marca'],
            "id_tipo" => $_POST['id_tipo'],
            "id_proveedor" => $_POST['id_proveedor']
        ];

        $productoM->set($data)->where('id_producto', $idProducto)->update();

        return redirect()->to(base_url('/producto'));
    }
}

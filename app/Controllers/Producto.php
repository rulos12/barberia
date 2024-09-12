<?php
// producto.php
namespace App\Controllers;


class Producto extends BaseController
{
    public function index(): string
    {

        $productoM = model('ProductoM');
        $data ['productos']  = $productoM->findAll();
        return 
        view('head').
        view('menu').
        view('producto/show', $data).
        view('footer');
    }
    public function add(): string
    {
        return 
        view('head').
        view('menu').
        view('producto/add').
        view('footer');
    }

    public function insert(){ //post
        echo "aqui insertamos";
        $data = [
          "nombre" => $_POST['nombre'],
          "precio" => $_POST['precio'],
          "cantidad" => $_POST['cantidad'],
          "descripcion" => $_POST['descripcion']
        ] ;

        $productoM = model('ProductoM');
        $productoM->insert($data);
        return redirect()->to(base_url('/producto'));
    }

    public function delete($idProducto, )
    {

        $productoM = model('ProductoM');
        $productoM->delete($idProducto);
        return redirect()->to(base_url('/producto'));
    }
}

<?php
// metodos CRUD de marcas
namespace App\Controllers;


class Marca extends BaseController
{
    public function index(): string
    {

        $marcaM = model('MarcaM');
        $data ['marcas']  = $marcaM->findAll();
        return 
        view('head').
        view('menu').
        view('marca/addMarca', $data).
        view('footer');
    }

    public function insert(){ 
        $data = [
          "nombreMarca" => $_POST['nombreMarca'],
          "descripcion" => $_POST['descripcion']
        ] ;

        $marcaM = model('MarcaM');
        $marcaM->insert($data);
        return redirect()->to(base_url('/marca/addMarca'));
    }

    public function delete($idMarca)
    {

        $marcaM = model('MarcaM');
        $marcaM->delete($idMarca);
        return redirect()->to(base_url('/marca/addMarca'));
    }

    public function editarM($idMarca)
    {


        $idMarca = $data['id_marca'] = $idMarca;
        $marcaM = model('MarcaM');
        $data['marca']  = $marcaM->where('id_marca', $idMarca)->findAll();
        $data ['marcas']  = $marcaM->findAll();
        return
            view('head') .
            view('menu') .
            view('marca/editarM', $data) .
            view('footer');
    }


    public function update()
    {
        $marcaM = model('MarcaM');
        $idMarca = $_POST['id_marca'];

        $data = [
            "nombreMarca" => $_POST['nombreMarca'],
            "descripcion" => $_POST['descripcion'],
        ];

        $marcaM->set($data)->where('id_marca', $idMarca)->update();

        return redirect()->to(base_url('/marca/addMarca'));
    }

}

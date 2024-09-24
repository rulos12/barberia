<?php
// metodos CRUD de categoria (tipo)
namespace App\Controllers;


class Tipo extends BaseController
{
    public function index(): string
    {

        $tipoM = model('TipoM');
        $data ['tipos']  = $tipoM->findAll();
        return 
        view('head').
        view('menu').
        view('tipo/addTipo', $data).
        view('footer');
    }

    public function insert(){ 
        $data = [
          "nombreTipo" => $_POST['nombreTipo'],
          "descripcion" => $_POST['descripcion']
        ] ;

        $tipoM = model('TipoM');
        $tipoM->insert($data);
        return redirect()->to(base_url('/tipo/addTipo'));
    }

    public function delete($idTipo)
    {

        $tipoM = model('TipoM');
        $tipoM->delete($idTipo);
        return redirect()->to(base_url('/tipo/addTipo'));
    }

    public function editartipo($idTipo)
    {


        $idTipo = $data['id_tipo'] = $idTipo;
        $tipoM = model('TipoM');
        $data['tipo']  = $tipoM->where('id_tipo', $idTipo)->findAll();
        $data ['tipos']  = $tipoM->findAll();
        return
            view('head') .
            view('menu') .
            view('tipo/editarTipo', $data) .
            view('footer');
    }


    public function update()
    {
        $tipoM = model('TipoM');
        $idTipo = $_POST['id_tipo'];

        $data = [
            "nombreTipo" => $_POST['nombreTipo'],
            "descripcion" => $_POST['descripcion'],
        ];

        $tipoM->set($data)->where('id_tipo', $idTipo)->update();

        return redirect()->to(base_url('/tipo/addTipo'));
    }

}

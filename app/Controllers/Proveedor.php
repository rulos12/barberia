<?php
// metodos CRUD de proveedores
namespace App\Controllers;


class Proveedor extends BaseController
{
    public function index(): string
    {

        $proveedorM = model('ProveedorM');
        $data['proveedor']  = $proveedorM->findAll();
        return
            view('head') .
            view('menu') .
            view('proveedor/addProveedor', $data) .
            view('footer');
    }

    public function insert()
    {
        $data = [
            "nombreProveedor" => $_POST['nombreProveedor'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "contacto" => $_POST['contacto'],
            "productos" => $_POST['producto']
        ];

        $proveedorM = model('ProveedorM');
        $proveedorM->insert($data);
        return redirect()->to(base_url('/proveedor/addProveedor'));
    }

    public function delete($idProveedor)
    {

        $proveedorM = model('ProveedorM');
        $proveedorM->delete($idProveedor);
        return redirect()->to(base_url('/proveedor/addProveedor'));
    }

    public function editarProv($idProveedor)
    {
        $idProveedor = $data['id_proveedor'] = $idProveedor;
        $proveedorM = model('ProveedorM');
        $data['proveedor']  = $proveedorM->where('id_proveedor', $idProveedor)->findAll();
        $data['proveedores']  = $proveedorM->findAll();
        return
            view('head') .
            view('menu') .
            view('proveedor/editarProveedor', $data) .
            view('footer');
    }


    public function update()
    {
        $proveedorM = model('ProveedorM');
        $idProveedor = $_POST['id_proveedor'];

        $data = [
            "nombreProveedor" => $_POST['nombreProveedor'],
            "direccion" => $_POST['direccion'],
            "telefono" => $_POST['telefono'],
            "email" => $_POST['email'],
            "contacto" => $_POST['contacto'],
            "productos" => $_POST['productos']
        ];

        $proveedorM->set($data)->where('id_proveedor', $idProveedor)->update();

        return redirect()->to(base_url('/proveedor/addProveedor'));
    }
}
